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
		<a style="margin-bottom: 2%;" href="{{ route('recipes.create')}}" class="btn btn-primary">Add New Recipe</a>  
    	<table class="table">
      		<thead>
	        	<tr>
					<td>recipe_name </td>
					<td> </td>
					<td>execution </td>
					<td> </td>
					<td>ingredient_name</td>
					<td> </td>
					<td>Qty</td>
					<td> </td>
          			<td colspan = 2>Actions</td>
        		</tr>
    		</thead>
      		<tbody>
        		@foreach($items as $item)
        			<tr>
						<td>{{$item->recipe_name }}</td>
						<td> </td>
						<td style="text-align:center;">{{$item->execution }}</td>
						<td> </td>
						<td style="text-align:center;">{{$item->ingredient_name }}</td>
						<td> </td>
						<td style="text-align:center;">{{$item->qty }}</td>
						<td> </td>
						<td> </td>
						<td>
	              			<a href="{{ route('recipes.edit',$item->recipe)}}" class="btn btn-primary">Edit Recipe</a>
						</td>
						<td> </td>
						<td> </td>
          				<td>
		            		<form action="{{ route('recipes.destroy', $item->recipe)}}" method="post">
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
</div>


@endsection
