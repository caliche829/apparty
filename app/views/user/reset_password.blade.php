<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Apparty</title>
        <meta name="description" content="Apparty... y sigue la rumba">
        <meta name="author" content="Evgeniya">
        <meta name="keyword" content="keywords">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        {{ HTML::style('plugins/bootstrap/bootstrap.css', array('media' => 'screen')) }}
        <link href="http://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">
        <link href='http://fonts.googleapis.com/css?family=Righteous' rel='stylesheet' type='text/css'>
        {{ HTML::style('css/style.css', array('media' => 'screen')) }}
        <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
                <script src="http://getbootstrap.com/docs-assets/js/html5shiv.js"></script>
                <script src="http://getbootstrap.com/docs-assets/js/respond.min.js"></script>
        <![endif]-->
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
                    <form method="POST" action="{{{ URL::to('/users/reset_password') }}}" accept-charset="UTF-8">
                        <input type="hidden" name="token" value="{{{ $token }}}">
                        <input type="hidden" name="_token" value="{{{ Session::getToken() }}}">

                        <div class="form-group">
                            <label for="password">{{{ Lang::get('confide::confide.password') }}}</label>
                            <input class="form-control" placeholder="{{{ Lang::get('confide::confide.password') }}}" type="password" name="password" id="password">
                        </div>
                        <div class="form-group">
                            <label for="password_confirmation">{{{ Lang::get('confide::confide.password_confirmation') }}}</label>
                            <input class="form-control" placeholder="{{{ Lang::get('confide::confide.password_confirmation') }}}" type="password" name="password_confirmation" id="password_confirmation">
                        </div>

                        @if (Session::get('error'))
                            <div class="alert alert-error alert-danger">{{{ Session::get('error') }}}</div>
                        @endif

                        @if (Session::get('notice'))
                            <div class="alert">{{{ Session::get('notice') }}}</div>
                        @endif

                        <div class="form-actions form-group">
                            <button type="submit" class="btn btn-primary">{{{ Lang::get('confide::confide.forgot.submit') }}}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
{{ HTML::script('plugins/jquery/jquery-2.1.0.min.js') }}
{{ HTML::script('plugins/jquery-ui/jquery-ui.min.js') }}
</html>
 