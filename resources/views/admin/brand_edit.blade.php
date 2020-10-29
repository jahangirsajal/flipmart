@extends('layouts.app')

@section('content')
<div class="content-header">
    <!-- leftside content header -->
    <div class="leftside-content-header">
        <ul class="breadcrumbs">
            <li><i class="fa fa-home" aria-hidden="true"></i><a href="{{route('home')}}">Dashboard</a></li>
            <li><a href="javascript:avoid(0)"> Brand</a></li>
            <li><a href="javascript:avoid(0)">Update Brand</a></li>
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
                        <a class="btn btn-primary text-rigth" href="{{route('manage-brand')}}">All Brand</a>
                    </div>
                    <div class="row">
                        <div class="col-md-12">


                            <form class="form-horizontal" action="{{ route('update-brand') }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label for="brand_name" class="col-sm-4 control-label">Brand Name</label>
                                    <div class="col-sm-8">
                                        <input type="hidden" name="id" value="{{$row->id}}">
                                        <input type="text" class="form-control" name="brand_name" id="brand_name" placeholder="Brand Name" value="{{ $row->brand_name }}" data-validation="required" >
                                        @error('brand_name')
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