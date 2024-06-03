@extends('layouts.master')
@section('content')
<div class='row'>
  <div class="col-md-12">
    <div class="box">
      <form class="" role="form" method="POST" action="{{ url('exportbulkpdf') }}" enctype="multipart/form-data">
        {{ csrf_field() }}
        <div class="box-header">
          <input type="text" id="myInput" onkeyup="nameLook()" name="searchval" placeholder="Search for names..">
        </div>
        <?php $tot_netsalary = 0; ?>
        <table id="SingeBatch" class="table table-bordered table-striped">
          <thead>
            <tr>
              <th>
                <input type="checkbox" id="chkParent" />
              </th>
              <th>Emp ID</th>
              <th>Name</th>
              <th>Gender</th>
              <th>Designation</th>
              <th>Month</th>
              <th>Annual CTC</th>
              <th>LOP</th>
              <th>Net Salary</th>
              <th>Actions</th>
            </tr>
          </thead>
          <tbody>
            @foreach($batch as $val)
            <?php
            // Ensure $val->net_salary is treated as a number
            $net_salary = is_numeric($val->net_salary) ? $val->net_salary : 0;
            $tot_netsalary += $net_salary;
            ?>
            <tr>
              <td>
                <input type="checkbox" name="paysliplist[]" value="{{ $val->id }}" />
              </td>
              <td>{{ $val->emp_id }}</td>
              <td>{{ $val->emp_name }}</td>
              <td>{{ $val->gender }}</td>
              <td>{{ $val->designation }}</td>
              <td>{{ $val->month_slip }}</td>
              <td>{{ $val->annual_ctc }}</td>
              <td>{{ $val->lop }}</td>
              <td>{{ $net_salary }}</td>
              <td>
                <a href="{{ route('exportpdf', ['download' => 'pdf', 'tblid' => $val->id]) }}" class="btn btn-info"><i class="fa fa-file-pdf-o"></i> PDF</a>
                <a href="javascript:IsDelete({{ $val->id }})" class="btn btn-warning"><i class="fa fa-remove"></i> Delete</a>
              </td>
            </tr>
            @endforeach
          </tbody>
          <tfoot
		  <tfoot>
              <tr>
                <th colspan="7"></th>
                <th>Total</th>
                <th>{{ $tot_netsalary }}</th>
                <th></th>
              </tr>
            </tfoot>
          </table>
          <input type="submit" id="bulkpdf" value="Bulk PDF" />
        </form>
      </div> 
    </div>
  </div>
</div>  
<script>
function IsDelete(bid) {   
  if (bid == "") {
    // return false;
  } else {
    var r = confirm("Are you sure to Delete Entry ?");
    if (r == true) {
      location.href = '{{ url('deletentry') }}/' + bid;
    }
  }
}
</script>
@endsection
