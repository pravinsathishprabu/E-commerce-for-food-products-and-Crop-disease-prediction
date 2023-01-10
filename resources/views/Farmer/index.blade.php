<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Farmer</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <style type="text/css">
    	body{
    		overflow: hidden;
    	}
    	@media only screen and (max-width: 600px) {
    		body{
    			overflow: auto;
    		}
    	}
    </style>
</head>
<body onload="getLocation()" class="" style="background:url('asset/image/nel.png')">
	<div class="text-dark p-2" style="border-bottom: 1px solid black">
		<h4 class="mt-2 text-center"><img src="asset/image/farmer.png" style="width:50px;height: 50px;" class="">&nbsp;&nbsp;Uzhavan</h4>
	</div>

	<div class="row">
		<div class="col-sm-6" style="border-right:5px solid black;">
			<center>
				<div>
					<form class="text-light mt-3" autocomplete="off" action="farmer/register" method="post" style="padding: 8px;width: 80%;border-radius: 10px;">
						@csrf
				    <h4>Register as <span class="text-dark">Farmer</span></h4>
				    <hr style="border: 1px solid white;width:20%" />
				    <div class="component p-2">
					    <label class="float-left text-light">Name</label>
					    <input type="text" name="name" class="form-control"/>
					</div>
				    <div class="component p-2">
					    <label class="float-left text-light">Email Address</label>
					    <input type="email" name="email" class="form-control"/>
					</div>
					<div class="component p-2">
					    <label class="float-left text-light">Mobile</label>
					    <input type="tel" name="mobile" class="form-control"/>
					</div>
					<div class="component p-2">
					    <label class="float-left text-light">Password</label>
					    <input type="Password" name="password" class="form-control"/>
					</div>
					<div class="component p-2">
						<input type="hidden" name="latitude" value="" class="form-control">
						<input type="hidden" name="longitude" value="" class="form-control">
					</div><br/>
					<div class="component p-2">
						<button class="btn btn-primary">Register</button>
					</div>
				</form>
				</div>
			</center>
		</div>
		<div class="col-sm-6">
			<center>
				<div style="margin-top: 60px;" class="p-4">
					<form class="text-light" autocomplete="off" action="farmer/login" method="post" style="padding: 20px;width: 80%;border-radius: 10px;">
						@csrf
				    <h4>Login as <span class="text-dark">Farmer</span></h4>
				    <hr style="border: 1px solid white;width:20%" />
				    <div class="component p-2">
					    <label class="float-left text-light">Email Address</label>
					    <input type="email" name="email" class="form-control"/>
					</div>
					<div class="component p-2">
					    <label class="float-left text-light">Password</label>
					    <input type="Password" name="password" class="form-control"/>
					</div>
					<div class="component p-2">
						<button class="btn btn-success">&nbsp;&nbsp;Login&nbsp;&nbsp;</button>
					</div>
				</form>
				</div>
			</center>
		</div>	
	</div>
<script>
	function getLocation() {
	  if (navigator.geolocation) {
	    navigator.geolocation.getCurrentPosition(showPosition);
	  } 
	  else{
	  	  window.alert('location faileN d');
	  }
	}

	function showPosition(position) {
		document.querySelector('input[name = "latitude"]').value = position.coords.latitude;
		document.querySelector('input[name = "longitude"]').value = position.coords.longitude;
	}
	
</script>
	
	</body>
</html>