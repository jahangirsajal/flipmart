@extends('layouts.app')

@section('content')
<div class="content-header">
    <!-- leftside content header -->
    <div class="leftside-content-header">
        <ul class="breadcrumbs">
            <li><i class="fa fa-home" aria-hidden="true"></i><a href="{{route('home')}}">Dashboard</a></li>
            <li><a href="javascript:avoid(0)"> Sub Category</a></li>
            <li><a href="javascript:avoid(0)">Add Sub Category</a></li>
        </ul>
    </div>
</div>

<div class="row">
    <div class="row">
        <div class="col-sm-12 col-md-8 col-md-offset-2">

            @include('includes.message')

            <div class="panel">
                <div class="panel-content">
                    <div class="text-right">
                        <a class="btn btn-primary text-rigth" href="{{route('manage-subcategory')}}">All Sub Category</a>
                    </div>
                    <div class="row">
                        <div class="col-md-12">


                            <form class="form-horizontal" action="{{ route('save-subcategory') }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label for="category" class="col-sm-4 control-label">Category Name</label>
                                    <div class="col-sm-8">
                                        <select class="form-control" id="category" name="category_id">
                                            <option value="">-- Select Category --</option>
                                            @foreach($data as $row)
                                            <option value="{{ $row->id}}">{{ ucwords($row->category_name)}}</option>
                                            @endforeach
                                        </select>

                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="subcategory" class="col-sm-4 control-label">Sub Category Name</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" name="subcategory_name" id="subcategory" placeholder="Sub Category Name" value="" data-validation="required">
                                        @error('subcategory_name')
                                        <strong class="text-danger">{{$message}}</strong>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-sm-offset-4 col-sm-8">
                                        <button type="submit" class="btn btn-primary">Save</button>
                                    </div>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection