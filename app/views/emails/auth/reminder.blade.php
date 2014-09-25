<!doctype html>
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<title>Reset your password</title>
</head>

	<body>
    
    <h2>Password Reset</h2>

	<div>
		<p>To reset your password, complete this form: <a href="{{ URL::to('password/reset', array($token)) }}">here</a>.</p>
		<p>Thank you for using Reservette!</p>
	</div>
    
	</body>

</html>