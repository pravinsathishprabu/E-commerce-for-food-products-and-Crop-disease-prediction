<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Uzhavan | Error</title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>

<center class="mt-4">
	<a href="javascript:history.back()" class="btn btn-primary"><img src="asset/image/previous.png" width="20" height="20">&nbsp;&nbsp;Back</a>
<div class="mt-4" style="font-family: 'Ibarra Real Nova', serif;"> 
		 @if ($errors->any())
	     @foreach ($errors->all() as $error)
	         <div class="alert alert-danger col-md-6">{{$error}}</div>
	     @endforeach
	 	 @endif
</div>
</center>
</body>
</html>