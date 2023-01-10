<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Cart</title>
	<link rel="preconnect" href="https://fonts.googleapis.com"><link rel="preconnect" href="https://fonts.gstatic.com" crossorigin><link href="https://fonts.googleapis.com/css2?family=Lato:wght@300&display=swap" rel="stylesheet">
</head>
<body style="font-family: 'Lato', sans-serif;">
	<center>
		<div style="border-bottom: 1px solid black;">
			@include('Customer/navbar')
		</div>
	</center>
	<style> @import url('https://fonts.googleapis.com/css2?family=Lato:wght@300&display=swap'); </style>	
	<div class="container mt-4">
		<div class="row">
		@foreach($item as $item)
				<div class="col-md-6 p-2" style="border:5px solid white;">
					<center><img src="{{ asset('cover/' . $item->cover_image) }}" style="width:400px;height:400px;" />
					</center>

				</div>
				<br/>
				<div class="col-md-6 mt-4">
					<b style="font-size:28px;" class="text-dark mt-2">{{ $item->product_name }}</b>
					<p>{{ $item->category }}</p>
					<p>Seller Id : {{ $item->farmer_id }}</p>
					<p>₹ {{ $item->rate }}</p>
					<form action="/customer/remove" method="post">
						@csrf
						<input type="number" name="remove" value="{{ $item->id }}" hidden>
						<button class="btn btn-light text-danger">REMOVE</button>
					</form>
					<hr/>
					<center>
						<form action="/customer/buy" method="post">
							@csrf
							<input type="number" name="pid" value="{{ $item->id }}"/>
							<button class="btn btn-warning text-light" style="width:300px;padding: 10px;font-size: 18px;">Place Order</button>
						</form>
						</center>
				</div>
			
		@endforeach
		</div>
	</div>

</body>
</html>