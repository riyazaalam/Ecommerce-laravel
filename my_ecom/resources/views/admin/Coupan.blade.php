@extends('admin/layout')

@section('page_title','Coupan')
@section('coupan_select','active')

@section('container')
<h1 class="mb10">Coupan:</h1>
<a href="{{url('admin/coupan/manage_coupan')}}">
           <button type="submit" class="btn btn-success btn-sm"> <i class="fa fa-plus-circle"></i> Add Coupan </button></a>
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
                        <th>Title</th>
                        <th>Code</th>
                        <th>Value</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                   
                @foreach($data as $list)
                    <tr>
                        <td>{{$no++}}</td>
                        <td>{{$list->title}}</td>
                        <td>{{$list->code}}</td>
                        <td>{{$list->value}}</td>
                        <td> <li class="list-inline-item">
                        @if($list->status==1)
             &nbsp; <a href="{{url('admin/coupan/status/0')}}/{{$list->id}}">  <button class="button button--pan" type="button" data-toggle="tooltip" data-placement="top" title="status">Active</button>
</a> </li>
            @elseif($list->status==0) 
            <a href="{{url('admin/coupan/status/1')}}/{{$list->id}}">  <button class="button button--mimas" type="button" data-toggle="tooltip" data-placement="top" title="status">Deactive</button>
</a> </li>                       
@endif
                        <a href="{{url('admin/coupan/manage_coupan/')}}/{{$list->id}}">  <button class="btn btn-success btn-sm rounded-0" type="button" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-edit"></i></button>
</a> </li>

                          <li class="list-inline-item">
             <a href="{{url('admin/coupan/delete/')}}/{{$list->id}}" >  <button class="btn btn-danger btn-sm rounded-0" type="button" data-toggle="tooltip" data-placement="top" title="Trash"><i class="fa fa-trash"></i></button>
</a></li></td>
                    </tr>
                  @endforeach
                  
                  
                </tbody>
            </table>
        </div>
        <!-- END DATA TABLE-->

        @endsection