<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Apparty</title>
        <meta name="description" content="Apparty... y sigue la rumba">
        <meta name="author" content="Camilo Salazar">
        <meta name="keyword" content="keywords">
        <meta name="viewport" content="width=device-width, initial-scale=1">
       
        <link href="{{ URL::asset('plugins/bootstrap/bootstrap.css')}}" rel="stylesheet">
        <link href="http://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">
        <link href='http://fonts.googleapis.com/css?family=Righteous' rel='stylesheet' type='text/css'>
        <link href="{{ URL::asset('css/style.css')}}" rel="stylesheet">
        
    </head>
<body>
<div class="container-fluid">
    <div id="page-login" class="row">
        <div class="col-xs-12 col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3">
            <div class="box">
                <div class="box-content">
                    <div class="text-center">
                        <h3 class="page-header">Apparty</h3>
                    </div>

                    <form role="form" method="POST" action="{{{ URL::to('/users/login') }}}" accept-charset="UTF-8">
                        <input type="hidden" name="_token" value="{{{ Session::getToken() }}}">
                        <fieldset>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input class="form-control" tabindex="1" type="text" name="email" id="email" value="{{{ Input::old('email') }}}">
                            </div>
                            <div class="form-group">
                            <label for="password">
                                {{{ Lang::get('confide::confide.password') }}}
                            </label>
                            <input class="form-control" tabindex="2" type="password" name="password" id="password">
                            <p class="help-block">
                                <a href="{{{ URL::to('/users/forgot_password') }}}">{{{ Lang::get('confide::confide.login.forgot_password') }}}</a>
                            </p>
                            </div>
                            
                            @if (Session::get('error'))
                                <div class="alert alert-error alert-danger">{{{ Session::get('error') }}}</div>
                            @endif

                            @if (Session::get('notice'))
                                <div class="alert">{{{ Session::get('notice') }}}</div>
                            @endif
                            <div class="text-center">
                                <button tabindex="3" type="submit" class="btn btn-primary">{{{ Lang::get('confide::confide.login.submit') }}}</button>
                            </div>
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
