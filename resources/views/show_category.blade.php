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
<div class="pull-right">
@if(Auth::check())
     <form action= "/product/{{ $product->id }}" method="post">
			<a href="/product/{{$product->id}}/edit" class="badge badge-danger">Edit</a>
					 
              {{csrf_field()}}
              {!! method_field('delete') !!}
                  <button type="submit" class="badge badge-danger" id="product_delete">Delete</button>
    </form>
	@endif
</div>
  
</li>
@endforeach
<div class="pull-right">
@if(Auth::check())
<a href="/product/create" class="badge badge-primary">Add product</a>
@else
	<a href="/products">Products</a>
@endif
</div>
  </ul>
  <div>
  <h6><a href="/home">Back</a></h6>


@endsection