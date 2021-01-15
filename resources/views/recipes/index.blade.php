@extends('base')

@section('main')

<div class="nav topnav">
	<div>
  		<a style="margin: 5px;" href="/" class="btn btn-info">Home</a>
		<a style="margin: 5px;" href="/products" class="btn btn-info">Products</a>
		<a style="margin: 5px;" href="/recipes" class="btn btn-info active">Recipes</a>
  	</div>   
</div>


<div class="row">
	<div class="col-sm-8 text-center" style="margin-top:1%; margin-bottom:3%">
		<h1>Recipes</h1>
	</div>

	<div class="col-sm-4" style="margin-top:3%;">
		<form>
			<div class="form-group">
				<input 	 type="text" id="insearch" name="insearch" placeholder="Search for recipes" style="max-width:170px; margin-right:10px;">
				<button type="submit" class="btn btn-primary">Go</button>
			</div>
		</form>
	</div>
	
	<div class="col-sm-8 text-center" style="margin-bottom:2%;">
		<a href="{{ route('recipes.create')}}" class="btn btn-primary">Add New Recipe</a>	
	</div>

	<div class="col-sm-8" >
		<table class="table table-striped table-bordered table-hover table-sm table-dark text-center">
			<caption style="text-align: center;">Click on a recipe to see more info about it.</caption>
			<thead class="text-center" >
				<tr>
					<th class="text-center" scope="col"><b>Name</b></th>
					<th scope="col" style="text-align:center;"><b>Actions</b></td>
					<th class="text-center" scope="col">Missing Ingredients?</th>
				</tr>
			</thead>
			<tbody class="text-center">
				@foreach($recipes as $recipe)
					<tr class="text-center">
						<td class="text-center">
							<a style="text-align: center;" href="{{ route('recipes.show',$recipe->recipe_id)}}">{{$recipe->recipe_name }}</a>
						</td>
						<td>
							<a href="{{ route('recipes.edit',$recipe->recipe_id)}}" style="margin-right:15%; text-align: center;" class="btn btn-primary">Edit</a>
							<a href="{{ route('recipes.destroy',$recipe->recipe_id)}}" style="text-align: center;" class="btn btn-danger">Delete</a>
						</td>
						<td>
							@foreach($items as $item)
								<p>{{$item->ingredient_name}}</p>
							@endforeach
						</td>
					</tr>
				@endforeach
			</tbody>
		</table>	
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
