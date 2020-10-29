<?php

namespace App\Http\Controllers;

use App\SubCategory;
use App\Category;
use Session;

use Illuminate\Http\Request;

class SubCategoryController extends Controller
{
    public function subManage()
    {
        $data = SubCategory::with('category')->get();
        return view('admin.category.manage-subcategory', compact('data'));
    }

    public function add()
    {
        $data = Category::orderBy('category_name', 'ASC')->where('status', 1)->get();
        return view('admin.category.add-subcategory', compact('data'));
    }

    public function save(Request $request)
    {
        $request->validate([            
            'subcategory_name' => 'required|min:5|max:20',
        ]);
        $subcategory = new SubCategory();
        $subcategory->category_id = $request->category_id;
        $subcategory->subcategory_name = $request->subcategory_name;
        $subcategory->save();
        Session::flash('success', 'Sub Category successfully!');
        return back();
    }

    public function active($id)
    {
        $subcategory = SubCategory::find($id);
        $subcategory->status = 1;
        $subcategory->save();
        Session::flash('success', 'Category active success!');
        return back();
    }

    public function inactive($id)
    {
        $subcategory = SubCategory::find($id);
        $subcategory->status = 0;
        $subcategory->save();
        Session::flash('success', 'Category inactive success!');
        return back();
    }

    public function edit($id)
    {
        $categories = Category::orderBy('category_name', 'ASC')->where('status', 1)->get();
        $subcategory = SubCategory::find($id);
        return view('admin.category.edit-subcategory', compact('categories', 'subcategory'));
    }

    public function update(Request $request)
    {
        $request->validate([            
            'subcategory_name' => 'required|min:5|max:20',
        ]);
        $subcategory_id = $request->subcat_id;
        $subcategory = SubCategory::find($subcategory_id);
        $subcategory->subcategory_name = $request->subcategory_name;
        $subcategory->category_id = $request->category_id;
        $subcategory->save();
        Session::flash('success', 'Update successfully!');
        return redirect(route('manage-subcategory'));
    }

    public function delete($id)
    {
        $category = SubCategory::find($id);
        $category->delete();
        return back();
    }
}
