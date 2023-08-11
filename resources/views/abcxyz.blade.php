<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
</head>
<body>
<p>this is user   {{$user->name}} </p>
<form action="{{url('/abcxyz/'.$user->id)}}">
	<input type="hidden" name="reciver_id" value="{{$user->id}}">
</form>
</body>
</html>