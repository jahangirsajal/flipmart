<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Slider;
use Session;
use Image;
use Exception;



class SliderController extends Controller
{
    public function index()
    {
        $data = Slider::orderBy('id', 'DESC')->get();
        return view('admin.slider.manage', compact('data'));
    }

    public function create()
    {
        return view('admin.slider.add');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|min:5|max:20',
            'sub_title' => 'required|min:5|max:30',
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
        $slider = Slider::find($id);
        $slider->status = 0;
        $slider->save();
        Session::flash('danger', 'Inactive success!');
        return back();
    }

    public function active($id)
    {
        $slider = Slider::find($id);
        $slider->status = 1;
        $slider->save();
        Session::flash('success', 'Active success!');
        return back();
    }

    public function edit($id)
    {
        $data = Slider::find($id);
        return view('admin.slider.edit', compact('data'));
    }

    public function update(Request $request)
    {
        $category_id = $request->category_id;
        $category = Slider::find($category_id);
        $category->category_name = $request->category_name;
        $category->category_slug = $this->slug_generator($request->category_name);
        $category->save();
        Session::flash('success', 'Update successfully!');
        return redirect(route('manage-category'));
    }

    //Image Delete
    public function delete($id)
    {
        try {
            $slider = Slider::find($id);
            foreach (json_decode($slider->image) as $file) {
                unlink(public_path('uploads/slider/') . $file);
            }
            $slider->delete();
            Session::flash('danger', 'Delete successfully!');
            
        } catch (Exception $exception) {
            Session::flash('warning', 'Unable to delete!');
        }
        return back();
    }
}
