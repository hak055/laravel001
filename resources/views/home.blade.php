@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row">
  
                     <div>
					 @if(Auth::check())
					 <h3><a href="/create">Add category</a>
				                   <div class="pull-right">
				            <a href="/products">Products</a>
							</div>
				 @else
					 Category</h3>
				 <div class="pull-right">
				 <a href="/products">Products</a>
				 </div>
				     @endif					 
					 
                    <hr>

		
		
		<div class="col">
            <div class="panel panel-default">			

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                     
	
                    @foreach($categories as $category)
    <li class="list-group-item">
				
				<h4><a href="/show/{{$category->id}}"><strong>{{ $category->title }}</strong></a>
				@if(Auth::check())
				<div class="pull-right">
				
				     <form action= "/home/{{ $category->id }}" method="post">
					     <a href="/home/{{$category->id}}/edit" class="badge badge-danger">Edit</a>
					 
                            {{csrf_field()}}
                            {!! method_field('delete') !!}
                            <button type="submit" class="btn btn-default" id="category_delete">Delete</button>
                      </form>
					  
					  </div>
					  
				@endif
				 </h4>
				 
			
				@endforeach
      </li>
    
                </div>
            </div>
        </div>
    </div>
    </div>

@endsection
