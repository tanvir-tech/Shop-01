@extends('master')
@section("content")

<div class="allproducts bg-info p-5">
    <h3 class="text-light">Allproducts here </h3>

<div class="row p-2">
    @foreach ($Products as $item)
    <div class="card text-center col-sm-3 m-1">
      <a href="detail/{{$item['id']}}">
      {{-- <div class="card-header text-warning">
        10% off
      </div> --}}
      {{-- image-link  --}}
      <img class="card-img-top" src="{{$item['gallery']}}" alt="Card image cap">
      <div class="card-body">
        <h5 class="card-title">{{$item['name']}}</h5>
        <p class="card-text">{{$item['description']}}</p>
        <a href="detail/{{$item['id']}}" class="btn btn-warning btn-sm">Detail</a>
      </div>
      <div class="card-footer text-danger">{{$item['price']}} BDT</div>
    </div>
  </a>


    @endforeach
    

</div>



      








</div>

@endsection