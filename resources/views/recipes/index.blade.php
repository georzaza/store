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
	<div class="col-sm-8" >
		<br>
		<br>
		<div>
			<a style="width: auto; margin-left:40%; " href="{{ route('recipes.create')}}" class="btn btn-success">Add New Recipe</a>  	
		</div>
		<br>
		<br>

		<input type="text" size="25" id="search_box" onkeyup="search_box()" placeholder="Search for recipes.." title="Type in a name">
		<table class="table table-striped table-bordered table-hover table-sm table-dark text-center" id="recipes_table">
			<thead class="text-center" >
				<tr>
					<td>
					  	<b><a onclick="sortTable()" style="cursor: pointer; color: black;" >Name</a></b>
						<img src="https://lh3.googleusercontent.com/proxy/drOC39C38e1FD5hU7tHStHEIsTEO7tGTlU186OBfigFR1NSVYH5D2wR0hujQLBHzbyox5aZvYbVqbjUSlSRyWijYLxkHydo" 
							 style="height: 10px; width:15px;">
					</td>
					<th class="text-center" scope="col">Ingredients</th>
					<th scope="col" style="text-align:center;"></td>
				</tr>
			</thead>
			<tbody id="recipes" class="text-center">
				@foreach($recipes as $recipe)
					<tr class="text-center">
						<td class="text-center">
							<a style="text-align: center;" href="{{ route('recipes.show',$recipe->recipe_name)}}">{{$recipe->recipe_name }}</a>
						</td>
						<td>
							<input class="iButton" type="button" value="expand" style="{display:block;}"></input>
							<div class="container" style="display:none;width:200px;height:100px;">
								@foreach($items as $item)
									<?php 
										if ($item->recipe == $recipe->recipe_id) 
											echo $item->qty.' '.$item->ingredient_name.'<br>';
									?>
								@endforeach	
							</div>							
						</td>
						<td>
							<a href="{{ route('recipes.edit',$recipe->recipe_name)}}" style="text-align: center;" class="btn btn-primary">Edit</a>
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


<!-- Search bar-->
<script>
	function search_box() {
  		let input, filter, tr, td, i, txtValue;
  		input = document.getElementById('search_box');
  		filter = input.value.toUpperCase();
  		tbody = document.getElementById("recipes");
  		tr = tbody.getElementsByTagName('tr');
		

  
  		for (i = 0; i < tr.length; i++) {
    		td = tr[i].getElementsByTagName("td")[0];
    		txtValue = td.textContent || td.innerText;

    		if (txtValue.toUpperCase().indexOf(filter) > -1 )
      			tr[i].style.display = "";
    		else
      			tr[i].style.display = "none";
		}
	}
</script>

<!-- Sorts The Products By Name-->
<script>
	function sortTable() {
	  	let table, rows, flag, i, x, y, shouldSwitch;
	  	table = document.getElementById("recipes_table");
	  	flag = true;
	  	
	  	while (flag) {
	    	flag = false;
	    	rows = table.rows;
	    	for (i = 1; i < (rows.length - 1); i++) {
      			shouldSwitch = false;
      			x = rows[i].getElementsByTagName("TD")[0].innerText;
      			y = rows[i + 1].getElementsByTagName("TD")[0].innerText;
			  	if (x > y) {
       				shouldSwitch = true;
        			break;
    			}
    		}
    		if (shouldSwitch) {
      			rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
      			flag = true;
    		}

  		}

	}
</script>

<!-- Ingridients Button-->
<script>
	$('.iButton').click(function(){
    	if ( this.value === 'collapse' ) {
       	 // if it's open close it
       	 open = false;
      	  this.value = 'expand';
      	  $(this).next("div.container").hide(4);
    	}
    		else {
    	    // if it's close open it
     	   open = true;
     	   this.value = 'collapse';
      	  $(this).siblings("[value='collapse']").click();
     	   $(this).next("div.container").show(4);
    	}
	});
</script>

@endsection
