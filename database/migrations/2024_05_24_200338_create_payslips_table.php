<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('payslips', function (Blueprint $table) {
            $table->increments('id');
			$table->integer('bid');
			$table->string('emp_id');
            $table->string('emp_name');
			$table->string('grade');
			$table->string('payrollsec');
			$table->string('bank_name');
			$table->string('bank_ac');
			$table->string('code_no');
			$table->string('month_slip');
			$table->string('lop');
			$table->string('annual_ctc');
			$table->string('month_ctc');
			$table->string('no_of_days');
			$table->string('basic');
			$table->string('hra');
			$table->string('spl_al');
			$table->string('gross');
			$table->string('pt_other');
			$table->string('net_salary');
            $table->string('tp_al');
            $table->string('paye');
            $table->string('soc_pen');
            $table->string('emp_pen');
            $table->string('welf');
            $table->string('getbucks');
            $table->string('lolc');
            $table->string('int_hous');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payslips');
    }
};
