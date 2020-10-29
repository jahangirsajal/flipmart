@extends('layouts.app')

@section('content')
<div class="content-header">
    <!-- leftside content header -->
    <div class="leftside-content-header">
        <ul class="breadcrumbs">
            <li><i class="fa fa-home" aria-hidden="true"></i><a href="{{route('home')}}">Dashboard</a></li>
            <li><a href="javascript:avoid(0)"> Category</a></li>
            <li><a href="javascript:avoid(0)">Edit Category</a></li>
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
                        <a class="btn btn-primary text-rigth" href="{{route('manage-category')}}">All Category</a>
                    </div>
                    <div class="row">
                        <div class="col-md-12">


                            <form class="form-horizontal" action="{{ route('update-category') }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label for="category_name" class="col-sm-4 control-label">Category Name</label>
                                    <input type="hidden" name="category_id" value="{{ $data->id }}">
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" name="category_name" id="category_name" placeholder="Category Name" value="{{ $data->category_name }}" data-validation="required" >
                                        @error('category_name')
                                        <strong class="text-danger">{{$message}}</strong>
                                        @enderror
                                    </div>

                                </div>

                                <div class="form-group">
                                    <div class="col-sm-offset-4 col-sm-8">
                                        <button type="submit" class="btn btn-primary">Update</button>
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