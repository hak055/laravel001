<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Product;

class CategoryController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
		$categories = category::all();
		$products = product::all();
        return view('home', compact('categories', 'products'));
    }
	
	public function create()
    {		    	
      return view('create_category');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $category = new category;
		
		$this->validate($request, [
		'title'=>'required|unique:categories',
        ]);
		$category->title = $request->title;
		
        $category->save();
        return redirect('/home');		
    }
	
	public function show($id)
	{
		$category= Category::find($id);
		return view('show_category', compact('category'));		
		
	}
	
	 public function edit($id)
	{
		$category = Category::find($id);
		
        return view('edit_category', compact('category'));
    }
	
    public function update(Request $request, $id)
	{
		
    	$this->validate(request(),
        			array('title' => 'required|min:1'
        			));
					
		$category = Category::find($id);
		$category->title = $request->input('title');
		$category->update();
    	
       return redirect('/home'); 
    }
	
	 public function destroy(Category $category)
	 {
    	$category->delete();
    	return redirect('/home');
    }
}
