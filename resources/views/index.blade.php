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
              <h3 class="box-title">Imported Data Table</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
            <?php //print_r($bat_info); exit; ?>
            <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>Batch No.</th>
                  <th>Generated Date</th>
                  <th>Generated By</th>
                  <th>Data Count</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($bat_info as $val)
                <?php
                if(is_array($val)) {
                    $id = isset($val['id']) ? $val['id'] : '';
                    $gen_date = isset($val['gen_date']) ? date('Y/m/d', strtotime($val['gen_date'])) : '';
                    $name = isset($val['name']) ? $val['name'] : '';
                    $tcount = isset($val['tcount']) ? $val['tcount'] : '';
                    $status = isset($val['status']) ? $val['status'] : '';
                } else {
                    $id = isset($val->id) ? $val->id : '';
                    $gen_date = isset($val->gen_date) ? date('Y/m/d', strtotime($val->gen_date)) : '';
                    $name = isset($val->name) ? $val->name : '';
                    $tcount = isset($val->tcount) ? $val->tcount : '';
                    $status = isset($val->status) ? $val->status : '';
                }
                ?>
                <tr>
                  <td>{{ $id }}</td>
                  <td>{{ $gen_date }}</td>
                  <td>{{ $name }}</td>
                  <td><span class="label pull-right bg-green">{{ $tcount }}</span></td>
                  <td>@if($status == 1) {{ 'Success' }} @else {{ 'Deleted' }} @endif</td>
                  <td>@if($status == 1) <a href="{{ route('batch', ['batch_id' => $id]) }}" class="btn btn-info">View</a> <a href="javascript:IsDelete({{ $id }})" class="btn btn-warning">Delete</a>@endif</td>
                </tr>
                @endforeach
                </tbody>
              </table>
            </div><!-- /.box-body -->
            </div><!-- /.box -->
      </div>
</div><!-- /.row -->
<script>
function IsDelete(bid)
{       
    if (bid == ""){
                //  return false;
        }
        else
        {
        var r = confirm("Are you sure to Delete Batch ?");
            if (r == true)
            {
            location.href = '{{url('deletebatch')}}/' + bid;
            }
        }
        
}
</script>
@endsection

