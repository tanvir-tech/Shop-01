<?php 
use App\Http\Controllers\CartController;
// use Illuminate\Http\Request;
$totalCartItem = 0;
if(Session::has('user')){
  $totalCartItem = CartController::cart_Count();
}

?>
{{-- nav bar  --}}
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand " href="/home">Book House</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
  
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
          <a class="nav-link" href="/home">Home</a>
        </li>
        <li class="nav-item">
          <div class="dropdown p-1">
            <button class="btn btn-outline-info dropdown-toggle" type="button" id="dropdownMenuButton"
                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Category
            </button>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                <a class="dropdown-item text-info" href="category/Engineering" target="blank">Engineering</a>
                <a class="dropdown-item text-warning" href="category/Fiction" target="blank">Fiction</a>
                <a class="dropdown-item text-info" href="category/ScienceFiction" target="blank">ScienceFiction</a>
                <a class="dropdown-item text-warning" href="category/Arts" target="blank">Arts</a>
                <a class="dropdown-item text-info" href="category/Bengali" target="blank">Bengali</a>
                <a class="dropdown-item text-warning" href="category/English" target="blank">English</a>
                <a class="dropdown-item text-info" href="category/Grammer" target="blank">Grammer</a>
                <a class="dropdown-item text-warning" href="category/Vocabulary" target="blank">Vocabulary</a>
                <a class="dropdown-item text-info" href="category/Comics" target="blank">Comics</a>
                <a class="dropdown-item text-warning" href="category/GeneralKnowledge" target="blank">GeneralKnowledge</a>

            </div>
        </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#">Trending</a>
          </li>
    
      </ul>


     

{{-- cart  --}}
      {{-- <a class="nav-link" href="/cartlist">Cart({{$totalCartItem}})</a> --}}
      @if(Session::has('user'))
      <a class="nav-link" href="/cartlist">Cart({{$totalCartItem}})</a>
      {{-- @else
      <a class="nav-link" href="/login">Cart({{$totalCartItem}})</a> --}}
      @endif
{{-- search  --}}
      <form class="form-inline my-2 my-lg-0" action="/search">
        <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" name="query">
        <button class="btn btn-warning my-2 my-sm-0" type="submit">Search</button>
      </form>

      @if(Session::has('user'))
{{-- dropedown menu  --}}
      <div class="dropdown p-1">
        <button class="btn btn-outline-success dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            {{Session::get('user')['name']}}
        </button>
        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
          <a class="dropdown-item" href="#">Profile</a>
          <a class="dropdown-item" href="orderlist">My Orders</a>
          <a class="dropdown-item" href="#">My Wishlist</a>
          <a class="dropdown-item" href="#">Notifications</a>
          <a class="dropdown-item" href="#">Messages</a>
          <a class="dropdown-item" href="logout">Logout</a>
          
        </div>
      </div>
@else 
<a class="nav-link" href="login">Login</a>
@endif



    </div>
  </nav>
  {{-- nav bar closed  --}}

