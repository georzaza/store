@extends('base')

@section('main')

<div class="topnav">
  <a class="active" href="/">Home</a>
  <a href="/products">Products</a>
  <a href="/recipes">Recipes</a>
</div> 


<div class="row">
  <div class="col-sm-8 offset-sm-2">
    <h1 class="display-3" style="text-align:center;">Add a product</h1>
  <div>
    @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
        </ul>
      </div><br />
    @endif

    <form method="post" action="{{ route('products.store') }}">
        @csrf
		  
        <div class="form-group"	style="text-align:center; padding:0.5% 0.5%;>    
            <label for="product_name">Product Name:</label><br/>
            <input type="text" class="form-control" name="product_name" placeholder="e.g. Yogurt"/>
        </div>
		    
        <div class="form-group" style="text-align:center; padding:0.5% 0.5%;">    
            <label for="exp_date">Expiration Date:</label><br/>
            <input type="date" class="form-control" name="exp_date"/>
        </div>
        <div class="form-group" style="text-align:center; padding:0.5% 0.5%;">    
            <label for="qty">Quantity</label><br/>
            <input type="number" step="1" min=0 class="form-control" name="qty"/>
        </div>
        <div class="form-group" style="text-align:center; padding:0.5% 0.5%;">    
            <label for="price">Weight:<br>(enter in Kg) </label><br/>
    	    <input type="number" step="0.01" min=0 class="form-control" name="price"/>
        </div>
	    	<div class="form-group" style="text-align:center; padding:0.5% 0.5%;">    
            <label for="type">Details</label><br/>
            <input type="text" size="40" maxlength="120" class="form-control" name="details" placeholder="e.g. with chocolate, 5% or whatever" />
        </div>

		<div class="form-group" style="text-align:center; padding:0.5% 0.5%;">
        	<button type="submit" class="btn btn-primary-outline" style="margin-left:46.5%; margin-right:50%; margin-top:15px;"
			  	>Add product
			</button>
		</div>
      </form>
  </div>
</div>
</div>
@endsection
