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
        return view('home', compact('categories'));
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
	
	 public function edit(Category $category)
	{
        return view('edit_category', compact('category'));
    }
	
    public function update(Category $category)
	{
    	$this->validate(request(),
        			array(
        				'title' => 'required|min:3'
        			)
        		);
    	$category->update(
    				request(array('title'))
    			);
       return redirect('/'); 
    }
	
	 public function destroy(Category $category)
	 {
    	$category->delete();
    	return redirect('/home');
    }
}
