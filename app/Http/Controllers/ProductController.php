<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
		$products = Product::all();
		$product_types = ProductType::all();
		$items = DB::table('product_types')
					->join('products', 'product_types.product_type_id', '=', 'products.product_type')
					->select('product_id', 'product_name', 'product_brand', 'exp_date', 'exp_date_after_opening', 'opened_at', 'qty', 'price', 'type')
					->get();
        return view('products.index', ['products' => $products, 'items' => $items]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('products.create');
    }

    /**
     * Store a newly created resource in storage.
	 * 
	 * The regex for the price and qty fields (double) is probably enough
	 * A double qty input, e.g. 0.25,  means 250 gr, we inform the user about 
	 * it. (instead of creating a new table that will contain these values, cause
	 * then we will have more trouble with the frontend that we hate)
	 * 
	 * After validation we EITHER search OR create a new product_type entry.
	 * Next we create such an entry in the product_type table if it does not exist already.
	 * 
	 * Finally, when we create the $product we assign the proper 
	 * id on it's  product_type  field.
	 * 
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {	
		
        $request->validate([
            'product_name'			 => 'required', 
            'product_brand'			 => 'nullable', 
			'exp_date'     			 => 'required|date', 
			'exp_date_after_opening' => 'nullable|date', 	
			'opened_at'				 => 'nullable|date', 
			'qty'                 	 => 'required|regex:/^\d+(\.\d{1,3})?$/', 
			'price'					 => 'nullable|regex:/^\d+(\.\d{1,3})?$/'
		]);
		
		$product_type = ProductType::firstOrCreate([
			'type' => $request->get('type')
		]);

        $product = new Product([
			'product_name'			 => $request->get('product_name'), 
			'product_brand'			 => $request->get('product_brand'), 
        	'exp_date'				 => $request->get('exp_date'), 
        	'exp_date_after_opening' => $request->get('exp_date_after_opening'), 
        	'opened_at'				 => $request->get('opened_at'), 
        	'qty'					 => $request->get('qty'), 
			'price'				 	 => $request->get('price'), 
			'product_type'			 => $product_type->product_type_id
		]);
		
        $product->save();
        return redirect('/products')->with('success', 'product saved!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
		$product = Product::find($id);
		return view('products.edit', ['product' => $product]);
    }

    /**
	 * Try checking the comment section of the store() method.
	 * 
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {   
        $request->validate([
            'product_name'			 => 'required', 
            'product_brand'			 => 'nullable', 
			'exp_date'     			 => 'required|date', 
			'exp_date_after_opening' => 'nullable|date', 	
			'opened_at'				 => 'nullable|date', 
			'qty'                 	 => 'required|regex:/^\d+(\.\d{1,3})?$/', 			
			'price'					 => 'nullable|regex:/^\d+(\.\d{1,3})?$/'
		]);

		// Check if the product type exists in the db. If not, create a new.
		$product_type = ProductType::firstOrCreate([
			'type' => $request->get('type')
		]);
		$product = Product::find($id);
		$product->product_brand			 = $request->get('product_brand');
        $product->exp_date				 = $request->get('exp_date');
        $product->exp_date_after_opening = $request->get('exp_date_after_opening');
        $product->opened_at				 = $request->get('opened_at');
        $product->qty					 = $request->get('qty');
        $product->price				 	 = $request->get('price');
		$product->product_type			 = $product_type->product_type_id;

        $product->save();
        return redirect('/products')->with('success', 'product updated!');
    }

    /**
     * Removes a product from the database.
	 * 
	 * We have an error here. 
	 * How this method should work:
	 * 
	 * When we delete a product we should check the table
	 * product_types. 
	 * 
	 * IF THE product_type OF THE PRODUCT TO BE REMOVED  
	 * is also defined and EXISTS AS A PRODUCT TYPE OF ANOTHER PRODUCT
	 * then we should NOT remove the product_type entry.
	 * 
	 * If the product that we are going to delete, has a unique 
	 * product_type and this product_type is not associated with any 
	 * other products, we should also delete the product_type entry.
	 * 
	 * (we can use the count() method of the Laravel Query Builder 
	 *  to do the above)
	 * 
	 * What we had originally thought was to present to user a dropdown 
	 * menu when he is creating or updating a product type, and for this reason
	 * we thought that NOT removing the product_type entry will give the user 
	 * more options from the dropdown menu. We did not implement that though, 
	 * so this can be considered an error, as the table product_types may contain 
	 * types of products that do not exist.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::find($id);
        $product->delete();

        return redirect('/products')->with('success', 'product deleted!');
    }
}
