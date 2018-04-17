<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>C-S-P | Log in</title>
  <!-- Tell the browser to be responsive to screen width -->

    {!!Html::style('css/bootstrap.min.css')!!}
    <!-- Font Awesome -->
    {!!Html::style('css/font-awesome.min.css')!!}
    <!-- Ionicons -->
    {!!Html::style('css/ionicons.min.css')!!}

    <!-- Theme style -->
    {!!Html::style('css/AdminLTE.min.css')!!}


    {!!Html::style('css/blue.css')!!}
    {!!Html::style('sweetalert2/dist/sweetalert2.min.css')!!}


    @yield('style')
  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href=""><b>C-S-P </b>Reset Password</a>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body ">
    <p class="login-box-msg ">Enter your new password</p>

    <form action="#" method="post" id="frm-reset-password">
    {!! csrf_field() !!}
      <div class="form-group has-feedback">
        <input type="password" class="form-control" placeholder="Enter new password" name="password">
       
      </div>
      <div class="form-group has-feedback">
        <input type="password" class="form-control" placeholder="Confirm Password" name="password_confirmation">
       
      </div>
      <div class="row">
        <!-- /.col -->
        <div class="col-xs-12">
        <button type="submit" class="btn btn-primary btn-block btn-flat">Reset Password</button>
        </div>
        <!-- /.col -->
      </div>
      <input type="hidden" name="email" value="{{$email}}">
      <input type="hidden" name="resetCode" value="{{$resetCode}}">
    </form>

   

  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->


<!-- jQuery 3 -->
<script src="../../bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<!-- iCheck -->
<script src="../../plugins/iCheck/icheck.min.js"></script>

{!!Html::script('js/jquery.min.js')!!}
<!-- Bootstrap 3.3.6 -->
{!!Html::script('js/bootstrap.min.js')!!}
<!-- AdminLTE App -->
{!!Html::script('js/app.min.js')!!}
{!!Html::script('sweetalert2/dist/sweetalert2.min.js')!!}
@include('sweet::alert')

@yield('script')
<script>
$(document).ready(function()
{
    $('#frm-reset-password').on('submit',function(e)
    {
        e.preventDefault();
        var data = $(this).serialize();
        console.log(data);
        $.post("{{route('postResetPassword')}}", data, function(response)
        {
          if (response.status =="ok"){

            $(location).attr('href',  "{{route('passwordSuccess')}}");
          }
          else{
            $(location).attr('href',  "{{route('passwordError')}}");
          }
          
        });
    });
});

</script>
</body>
</html>