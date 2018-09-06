@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading"><h2>Список категорий
				     <div class="pull-right">
					 <a href="/create">Add category</a>
					 </div></h2>
				</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                     
	<ul class="list-group">
                    @foreach($categories as $category)
    <li class="list-group-item">
				
				<h4><a href="/show/{{$category->id}}"><strong>{{ ucfirst($category->title) }}</strong></a>
				<div class="pull-right">
				 
				 
				     <form action= "/home/{{ $category->id }}" method="post">
					 <a href="/home/{{ $category->id }}/edit" class="badge badge-danger">Edit</a>
					 
                            {{csrf_field()}}
                            {!! method_field('delete') !!}
                            <button type="submit" class="btn btn-default" id="category_delete">Delete</button>
                        </form> </h4>
				 </li>
				 
			
				@endforeach
      </li>
    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
