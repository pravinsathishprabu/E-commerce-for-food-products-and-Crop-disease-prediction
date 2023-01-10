<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Buy Products</title>
</head>
<body>
	<center>
		<div style="border-bottom: 1px solid black;">
			@include('Customer/navbar')
		</div>
	</center>
	<div class="container">

		@foreach($item as $item)
		<form action="/customer/payment" method="post">
			@csrf
			<center>
			<table style="width:100%">
				<tr class="p-4">
					<th>Product Name</th>
					<td>{{ $item->product_name }}</td>
				</tr>
				<tr class="p-4">
					<td><img src="{{ asset('cover/' . $item->cover_image) }}"/></td>
				</tr>
				<tr class="p-4">
					<th>Buying Quantity</th>
					<td>
						<select name="b_quantity" class="form-control">
							<option value="1">1</option>
							<option value="2">2</option>
							<option value="3">3</option>
							<option value="4">4</option>
							<option value="5">5</option>	
						</select>
					</td>
				</tr>
			</table>
			<input type="number" name="pid" value="{{ $item->id }}" hidden />
			<input type="number" value="{{ Auth::guard('web')->user()->id }}" name="uid" >
			<input type="number" value="{{ $item->rate }}" name="rate" hidden>
			<br/>
						<script src="https://checkout.razorpay.com/v1/checkout.js"
	                        data-key="rzp_test_Miky1kbKFDHLgs"
	                        data-amount = "{{ $item->rate *100}}"
	                        data-buttontext="Buy"
	                        data-name="book"
	                        data-description="test"
	                        data-theme.color="white">
	                    </script>
	                </center>
	        </form>
		@endforeach
	</div>
</body>
</html>