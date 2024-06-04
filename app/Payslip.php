<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payslip extends Model
{
	  public $fillable = ['bid','emp_id','emp_name','grade','payrollsec','bank_name','bank_ac','code_no','month_slip','lop','annual_ctc','month_ctc','no_of_days','basic','hra','spl_al','gross','pt_other','net_salary', 'tp_al', 'paye', 'emp_pen', 'soc_pen', 'welf', 'getbucks', 'lolc', 'int_hous'];
}
