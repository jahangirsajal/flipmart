@extends('layouts.app')

@section('content')
<div class="content-header">
    <!-- leftside content header -->
    <div class="leftside-content-header">
        <ul class="breadcrumbs">
            <li><i class="fa fa-home" aria-hidden="true"></i><a href="{{route('home')}}">Dashboard</a></li>
            <li><a href="javascript:avoid(0)"> Slider</a></li>
            <li><a href="javascript:avoid(0)">Add Slider</a></li>
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
                        <a class="btn btn-primary text-rigth" href="{{route('sliders.manage')}}">All Slider</a>
                    </div>
                    <div class="row">
                        <div class="col-md-12">


                            <form class="form-horizontal" action="{{ route('sliders.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label for="title" class="col-sm-4 control-label">Title</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" name="title" id="title" placeholder="Slider Name" value="{{old('title')}}">
                                        @error('title')
                                        <strong class="text-danger">{{$message}}</strong>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="sub_title" class="col-sm-4 control-label">Sub Title</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" name="sub_title" id="sub_title" placeholder="Sub Title" value="{{old('sub_title')}}">
                                        @error('sub_title')
                                        <strong class="text-danger">{{$message}}</strong>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="url" class="col-sm-4 control-label">URL</label>
                                    <div class="col-sm-8">
                                        <input type="url" class="form-control" name="url" id="url" placeholder="URL" value="{{old('url')}}" >
                                        @error('url')
                                        <strong class="text-danger">{{$message}}</strong>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="start" class="col-sm-4 control-label">Start Date</label>
                                    <div class="col-sm-8">
                                        <input type="date" class="form-control" name="start" id="start" placeholder="YYYY-MM-DD" value="{{old('start')}}" >
                                        @error('start')
                                        <strong class="text-danger">{{$message}}</strong>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="end" class="col-sm-4 control-label">End Date</label>
                                    <div class="col-sm-8">
                                        <input type="date" class="form-control" name="end" id="end" placeholder="YYYY-MM-DD" value="{{old('end')}}" >
                                        @error('end')
                                        <strong class="text-danger">{{$message}}</strong>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="image" class="col-sm-4 control-label">Image</label>
                                    <div class="col-sm-8">
                                        <input type="file" class="form-control" name="image[]" multiple placeholder="URL"  >
                                        @error('image')
                                        <strong class="text-danger">{{$message}}</strong>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-sm-offset-4 col-sm-8">
                                        <input type="submit" class="btn btn-primary" value="Submit">
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