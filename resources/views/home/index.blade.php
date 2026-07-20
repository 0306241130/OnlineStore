@extends('layouts.app')
@section('title',$viewData["title"])
@section("content")
<div class="row">
    <div class="col-md-6 col-lg-4 mb-2">
        <img src="{{asset('/img/drone.webp')}}" alt="" class="img-fuild rouned">
    </div>
    <div class="col-md-6 col-lg-4 mb-2">
        <img src="{{asset('/img/game.webp')}}" alt="" class="img-fuild rouned">
    </div>
    <div class="col-md-6 col-lg-4 mb-2">
        <img src="{{asset('/img/philips.webp')}}" alt="" class="img-fuild rouned">
    </div>
</div>
@endsection