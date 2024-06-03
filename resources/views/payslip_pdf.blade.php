
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <title>Payslip Voucher</title>
<style type="text/css">
table {
    border-collapse: collapse;
    border-spacing: 0;
}
th,td{border:1px solid #222;padding:3.5px 4px;}
.top .table-top td{font-size:12px;padding-bottom:40px;}
.top .table-center th{font-size:14px;}
.top .table-center td{font-size:14px;}
.table-above-bottom td{border:1px dotted #222;font-size:10px;}
.table-above-bottom-right td{border:1px solid #222;font-size:14px;padding:3.5px 4px;}
</style>
 </head>
 <body>
 
<div class="container">
	<h2 style="text-align:center;text-decoration:underline">Payslip</h2>
	@foreach ($payslips as $key => $item)
	<table class="table table-top1" border="0" style="width:100%;"> 
    	<tr>
		 	<td style="text-align:left;border:none;font-weight:600">EMP CODE</td>
		 	<td style="text-align:left;border:none">: {{$item->emp_id}}</td>
	 		<td style="text-align:left;border:none;font-weight:600">PAYROLL SECTION</td>
		 	<td style="text-align:left;border:none">: {{$item->payrollsec}}</td>
	 	</tr>
	 	<tr>
		 	<td style="text-align:left;border:none;font-weight:600">EMP NAME</td>
		 	<td style="text-align:left;border:none">: {{$item->emp_name}}</td>
	 		<td style="text-align:left;border:none;font-weight:600">GRADE</td>
		 	<td style="text-align:left;border:none">: {{$item->grade}}</td>
	 	</tr>
	 	<tr>
		 	<td style="text-align:left;border:none;font-weight:600">MODE OF PAYMENT</td>
		 	<td style="text-align:left;border:none">: BANK TRANSFER</td>
	 		<td style="text-align:left;border:none;font-weight:600">MONTH</td>
		 	<td style="text-align:left;border:none">: {{$item->month_slip}}</td>
	 	</tr>
	 	<tr>
		 	<td style="text-align:left;border:none;font-weight:600">BANK</td>
		 	<td style="text-align:left;border:none">: {{$item->bank_name}}</td>
	 		<td style="text-align:left;border:none;font-weight:600">Code No</td>
		 	<td style="text-align:left;border:none">: {{$item->code_no}}</td>
	 	</tr>
	 	<tr>
		 	<td style="text-align:left;border:none;font-weight:600">BANK A/c No</td>
		 	<td style="text-align:left;border:none">: {{$item->bank_ac}}</td>
	 		<td style="text-align:left;border:none;font-weight:600"">LOP</td>
		 	<td style="text-align:left;border:none">: {{$item->lop}}</td>
	 	</tr>
	</table>
	<table class="table table-top2" style="width:100%;margin-top:10px;">
		<tr>
			<th colspan="2" style="text-align:center;font-weight:600;padding:10px">EARNINGS</th>
			<th colspan="2" style="text-align:center;font-weight:600;padding:10px">DEDUCTIONS</th>
		</tr>
		<tr>
			<td colspan="2">
				<table style="border:none;width:100%;">
					<tr>
				 	<td style="text-align:left;border:none;width:70%;">BASIC</td>
				 	<td style="text-align:right;border:none;width:30%;">{{$item->basic}}</td>
			 		</tr>
			 		<tr>
				 	<td style="text-align:left;border:none;width:70%;">BASIC</td>
				 	<td style="text-align:right;border:none;width:30%;">{{$item->basic}}</td>
			 		</tr>
				</table>
			</td>
			<td colspan="2">
				<table style="border:none;width:100%;">
					<tr>
				 	<td style="text-align:left;border:none;width:70%;">PF</td>
				 	<td style="text-align:right;border:none;width:30%;">{{$item->basic}}</td>
			 		</tr>
			 		<tr>
				 	<td style="text-align:left;border:none;width:70%;">BASIC</td>
				 	<td style="text-align:right;border:none;width:30%;">{{$item->basic}}</td>
			 		</tr>
				</table>
			</td>
		</tr>
		<tr>
			<td style="text-align:left;width:50%;font-weight:600;border-bottom:none">GROSS AMOUNT</td>
			<td style="text-align:right;width:50%;font-weight:600;border-bottom:none">{{$item->basic}}</td>
			<td style="text-align:left;width:50%;font-weight:600;border-bottom:none">TOTAL DEDUCTIONS</td>
			<td style="text-align:right;width:50%;font-weight:600;border-bottom:none">{{$item->basic}}</td>
		</tr>
		<tr>
			<td colspan="4" style="text-align:left;font-weight:600;padding-top:10px;padding-bottom:10px;border-bottom:none">NET AMOUNT : 500000</td>
		</tr>
		<tr>
			<td colspan="4" style="text-align:left;padding-top:10px;padding-bottom:10px;">
			THIS IS A COMPUTER GENERATED PAYSLIP. IT DOES NOT REQUIRE SIGNATURE
			For any queries on salary, please email to issues@companymail.in 
			</td>
		</tr>
	</table>
	@endforeach
</div>
</body>
</html>