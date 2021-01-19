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
	<div class="col-sm-10" >
		<br>
		<br>
		<div>
			<a style="width: auto; margin-left:40%; " href="{{ route('recipes.create')}}" class="btn btn-success">Add New Recipe</a>  	
		</div>
		<br>
		<br>

		<input type="text" size="25" id="search_box" onkeyup="search_box()" placeholder="Search for recipes.." title="Type in a name">
		<table class="table table-striped table-bordered table-hover table-sm table-dark text-center">
			<thead class="text-center" >
				<tr>
					<th class="text-center" scope="col"><b>Name</b></th>
					<th class="text-center" scope="col">Ingredients</th>
					<th scope="col" style="text-align:center;"></td>
				</tr>
			</thead>
			<tbody class="text-center">
				@foreach($recipes as $recipe)
					<tr class="text-center">
						<td class="text-center">
							<a style="text-align: center;" href="{{ route('recipes.show',$recipe->recipe_name)}}">{{$recipe->recipe_name }}</a>
						</td>
						<td>
							<div>
								@foreach($items as $item)
									<?php 
										if ($item->recipe == $recipe->recipe_id) 
											echo $item->qty.' '.$item->ingredient_name.'<br>';
									?>
								@endforeach	
							</div>							
						</td>
						<td>
							<a href="{{ route('recipes.edit',$recipe->recipe_name)}}" style="margin-right:15%; text-align: center;" class="btn btn-primary">Edit</a>
							<a href="{{ route('recipes.destroy',$recipe->recipe_name)}}" style="text-align: center;" class="btn btn-danger">Delete</a>
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
