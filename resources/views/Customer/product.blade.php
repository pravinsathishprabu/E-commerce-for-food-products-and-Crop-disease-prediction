<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Product</title>
</head>
<body>
	<center>
		<div style="border-bottom: 1px solid black;">
			@include('Customer/navbar')
		</div>
	</center>
	<div class="container mt-4 border">
		<div class="row">
			@foreach($item as $item)
				<div class="col-md-6 p-4 bg-light">
					<center><img src="{{ asset('cover/' . $item->cover_image) }}" style="width:250px;height:250px;" /><br/><br/>
						<img src="{{ asset('additional/' . $item->additional_image) }}" style="width:250px;height:250px;" /><br/><br/>
					</center>
				</div>
				<div class="col-md-6 p-4 bg-light">
						<p style="font-size:30px">{{ $item->product_name }}</p>
						<p class="text-danger" style="font-size:18px">Hurry,Only {{ $item->quantity }} Kg left</p><br/>
						<b>General</b>
						<hr/>
						<div class="contain">
							<table style="width:100%">
							  <tr>
							    <td class="text-center p-2 text-success">Category</td>
							    <td class="text-center p-2 text-primary">{{ $item->category }}</td>
							  </tr>
							  <tr>
							    <td class="text-center p-2 text-success">Rate</td>
							    <td class="text-center p-2 text-primary">₹ {{ $item->rate }}</td>
							  </tr>
							  <tr>
							    <td class="text-center p-2 text-success">Stock</td>
							    <td class="text-center p-2 text-primary">{{ $item->stock }}</td>
							  </tr>
							</table>
						</div>
						<br/>
						<center>
							<form action="/customer/cart" method="post">
								@csrf
								<input type="number" name="p_id" value="{{ $item->id }}" hidden/>
								<input type="number" name="u_id" value="{{Auth::guard('web')->user()->id}}" hidden />
								<button class="btn btn-primary" style="width:300px;padding: 10px;">Add to cart</button><br/><br/>
							</form>
							<form action="/customer/buy" method="post">
								@csrf
								<input type="number" name="pid" value="{{ $item->id }}" hidden />
								<button class="btn btn-warning text-light" style="width:300px;padding: 10px;font-size: 18px;">Place Order</button>
							</form>
					</center>
				</div>
				@endforeach
		</div>
	</div>
	
</body>
</html>
