<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Products Farmer</title>
</head>
<body>
	<center>
	<div style="border-bottom: 1px solid black;">
		@include('Farmer/navbar')
	</div>
	</center>

	<div class="container">
		 @foreach ($item as $items)
		 <div class="row mt-4 bg-light p-4 text-light" style="border-radius:20px">
		 	<div class="col-md-4">
		 		<center><img src="{{ asset('cover/' . $items->cover_image) }}" style="width:300px;height:300px;border-radius:200px" />
		 		<br/>
		 		<strong class="mt-2">{{ $items->product_name }} | {{ $items->category}}</strong></center>
		 	</div>
		 	<div class="col-md-8">
		 		<form action="/farmer/stock" method="post" class="mt-4">
		 			@csrf
		 			<input type="number" name="p_id" value="{{ $items->id }}" hidden>
		 			<label class="text-primary">Quantity in Kg</label>
		 			<input type="number" name="quantity" placeholder="Enter the Quantity" class="form-control"><br/>
		 			<label class="text-primary">Stock</label>
		 			<select name="stock" class="form-control">
		 				<option value="instock">InStock</option>
		 				<option value="outstock">OutStock</option>
		 			</select><br/>
		 			<label class="text-primary">Rate</label>
		 			<input type="number" name="rate" class="form-control" placeholder="Rate for kg" /><br/>
		 			<center><button class="btn btn-primary">Update</button>
		 				<br/><br/>
		 				<strong class="text-dark">Current Availability</strong>
		 				<hr/>
		 				<p class="text-dark">Quantity : {{ $items->quantity }}&nbsp;&nbsp;&nbsp;Stock : {{ $items->stock }}</p>
		 			</center>
		 		</form>
		 	</div>
		 </div>
		 <hr/>
		 @endforeach
	</div>
</body>
</html>