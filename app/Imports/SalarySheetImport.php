<?php

namespace App\Imports;

use App\Payslip;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class SalarySheetImport implements ToCollection, WithHeadingRow
{
    public function collection(Collection $rows)
    {
        foreach ($rows as $row) {
            Payslip::create([
                'bid' => $row['bid'],
                'emp_id' => $row['emp_id'],
                'emp_name' => $row['name'],
                'grade' => $row['grade'],
                'payrollsec' => $row['payrollsec'],
                'bank_name' => $row['bank_name'],
                'bank_ac' => $row['bank_ac_no'],
                'code_no' => $row['code_no'],
                'month_slip' => $row['month'],
                'lop' => $row['lop'],
                'annual_ctc' => $row['annual_ctc'],
                'month_ctc' => $row['monthly_ctc'],
                'no_of_days' => 30,
                'basic' => $row['basic'],
                'hra' => $row['hra'],
                'spl_al' => $row['spl_al'],
                'gross' => $row['gross'],
                'pt_other' => $row['pt_other'],
                'net_salary' => $row['net_salary'],
                'tp_al' => $row['tp_al'],
                'paye' => $row['paye'],
                'emp_pen' => $row['emp_pen'],
                'welf' => $row['welf'],
                'getbucks' => $row['getbucks'],
                'lolc' => $row['lolc'],
                'int_hous' => $row['int_hous'],
            ]);
        }
    }
}

