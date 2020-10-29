<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    public function index()
    {
        $data = Product::orderBy('id', 'DESC')->get();
        return view('admin.product.manage', compact('data'));
    }

    public function create()
    {
        return view('admin.product.add');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|min:5|max:20',
            'image' => 'required',
            'url' => 'required',
            'start' => 'required',
            'end' => 'required',
        ]);
        $image = [];
        $i = 1;
        if ($request->hasFile('image')) {
            foreach ($request->file('image') as $file) {
                $fileEx = $file->getClientOriginalExtension();
                $fileName = date('Ymdhis_') . $i . '.' . $fileEx;

                Image::make($file)
                    ->resize(300, 300)
                    ->save(public_path('uploads/slider/') . $fileName);
                $image[] = $fileName;
                $i++;
            }
        }


        $slider = new Slider();
        $slider->title = $request->title;
        $slider->sub_title = $request->sub_title;
        $slider->image = json_encode($image);
        $slider->url = $request->url;
        $slider->start = $request->start;
        $slider->end = $request->end;
        $slider->save();
        Session::flash('success', 'Slider has been successfully created.');
        return redirect()->back();
    }

    public function inactive($id)
    {
        $slider = Product::find($id);
        $slider->status = 0;
        $slider->save();
        Session::flash('danger', 'Inactive success!');
        return back();
    }

    public function active($id)
    {
        $slider = Product::find($id);
        $slider->status = 1;
        $slider->save();
        Session::flash('success', 'Active success!');
        return back();
    }

    public function edit($id)
    {
        $data = Product::find($id);
        return view('admin.product.edit', compact('data'));
    }

    public function update(Request $request)
    {
        $product_id = $request->product_id;
        $product = Product::find($product_id);
        $product->name = $request->name;
        $product->slug = $this->slug_generator($request->name);
        $product->save();
        Session::flash('success', 'Update successfully!');
        return redirect(route('manage-category'));
    }

    //Image Delete
    public function delete($id)
    {
        try {
            $product = Product::find($id);
            foreach (json_decode($product->image) as $file) {
                unlink(public_path('uploads/product/') . $file);
            }
            $product->delete();
            Session::flash('danger', 'Delete successfully!');
            
        } catch (Exception $exception) {
            Session::flash('warning', 'Unable to delete!');
        }
        return back();
    }
}
