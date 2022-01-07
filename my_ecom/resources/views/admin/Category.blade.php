@extends('admin/layout')

@section('page_title','Category')
@section('category_select','active')

@section('container')
<h1 class="mb10">Category:</h1>
<a href="category/manage_category">
           <button type="submit" class="btn btn-success btn-sm"> <i class="fa fa-plus-circle"></i> Add Category </button></a>
<div class="row m-t-30">
    <div class="col-md-12">
        <!-- DATA TABLE-->
        <div class="table-responsive m-b-40">
        <div class="alert alert-success" role="alert">
                                    {{session('success')}}
                            </div>
                            <div class="alert alert-info" role="alert">
                                    {{session('message')}}
                            </div>
            <table class="table table-borderless table-data3">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Date</th>
                        <th>Category Name</th>
                        <th>Category Slug</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($data as $list)
                    <tr>
                        <td>{{$no++}}</td>
                        <td>{{$list->created_at}}</td>
                        <td>{{$list->category_name}}</td>
                        <td>{{$list->category_slug}}</td>
                        <td> <li class="list-inline-item">
                        @if($list->status==1)
             &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <a href="{{url('admin/category/status/0')}}/{{$list->id}}">  <button class="btn btn-outline-primary" type="button" data-toggle="tooltip" data-placement="top" title="status">Active</button>
</a> </li>
            @elseif($list->status==0) 
            <a href="{{url('admin/category/status/1')}}/{{$list->id}}">  <button class="btn btn-outline-warning" type="button" data-toggle="tooltip" data-placement="top" title="status">Deactive</button>
</a> </li>                       
@endif
                        <a href="{{url('admin/category/manage_category/')}}/{{$list->id}}">  <button class="btn btn-success btn-sm rounded-0" type="button" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-edit"></i></button>
</a> </li>
                           
                          <li class="list-inline-item">
             <a href="{{url('admin/category/delete/')}}/{{$list->id}}" >  <button class="btn btn-danger btn-sm rounded-0" type="button" data-toggle="tooltip" data-placement="top" title="Trash"><i class="fa fa-trash"></i></button>
</a></li></td>
                    </tr>
                  @endforeach
                  
                  
                </tbody>
            </table>
        </div>
        <!-- END DATA TABLE-->

        @endsection