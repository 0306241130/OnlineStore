@extends('layouts.app')
@section('title',$viewData['title'])
@section('subtitle',$viewData['subtitle'])
@section('content')
<div class="row">
    @foreach($viewData['products'] as $product)
    <div class="col-md-4 col-lg-3 mb-2">
        <div class="card">
            <img src="{{asset('/img/'.$product['image'])}}" alt="{{$product['image']}}" class="card-img-top img-card">
            <div class="card-body text-center text-white">
                <a href="{{route('product.show',['id' => $product['id']])}}" class="btn btn-primary">{{$product['name']}}</a>
            </div>
            </img>
        </div>
    </div>

    @endforeach
</div>
@endsection