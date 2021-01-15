@extends('base')

@section('main')

<div class="topnav">
  
  <div >
  	<a style="margin: 5px;" href="/" class="btn btn-info">Home</a>
	  <a style="margin: 5px;" href="/products" class="btn btn-info">Products</a>
  	<a style="margin: 5px;" href="/recipes" class="btn btn-info">Recipes</a>
  </div>   

</div> 

<div class="row">
<div class="col-sm-12">
    	<h1 class="display-4" style="text-align:center;">Products</h1>

		<form class="form-inline" style="margin-left:80%">
			<input type="text"  size="15"  id="insearch" name="insearch" placeholder="Search for product" >
    		<button type="submit" class="btn btn-primary">Go</button>
		</form>

		<br></br>
		<a style="margin-bottom: 2%;" href="{{ route('products.create')}}" class="btn btn-primary">Add New Product</a>  	

    	<table class="table table-striped">
      		<thead>
        		<tr>
					<td><b>Product Name</b> &emsp;</td>
          			<td><b>Expiration Date</b> &emsp;</td>
          			<td><b>Quantity</b> &emsp;</td>
					<td><b>Weight</b> &emsp;</td>
					<td><b>Details</b> &emsp;</td>
          			<td colspan = 2><b>Actions</b></td>
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

<br></br><br></br>
<form action="{{ route('CreateQuestion.store') }}" method="post">
  <div class="form-group">
    <label for="1stquestion" style="font-size:18px" >Search for recipes containing the following ingredient: </label>
	<br>
    <input type="text" size="20" id="ingredient" name="ingredient" placeholder="ingredient" >
    <button type="submit" class="btn btn-primary">Search</button>
  </div>
</form>

@endsection
