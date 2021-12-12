@extends('master/master')
@section("content")


<div class="row p-1 d-flex justify-content-center">
    @foreach ($Products as $item)
    <div class="card text-center col-sm-2 m-1">
      <a href="detail/{{$item['id']}}">
      {{-- <div class="card-header text-warning">
        10% off
      </div> --}}
      {{-- image-link  --}}
      <img class="card-img-top img-thumbnail" src="{{asset('gallery/'.$item['gallery'])}}" alt="Card image cap">
      <div class="card-body">
        <h5 class="card-title">{{$item['name']}}</h5>
        <p class="card-text">Author : {{$item['description']}}</p>
        {{-- <a href="detail/{{$item['id']}}" class="btn btn-warning btn-sm">Detail</a> --}}
        <a href="{{url('/detail', $item['id'])}}" class="btn btn-warning btn-sm">Detail</a>
      </div>
      <div class="card-footer text-danger">{{$item['price']}} BDT</div>
    </div>
  </a>
  

    @endforeach
    

</div>



<div class="container">
  <p>{{ $Products->links('pagination::bootstrap-4') }}</p>
</div>      

@endsection