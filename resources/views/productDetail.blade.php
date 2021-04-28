@extends('master')
@section("content")


    <div class="row p-5">

        <div class="col-lg-6">
            <img src="{{$item['gallery']}}" alt="Product Image">
        </div>

        <div class="col-lg-6">

            <h2 class="text-primary">{{$item['name']}}</h2>
            <h5 class="text-danger">{{$item['price']}} BDT</h5>
            <p>{{$item['description']}}</p>
            <a href="#" class="btn btn-success btn-sm">Buy now</a>
            <a href="cart/{{$item['id']}}" class="btn btn-warning btn-sm">Add to CART</a>
            <br><br>
            <a href="/home" class="btn btn-info btn-sm rounded-circle">Go back</a>
            


        </div>
    </div>




@endsection