@extends('base')
@section('main')


<div class="topnav">
  <div >
  	<a style="margin: 5px;" href="/" class="btn btn-info">Home</a>
  	<a style="margin: 5px;" href="/products" class="btn btn-info">Products</a>
  </div>   
</div>

<div class="row">
  	<div class="col-sm-12" >
		<h1 class="display-4" style="text-align:center;">Recipes</h1>
		
		<form class="form-inline" style="margin-left:80%">
			<input type="text"  size="15"  id="insearch" name="insearch" placeholder="Search for recipe" >
    		<button type="submit" class="btn btn-primary">Go</button>
		</form>
		<br>

		<a style="margin-bottom: 2%;" href="{{ route('recipes.create')}}" class="btn btn-primary">Add New Recipe</a>  
    	<table class="table">
      		<thead>
	        	<tr>
					<td>recipe_name </td>
					<!--<td>execution </td>
					<td>ingredient_name</td>
					<td>Qty</td>-->
          			<td colspan = 2>Actions</td>
        		</tr>
    		</thead>
      		<tbody>
        		@foreach($recipes as $item)
        			<tr>
						<td>{{$item->recipe_name }}</td>
						<!--<td style="text-align:center;">{{$item->execution }}</td>
						<td style="text-align:center;">{{$item->ingredient_name }}</td>
						<td style="text-align:center;">{{$item->qty }}</td>-->
						<td>
	              			<a href="{{ route('recipes.edit',$item->recipe_id)}}" class="btn btn-primary">Edit Recipe</a>
						</td>
          				<td>
		            		<form action="{{ route('recipes.destroy', $item->recipe_id)}}" method="post">
              					@csrf
              					@method('DELETE')
	                				<button class="btn btn-danger" type="submit">Delete</button>
              				</form>
          				</td>
        			</tr>
        		@endforeach
      		</tbody>
    	</table>
  	</div>
</div>

<div class="col-sm-12">
  @if(session()->get('success'))
    <div class="alert alert-success">
      {{ session()->get('success') }}  
    </div>
  @endif

<br>
<form action="{{ route('CreateQuestion.store') }}" method="post">
  <div class="form-group">
    <label for="1stquestion" style="font-size:18px" >Search for recipes containing the following ingredient: </label>
	<br>
    <input type="text" size="20" id="ingredient" name="ingredient" placeholder="ingredient" >
    <button type="submit" class="btn btn-primary">Search</button>
  </div>
</form>
</div>


@endsection
