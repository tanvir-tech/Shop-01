@extends('master')
@section("content")

<div class="container">

    <div class="row p-2">
      <div class="col-lg-9 bg-secondary text-warning p-2">
        <h1>Welcome to Our Shop</h1>
        <br>
        <p>
          In our shop you will get the latest collection of various kinds of products.
        </p>



      </div>
      <!-- welcome closed  -->
      <div class="col-lg-3 bg-warning text-white">
        <form action="login" method="POST">
          @csrf
        <br>
        <h4 class="text-center">Login here</h4>
        <br>
        <input class="form-control mr-sm-2" type="text" placeholder="email ID" name="email">
        <br>
        <input class="form-control mr-sm-2" type="password" placeholder="Password" name="password">
        <br>
        <button class="btn btn-success" type="submit">Login</button>
        <a class="text-success btn btn-warning btn-sm" href="registration">Create account</a>
        <br><br>
        <a class="text-primary" href="#">Forgot password !</a>
        <br><br>
        </form>
      </div>
      <!-- login closed  -->
    </div>
    <!-- row closed -->













  </div>
  <!-- container close -->
@endsection