@extends('base')

@section('main')
<div class="row">
    <div class="col-sm-8 offset-sm-2">
        <h1 class="display-3" style="text-align:center;">Update a product</h1>

        @if ($errors->any())
        	<div class="alert alert-danger">
            	<ul>
                	@foreach ($errors->all() as $error)
                		<li>{{ $error }}</li>
                	@endforeach
            	</ul>
        	</div>
        	<br/>
        @endif

		<form method="post" action="{{ route('products.update', $product->product_id) }}">
            @method('PATCH')
            @csrf

            <div class="form-group" style="text-align:center;">
              	<label for="product_name">Product Name: (e.g. Yogurt 5%)</label><br>
              	<input type="text" class="form-control" name="product_name" value={{$product->product_name}}>
			</div>
			<br>
		  	<div class="form-group" style="text-align:center;">
              	<label for="product_brand">Product Brand: (e.g. Total)</label><br>
              	<input type="text" class="form-control" name="product_brand" value={{$product->product_brand}}>
          	</div>
			<br>
			<div class="form-group" style="text-align:center;">
              	<label for="exp_date">Expiration Date:</label><br>
              	<input type="text" class="form-control" name="exp_date" value={{$product->exp_date}}>
          	</div>
			<br>
			<div class="form-group" style="text-align:center;">
              	<label for="exp_date_after_opening">Exp. Date After Opening:</label><br>
            	<input type="text" class="form-control" name="exp_date_after_opening" value={{$product->exp_date_after_opening}}>
			</div>
			<br>
          	<div class="form-group" style="text-align:center;">
              	<label for="opened_at">Opened At:</label><br>
              	<input type="text" class="form-control" name="opened_at" value={{$product->opened_at}}>
			</div>
			<br>
          	<div class="form-group" style="text-align:center;">
              	<label for="qty">Quantity: (in kg or lb, e.g. 250 gr) </label><br>
              	<input type="number" step="0.001" min=0 class="form-control" name="qty" value={{$product->qty}}>
			</div>
			<br>
          	<div class="form-group" style="text-align:center;">
              	<label for="price">Price:</label><br>
              	<input type="number" step="0.001" min=0 class="form-control" name="price" value={{$product->price}}>
          	</div>
			<br>
			<div class="form-group" style="text-align:center;">
            	<label for="type">Category<br/>e.g. for Lamb Chops enter Lamb, for Yogurt 5% enter Yogurt:</label><br/>
    	    	<input type="text" class="form-control" name="type" >
			</div>
			<br>
            <button type="submit" class="btn btn-primary" style="margin-left:46.5%; margin-right:50%; margin-top:15px;">
				Update
			</button>
        </form>
    </div>
</div>
@endsection
