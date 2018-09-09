<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Product;

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
		return view('product.products', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
		$categories = Category::pluck('title','id');
          
        return view('product.create_product', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate(request(),
        			array(
        				'name' => 'required|min:3',
        				'category' => 'required'
        			)
        		);
        $new_product = Product::create(request(array('name')));
        $category_ids = $request->input('category');
        $product = Product::find($new_product->id);
        $product->categories()->attach($category_ids);
        return redirect('/products');
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
    public function edit(Product $product)
    {
		$categories = Category::pluck('title','id');
          
        return view('product.create_product', compact('categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $categories = Category::find($request->categories);
    	$product->categories()->sync($categories->pluck('id')->all());
    	
    	$this->validate(request(),
        			array(
        				'name' => 'required|min:3',
                        'categories' => 'required'
        			)
        		);
    	$product->update(
    				request(array('title'))
    			);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
	 {
    	$product->delete();
    	return redirect('/products');
    }
}
