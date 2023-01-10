<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Add Item | Farmer</title>
</head>
<body>
	<center>
	<div style="border-bottom: 1px solid black;">
		@include('Farmer/navbar')
	</div>
	</center>
<div class="container bg-light text-primary" class="p-4" style="border-radius:10px;margin-top: 70px;padding: 10px;">
		<center>
	<div class="row contain">
  	<div class="col-sm-6">
  		<form action="/farmer/item" method="post" enctype="multipart/form-data" autocomplete="off">
  			@csrf
			<div class="mt-4">
				<label>Product Name</label>
				<input type="text" class="form-control d1" placeholder="Enter Product Name" name="product_name" />
			</div>
			<div class="mt-4">
				<label>Categories</label>
				<select class="form-control" style="height: 50px;" name="category">
					<option>Select Category</option>
					<option value="vegetable">Vegetable</option>
					<option value="fruits">Fruits</option>
				</select>
			</div>
			
		</div>
  		<div class="col-sm-6">
  			<div class="mt-4">
				<label>Cover Image</label>
				<input type="file" class="form-control d2"  name="cover_image" accept="image/*"/>
			</div>
			<div class="mt-4">
				<label>Additional Image</label>
				<input type="file" class="form-control d2"  name="additional_image" accept="image/*" />
			</div>
		</center>
		<div class="mt-4">
			<center><label>Description</label></center>
			<textarea class="form-control d1" placeholder="Add details" name="desc"></textarea>
		</div>
		<div class="mt-4">
				<center><button type="submit" class="btn btn-success">Add Item</button></center>
			</div>
		</form>

	</div>
</div>
</body>
</html>