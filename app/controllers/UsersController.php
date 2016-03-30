<?php



/**
 * UsersController Class
 *
 * Implements actions regarding user management
 */
class UsersController extends Controller
{

    /**
     * Displays the form for account creation
     *
     * @return  Illuminate\Http\Response
     */
    public function create()
    {
        return View::make(Config::get('confide::signup_form'));
    }

    /**
     * Stores new account
     *
     * @return  Illuminate\Http\Response
     */
    public function store()
    {
        $repo = App::make('UserRepository');
        $user = $repo->signup(Input::all());

        if ($user->id) {
            if (Config::get('confide::signup_email')) {
                Mail::queueOn(
                    Config::get('confide::email_queue'),
                    Config::get('confide::email_account_confirmation'),
                    compact('user'),
                    function ($message) use ($user) {
                        $message
                            ->to($user->email, $user->username)
                            ->subject(Lang::get('confide::confide.email.account_confirmation.subject'));
                    }
                );
            }

            return Redirect::action('UsersController@login')
                ->with('notice', Lang::get('confide::confide.alerts.account_created'));
        } else {
            $error = $user->errors()->all(':message');

            return Redirect::action('UsersController@create')
                ->withInput(Input::except('password'))
                ->with('error', $error);
        }
    }

    /**
     * Displays the login form
     *
     * @return  Illuminate\Http\Response
     */
    public function login()
    {
        if (Confide::user() && Confide::user()->active) {
            return Redirect::to('/');
        } else {
            return View::make(Config::get('confide::login_form'));
        }
    }

    /**
     * Attempt to do login
     *
     * @return  Illuminate\Http\Response
     */
    public function doLogin()
    {
        $repo = App::make('UserRepository');
        $input = Input::all();

        if ($repo->login($input)) {
            if(Confide::user()->active == '1'){
                return Redirect::intended('/');
            }else{
                return Redirect::action('UsersController@login')
                        ->withInput(Input::except('password'))
                        ->with('error', 'Usuario inactivo, comuniquese con el administrador del sistema.');
            }
        } else {
            if ($repo->isThrottled($input)) {
                $err_msg = Lang::get('confide::confide.alerts.too_many_attempts');
            } elseif ($repo->existsButNotConfirmed($input)) {
                $err_msg = Lang::get('confide::confide.alerts.not_confirmed');
            } else {
                $err_msg = Lang::get('confide::confide.alerts.wrong_credentials');
            }

            return Redirect::action('UsersController@login')
                ->withInput(Input::except('password'))
                ->with('error', $err_msg);
        }
    }

    /**
     * Attempt to confirm account with code
     *
     * @param  string $code
     *
     * @return  Illuminate\Http\Response
     */
    public function confirm($code)
    {
        if (Confide::confirm($code)) {
            $notice_msg = Lang::get('confide::confide.alerts.confirmation');
            return Redirect::action('UsersController@login')
                ->with('notice', $notice_msg);
        } else {
            $error_msg = Lang::get('confide::confide.alerts.wrong_confirmation');
            return Redirect::action('UsersController@login')
                ->with('error', $error_msg);
        }
    }

    /**
     * Displays the forgot password form
     *
     * @return  Illuminate\Http\Response
     */
    public function forgotPassword()
    {
        return View::make(Config::get('confide::forgot_password_form'));
    }

    /**
     * Attempt to send change password link to the given email
     *
     * @return  Illuminate\Http\Response
     */
    public function doForgotPassword()
    {
        if (Confide::forgotPassword(Input::get('email'))) {
            $notice_msg = Lang::get('confide::confide.alerts.password_forgot');
            return Redirect::action('UsersController@login')
                ->with('notice', $notice_msg);
        } else {
            $error_msg = Lang::get('confide::confide.alerts.wrong_password_forgot');
            return Redirect::action('UsersController@doForgotPassword')
                ->withInput()
                ->with('error', $error_msg);
        }
    }

    /**
     * Shows the change password form with the given token
     *
     * @param  string $token
     *
     * @return  Illuminate\Http\Response
     */
    public function resetPassword($token)
    {
        return View::make(Config::get('confide::reset_password_form'))
                ->with('token', $token);
    }

    /**
     * Attempt change password of the user
     *
     * @return  Illuminate\Http\Response
     */
    public function doResetPassword()
    {
        $repo = App::make('UserRepository');
        $input = array(
            'token'                 =>Input::get('token'),
            'password'              =>Input::get('password'),
            'password_confirmation' =>Input::get('password_confirmation'),
        );

        // By passing an array with the token, password and confirmation
        if ($repo->resetPassword($input)) {
            $notice_msg = Lang::get('confide::confide.alerts.password_reset');
            return Redirect::action('UsersController@login')
                ->with('notice', $notice_msg);
        } else {
            $error_msg = Lang::get('confide::confide.alerts.wrong_password_reset');
            return Redirect::action('UsersController@resetPassword', array('token'=>$input['token']))
                ->withInput()
                ->with('error', $error_msg);
        }
    }

    /**
     * Log the user out of the application.
     *
     * @return  Illuminate\Http\Response
     */
    public function logout()
    {
        Confide::logout();

        return Redirect::to('/');
    }

    /**
     * Get all the users 
     *
     * @return  Illuminate\Http\Response
     */
    public function getAll()
    {
        $users = User::with('roles')->get();
        
        //Log::info($business);

        return View::make('user.all') -> with('users', $users);
    }

    /**
     * Get edit form to update user information
     *
     * @return  Illuminate\Http\Response
     */
    public function getEdit($id)
    {
        $user = User::find($id);
        $role = $user->roles()->first();
        $roles = Role::lists('name','id');
        
        return View::make('user.edit') -> with(array('user'=>$user, 'roleId'=>$role->id, 'roles'=>$roles));
    }

    /**
     * Update user information
     *
     * @return  Illuminate\Http\Response
     */
    public function postEditUser()
    {
        $user = User::find(Input::get('id'));

        if($user){

            $input = Input::all();
            $user->username = array_get($input, 'username');
            $user->email    = array_get($input, 'email');
            $user->fullname = array_get($input, 'fullname');
            $user->phone = array_get($input, 'phone');
            $user->active = array_get($input, 'active') ? 1 : 0;

            if(strlen(array_get($input, 'password')) > 0){
                $user->password = array_get($input, 'password');
                $user->password_confirmation = array_get($input, 'password_confirmation');
            }

            $repo = App::make('UserRepository');
            $result = $repo->save($user);

            if($result){
                //sync the role
                $user->roles()->sync(array(Input::get('rol')));

                //Respuesta
                $response['success'] = true;
                $response['url'] = 'users/all';
                $response['msg'] = 'Usuario actualizado';
                return json_encode($response);

            } else {
                $error = $user->errors()->all(':message');

                $response['success'] = false;
                $response['errors'] = $error;
                return json_encode($response);
            }
        }
    }
}
