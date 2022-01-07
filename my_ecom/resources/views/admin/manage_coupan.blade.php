@extends('admin/layout')

@section('page_title','Manage_Coupan')

@section('container')
<h1 class="mb10">Manage Coupan:</h1>
<a href="{{url('admin/coupan')}}">
    <button type="submit" class="btn btn-success btn-sm"> <i class="fa fa-arrow-circle-left"></i> Back </button></a>
<div class="row m-t-30">
    <div class="col-md-12">
        <!-- DATA FORM-->
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">Manage Coupan</div>
                    <div class="card-body">
                      
                        <form action="{{route('coupan.manage_coupan_process')}}" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="title" class="control-label mb-1">Title</label>
                                <input id="title" name="title" type="text" class="form-control"
                                    aria-required="true" aria-invalid="false"  value="{{$title}}" placeholder="Enter Title">
                                    @error('title')
                      <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                            </div>
                            <div class="form-group">
                                <label for="code" class="control-label mb-1">Code</label>
                                <input id="code" name="code" type="text" class="form-control"
                                    aria-required="true" aria-invalid="false"  value="{{$code}}" placeholder="Enter Code" >
                                    @error('code')
                      <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                                </div>
                                <div class="form-group">
                                <label for="value" class="control-label mb-1">Value</label>
                                <input id="value" name="value" type="text" class="form-control"
                                    aria-required="true" aria-invalid="false"  value="{{$value}}" placeholder="Enter Value" >
                                    @error('value')
                      <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                                </div>
                          
                           

                            <div>
                                <button id="payment-button" type="submit" class="btn btn-lg btn-info btn-block">
                                    <i class="fa fa-save"></i>&nbsp;
                                    <span id="payment-button-amount">Add Coupan</span>
                                    
                                </button>
                                <input type="hidden" name="id" value="{{$id}}"/>
                            </div>
                           
                        </form>
                       
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<!-- END DATA FORM-->

@endsection