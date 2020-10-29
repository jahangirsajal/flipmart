<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use Session;

class CategoryController extends Controller
{
    public function manage(){
        $data=Category::orderBy('id', 'DESC')->get();        
        return view('admin.category.manage-category', compact('data'));
    }

    public function add(){
        return view('admin.category.add-category');
    }

    public function save(Request $request){
            $request->validate([
                'category_name' => 'required|unique:categories,category_name',
            ]);
            $categories = new Category();
            $categories->category_name = $request->category_name;
            $categories->category_slug = $this->slug_generator($request->category_name);
            $categories->save();    
            Session::flash('success', 'Saved successfully!');           
            return back();
    }

    public function inactive($id){
        $category = Category::find($id);
        $category->status = 0;
        $category->save();
        Session::flash('success', 'Category inactive success!');
       return back(); 
    }

    public function active($id){
        $category = Category::find($id);
        $category->status = 1;
        $category->save();
        Session::flash('success', 'Category active success!');
       return back(); 
    }

    public function edit($id){
        $data =Category::find($id);
        return view('admin.category.edit-category', compact('data'));
    }

    public function update(Request $request){
            $category_id = $request->category_id;
            $category = Category::find($category_id);
            $category->category_name = $request->category_name;
            $category->category_slug = $this->slug_generator($request->category_name);
            $category->save();    
            Session::flash('success', 'Update successfully!');           
            return redirect (route('manage-category'));
    }

    public function delete($id){
        $category = Category::find($id);
        $category->delete();
        return back(); 
    }
 

    //Slug name function
    public function slug_generator($string){
        $string = str_replace(' ', '-', $string);
        $string = preg_replace('/[^A-Za-z0-9\-]/', '-', $string);
        return strtolower(preg_replace('/-+/', '-', $string));
    }
}
