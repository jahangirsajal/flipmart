<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Brand;
use Session;
use Symfony\Contracts\Service\Attribute\Required;

class BrandController extends Controller
{
    public function add(){
        return view('admin.brand_add');
    }

    public function save(Request $request){
        // Brand::create([
        // 'brand_name' => $request->brand_name,
        // 'brand_slug' => $request->brand_name,
        // ]);
        $request->validate([
            'brand_name' => 'required|unique:brands,brand_name',
        ]);
        $brands = new Brand();
        $brands->brand_name = $request->brand_name;
        $brands->brand_slug = $this->slug_generator($request->brand_name);
        $brands->save();

        Session::flash('success', 'Saved successfully!');
        // return redirect()->back()->with('brandSave', 'Brand saved');
        // redirect()->back()->with('brandAdd', 'Brand added successfully.');
        return back();
    }

    public function manage(){
        $brands=Brand::orderBy('id', 'DESC')->get();

        return view('admin.brand_list', compact('brands'));
    }  

       //Brand Inactive
    public function inactive($id){
       $brand = Brand::find($id);
       $brand->status = 0;
       $brand->save();

       Session::flash('success', 'Brand inactive success!');

       return back();    
    }

    //Brand Active
    public function active($id){
        $brand = Brand::find($id);
        $brand->status = 1;
        $brand->save(); 
        Session::flash('success', 'Brand active success!');

        return back();    
    }    

    //Brand Edit 
    public function edit($id){
        $row = Brand::find($id);
        
        return view('admin.brand_edit', compact('row'));
    }

    //Brand Update
    public function update(Request $request){
        $brands = Brand::find($request->id);
        
        $brands->brand_name = $request->brand_name;
        $brands->brand_slug = $this->slug_generator($request->brand_name);
        $brands->save();

        Session::flash('success', 'Update successfully!');

        return redirect (route('manage-brand'));
    }

    //Brand delete
    public function delete($id){
        $brand = Brand::find($id);        
        $brand->delete(); 
        Session::flash('success', 'Brand delete success!');

        return back();    
    }    
     
   //Slug name function
    public function slug_generator($string){
        $string = str_replace(' ', '-', $string);
        $string = preg_replace('/[^A-Za-z0-9\-]/', '-', $string);

        return strtolower(preg_replace('/-+/', '-', $string));
    }
}
