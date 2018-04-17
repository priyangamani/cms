<html>
<head></head>
<body style="background: black; color: white">
<h1>Reminder email.</h1>
<p>Hi {{$user}}. Here is the link to reset your password : 

	{{route('resetPasswordFromEmail',['email'=>$email,'resetCode'=>$token])}}</p>
</body>
</html>