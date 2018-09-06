@extends('layouts.app')


@section('content')
  <div class="col-lg-4 col-lg-offset-4">
  <p>
  <h2>{{$category->title}}</h2>
  </p>
  <ul>
  @foreach($category->products as $product)
   <li class="list-group-item ">
{{$product->name}}
</li>
  @endforeach
  </ul>
  <div>
  <h6><a href="/home">Back</a></h6>


@endsection