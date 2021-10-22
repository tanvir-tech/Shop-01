@extends('master')
@section("content")
<div class="justify-content-center">


<div class="row p-5">
    <div class="col-lg-3"></div>
    <div class="col-lg-6 bg-success text-white rounded">
        <form action="insertProduct" method="POST" enctype="multipart/form-data">
          @csrf
        <br>
        <h3 class="text-center">New product</h3>
        <br>
        <input class="form-control mr-sm-2" type="text" placeholder="Product name" name="productName">
        <br>
        <input class="form-control mr-sm-2" type="text" placeholder="description" name="description">
        <br>
        <input class="form-control mr-sm-2" type="text" placeholder="category" name="category">
        <br>
        <input class="form-control mr-sm-2" type="number" placeholder="price" name="price">
        <br>
        <input class="form-control mr-sm-2" type="number" placeholder="discount" name="discount">
        <br>
        <input class="form-control mr-sm-2" type="number" placeholder="quantity" name="quantity">
        <br>
            {{-- product Image  --}}
            <label for="productImage">Select an image:</label>
            <input type="file" id="productImage" name="productImage">
        <br>
        <button class="btn btn-danger" type="submit">Submit</button>
        <br><br>
        </form>
      </div>
</div>
<div class="col-lg-3"></div>











@endsection