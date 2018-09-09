@extends('layouts.app')

@section('content')

@if(Auth::check())
<a href="/product/create"><h2>Create Product</a>
@else
Product</h2>
@endif

<div class="pull-right">
<a href="/home">Home</a>
</div></h2>


   @foreach($products as $product)
  <li class="list-group-item d-flex justify-content-between align-items-center">
    	
      {{$product->name}}

        <div class="pull-right">

				@if(Auth::check())
				     <form action= "/products/{{ $product->id }}" method="post">
					     <a href="/product/{{$product->id}}/edit" class="badge badge-danger">Edit</a>
					 
                            {{csrf_field()}}
                            {!! method_field('delete') !!}
                            <button type="submit" class="btn btn-default" id="category_delete">Delete</button>
                      </form>
					@endif  
			</div>
		</li>
  @endforeach
 
  
@endsection