@extends('layouts.app')

@section('content')
<div class="content-header">
    <!-- leftside content header -->
    <div class="leftside-content-header">
        <ul class="breadcrumbs">
            <li><i class="fa fa-home" aria-hidden="true"></i><a href="{{route('home')}}">Dashboard</a></li>
            <li><a href="javascript:avoid(0)"> Slider</a></li>
            <li><a href="javascript:avoid(0)">Manage Slider</a></li>
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
                        <a class="btn btn-primary text-rigth" href="{{route('sliders.create')}}">Add Slider</a>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="table-responsive">
                                <table id="basic-table" class="data-table table table-striped nowrap table-hover table-bordered" cellspacing="0" width="100%">
                                    <thead>
                                        <tr>
                                            <th>SL No.</th>
                                            <th>Title</th>
                                            <th>Image</th>
                                            <th>Sub Title</th>
                                            <th>Date</th>
                                            <th>URL</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        @foreach($data as $row)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{substr($row->title,0,20)}}</td>
                                            <td>
                                                @php($images = json_decode($row->image))
                                                @foreach ($images as $image)
                                                <img style="width: 60px" src="{{asset('uploads/slider/'.$image)}}" alt="image">
                                                @endforeach
                                            </td>
                                            <td> {{substr($row->sub_title,0,30)}}</td>
                                            <td> {{$row->start .' to '. $row->end}}</td>
                                            <td>
                                                <a href="{{$row->url}}" target="_blank" class="btn btn-primary btn-xs">Click Here</a>
                                            </td>
                                            <td>
                                                @if($row->status ==1)
                                                <strong class="text-success">Active</strong>
                                                @else
                                                <strong class="text-danger">Inactive</strong>
                                                @endif
                                            </td>
                                            <td>
                                                @if($row->status == 1)
                                                <a href="{{route('sliders.inactive', $row->id) }}" class="btn btn-warning btn-xs"> <i class="fa fa-arrow-down"></i> </a>
                                                @else
                                                <a href="{{route('sliders.active', $row->id) }}" class="btn btn-primary btn-xs"> <i class="fa fa-arrow-up"></i> </a>
                                                @endif
                                                <a href="{{route('sliders.edit', $row->id) }}" class="btn btn-success btn-xs"> <i class="fa fa-pencil"></i> </a>
                                                <a href="{{route('sliders.delete', $row->id) }}" class="btn btn-danger btn-xs" onclick="return confirm('Are you sure?')"> <i class="fa fa-trash"></i> </a>
                                            </td>
                                        </tr>
                                        @endforeach

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



@endsection