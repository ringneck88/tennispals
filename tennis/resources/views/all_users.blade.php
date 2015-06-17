<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	this should show all users

	@foreach($users as $user)
		<div>{{ $user->name }}</div>
	@endforeach

</body>
</html>