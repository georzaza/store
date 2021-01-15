@extends('base')

@section('main')

<div class="topnav">
  <a class="active" href="/">Home</a>
  <a href="/products">Products</a>
  <a href="/recipes">Recipes</a>
</div> 

<div class="row">
	<div class="col-sm-12">
    	<h1 class="display-3" style="text-align:center;">Products</h1>
	  	<div>
    		<a style="margin: 19px;" href="{{ route('products.create')}}" class="btn btn-primary">New product</a>
			<a href="/recipes">See all recipes</a>
			<a href="/">Home</a>
    	</div>   
    	<table class="table table-striped">
      		<thead>
        		<tr>
		  			<td>product_name &nbsp&nbsp</td>
          			<td>exp_date &nbsp&nbsp&nbsp&nbsp</td>
          			<td>qty &nbsp&nbsp</td>
					<td>weight &nbsp&nbsp</td>
					<td>details &nbsp&nbsp</td>
          			<td colspan = 2>Actions</td>
        		</tr>
    		</thead>
      		<tbody>

			  	@foreach($products as $item)
        			<tr>
		  				<td>{{$item->product_name}}</td>
          				<td>{{$item->exp_date }}</td>
          				<td>{{$item->qty }}</td>
						<td>{{$item->weight }}</td>
						<td>{{$item->details }}</td>
          				<td>
              				<a href="{{ route('products.edit',$item->product_id)}}" class="btn btn-primary">Edit</a>
          				</td>
          				<td>
            				<form action="{{ route('products.destroy', $item->product_id)}}" method="post">
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
	<br>
  	@if(session()->get('success'))
		<div class="alert alert-success">
	  		{{ session()->get('success') }} 
    	</div>
  	@endif
</div>

@endsection
