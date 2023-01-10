<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Ibarra+Real+Nova:wght@500&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  <style type="text/css">
    .nav-item{
      margin: 10px;    
      font-family: 'Ibarra Real Nova', serif;
    }
  </style>
</head>
<body>
<nav class="col-10 navbar navbar-expand-lg navbar-light p-2">
  <h2 class="navbar-brand text-success" style="font-family: 'Ibarra Real Nova', serif;"><img src="../asset/image/logo.png" width="60px" height="60px">Farmer's Store</h2>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav ml-auto">
      <li class="nav-item">
        <a class="nav-link text-dark" style='font-family: Verdana, sans-serif;' href='/customer/home'>Home</a>
      </li>
      <!--<li class="nav-item">
        <a class="nav-link text-dark" style='font-family: Verdana, sans-serif;' href="/customer/">Category</a>
      </li>-->
      @if (Auth::check())
      <li class="nav-item">
        <a class="nav-link text-dark" style='font-family: Verdana, sans-serif;' href="/customer/mycart">MyCart</a>
      </li>
      @endif
      <li class="nav-item">
        @if (Auth::check())
          <strong style="font-family: Verdana, sans-serif;" >{{auth()->user()->name}}!&nbsp;&nbsp;
          <a href="logout" class="btn btn-outline-danger">Logout</a></strong>
        @else
          <a href="/customer" class="btn btn-outline-success border-b">&nbsp;&nbsp;&nbsp;&nbsp;Login&nbsp;&nbsp;&nbsp;&nbsp;</a>
        @endif
      </li>
    </ul>
  </div>
</nav>
</body>
</html>