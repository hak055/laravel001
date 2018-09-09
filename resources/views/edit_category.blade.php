@extends('layouts.app')


@section('content')
@if(Auth::check())
<br>

<div class="col-lg-4 col-lg-offset-4">

<form class="form-horizontal" action="/home/{{$category->id}}" method="post">
<a href="/home" class="btn btn-ifo ">Back</a>
     {{ method_field('PUT') }}
	 {{csrf_field()}}
   
   <fieldset>
    <div class="form-group">
      <div class="col-lg-10">
		<input type="text" name="title" value="{{$category->title}}" class="form-control" placeholder="Title">
	  <br>
	  </div>
	
    <button type="submit" class="btn btn-primary">Submit</button>
	
	</div>
	</div>
  </fieldset>
  </form>
  @if (count($errors) > 0)
	  <div class="alert alert-warning">
	  @foreach ($errors->all() as $error)
	  {{$error}}
	  @endforeach
	  </div>
	  @endif

</div>
@endif

@endsection



