@extends('layouts.app')


@section('content')
@if(Auth::check())
<form class="form" action="/product/{{$product->id}}" method="post">
<a href="/home" class="btn btn-ifo ">Back</a>
     {{csrf_field()}}
   @section('formMethod')
   @show
   <fieldset>
    <div class="form-group">
      <div class="col-lg-8">
		<input type="text" name="name" class="form-control">
	  <br>
	  </div>
	
    <div class="col-lg-10 col-lg-offset-1">
			<label for="category">Category</label>
                    <div>   
                        {!! Form::select('category[]',$categories, null,['id' => 'categories', 'multiple' => 'multiple'])!!}                             
                    </div>
		   
   <br>
   
    <button type="submit" class="btn btn-primary">Submit</button>
	
	</div>
	</div>
  </fieldset>
  </form>
  @endif
  
  @if (count($errors) > 0)
	  <div class="alert alert-warning">
	  @foreach ($errors->all() as $error)
	  {{$error}}
	  @endforeach
	  </div>
	  @endif

@endsection	
	