@extends('base')
@section('main')


<div class="topnav">
  <div >
  	<a style="margin: 5px;" href="/" class="btn btn-info">Home</a>
  	<a style="margin: 5px;" href="/products" class="btn btn-info">Products</a>
  </div>   
</div>

<div>
	<h1 style="text-align:center;">Recipes</h1>
</div>

<div class="row">

	<div class="col-sm-12 ">
		<form class="form-inline" style="margin-left:80%">
			<input type="text"  size="15"  id="insearch" name="insearch" placeholder="Search for recipes" >
    		<button type="submit" class="btn btn-primary">Go</button>
		</form>	
	</div>
	<br>
	<br>

	<div class="col-sm-7" style="margin-left:10%;">
		<a style="margin-bottom: 2%;" href="{{ route('recipes.create')}}" class="btn btn-primary">Add New Recipe</a>
		<hr>
		@foreach($recipes as $item)
			<a href="{{ route('recipes.show',$item->recipe_id)}}" style="margin-right:5%;">{{$item->recipe_name }}</a>
			<a href="{{ route('recipes.edit',$item->recipe_id)}}" style="margin-right:5%;" class="btn btn-primary">Edit</a>
			<a href="{{ route('recipes.destroy',$item->recipe_id)}}" class="btn btn-danger">Delete</a>
		@endforeach
	</div>
</div>

<div class="col-sm-12">
	<br>
  	@if(session()->get('success'))
		<div class="alert alert-success">
	  		{{ session()->get('success') }} 
    	</div>
  	@endif
</div>


@endsection
