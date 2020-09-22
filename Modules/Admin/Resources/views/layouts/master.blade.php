@extends('layouts.app')

@section('navbar')

    <li class="nav-item dropdown">
        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
            shops
        </a>

        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="{{route('admin.shop.create')}}">New Shop</a>
            @foreach(admin()->shops as $shop)
                <a class="dropdown-item" href="{{route('shop.index',[slug($shop->name)])}}">{{$shop->name}}</a>    
            @endforeach    
        </div>
    </li>
    
@endsection