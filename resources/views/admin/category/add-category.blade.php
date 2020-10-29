@extends('layouts.app')

@section('content')
<div class="content-header">
    <!-- leftside content header -->
    <div class="leftside-content-header">
        <ul class="breadcrumbs">
            <li><i class="fa fa-home" aria-hidden="true"></i><a href="{{route('home')}}">Dashboard</a></li>
            <li><a href="javascript:avoid(0)"> Category</a></li>
            <li><a href="javascript:avoid(0)">Add Category</a></li>
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


                            <form class="form-horizontal" action="{{ route('save-category') }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label for="category_name" class="col-sm-4 control-label">Category Name</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" name="category_name" id="category_name" placeholder="Category Name" value="{{old('category_name')}}" data-validation="required">
                                        @error('category_name')
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


                        </div> F
                    </div>
                </div>
            </div>
            
            <div>
                <div class="centerer">
                    <script type="text/javascript" src="https://fdn.gsmarena.com/vv/assets12/js/3dspinhelp.js?v=2"></script>
                    <script type="text/javascript">
                        showSpin("https://fdn.gsmarena.com/vv/spin/asus-selfie.swf");
                    </script>
                    <div class="spin-360-deg" draggable="false" id="spin-360-n1" style="height: 450px;"><canvas width="400" height="450"></canvas>
                        <div class="spin-360-arrows" style="opacity: 0;"></div>
                    </div>
                </div>


                <p>&nbsp;</p>
                <div class="normal-text">
                    <p>
                        Drag to rotate, double-click to spin 360°.
                        &nbsp;<br></p>
                    <p>&nbsp;</p>
                </div>
                <br class="clear">
            </div>
            
        </div>
    </div>


</div>






@endsection