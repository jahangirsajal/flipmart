@extends('layouts.app')

@section('content')
<div class="content-header">
    <!-- leftside content header -->
    <div class="leftside-content-header">
        <ul class="breadcrumbs">
            <li><i class="fa fa-home" aria-hidden="true"></i><a href="{{route('home')}}">Dashboard</a></li>
            <li><a href="javascript:avoid(0)">Sub Category</a></li>
            <li><a href="javascript:avoid(0)">Manage Sub Category</a></li>
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
                        <a class="btn btn-primary text-rigth" href="{{route('add-subcategory')}}">Add Sub Category</a>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="table-responsive">
                                <table id="basic-table" class="data-table table table-striped nowrap table-hover table-bordered" cellspacing="0" width="100%">
                                    <thead>
                                        <tr>
                                            <th>SL No.</th>
                                            <th>Sub Category</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php ($i=1)
                                        @foreach($data as $row)
                                        <tr>
                                            <td>{{ $i++ }}</td>
                                            <td>{{$row->subcategory_name}} <sub>({{$row->category->category_name}})</sub></td>
                                            <td>
                                                @if($row->status ==1)
                                                <strong class="text-success">Active</strong>
                                                @else
                                                <strong class="text-danger">Inactive</strong>
                                                @endif
                                            </td>
                                            <td>
                                                @if($row->status == 1)
                                                <a href="{{route('inactive-subcategory', $row->id) }}" class="btn btn-warning btn-xs"> <i class="fa fa-arrow-down"></i> </a>
                                                @else
                                                <a href="{{route('active-subcategory', $row->id) }}" class="btn btn-primary btn-xs"> <i class="fa fa-arrow-up"></i> </a>
                                                @endif
                                                <a href="{{route('edit-subcategory', $row->id) }}" class="btn btn-success btn-xs"> <i class="fa fa-pencil"></i> </a>
                                                <a href="{{route('delete-subcategory', $row->id) }}" class="btn btn-danger btn-xs"> <i class="fa fa-trash" onclick="return confirm('Sure to Delete?')"></i> </a>
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