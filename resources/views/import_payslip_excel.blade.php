@extends('layouts.master')
@php
    // Define the page description in the child view
    $page_description = 'Description for the index page';
@endphp
@section('content')
<div class='row'>
  <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Hover Data Table</h3>
            </div>
            <!-- /.box-header -->
			<form class="" role="form" method="POST" action="{{ url('importexcel') }}" enctype="multipart/form-data">
             {{ csrf_field() }}
			<div class="box-body">
				<div class="form-group">
                  <label for="exampleInputFile">File Upload</label>
                  <input type="file" id="exampleInputFile" name="excel">

                  <p class="help-block">You have to upload pre-formated excel. Please <a download href="{{ asset('/excel/excel.xls')}}">download</a> it here</p>
                </div>
			</div><!-- /.box-body -->
			<div class="box-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
             </div>
			</form> 
			@if( Session::has('success') )
            <div class="alert alert-success">
                <button type="button" class="close fui-cross" data-dismiss="alert"></button>
                {{ Session::get('success') }}
            </div>
            @endif
            @if( Session::has('error') )
            <div class="alert alert-error">
                <button type="button" class="close fui-cross" data-dismiss="alert"></button>
                {{ Session::get('error') }}
            </div>
            @endif
			
			</div><!-- /.box -->
      </div>
</div><!-- /.row -->
@endsection