<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Models\Batch; // Assuming you are using models with namespaces
use App\Imports\SalarySheetImport;
use Maatwebsite\Excel\Facades\Excel;
use Exception;

class MyexcelController extends Controller
{
    public function importExport()
    {
        return view('importExport');
    }

    public function import_salary_sheet(Request $request)
    {
        // Validate the incoming request to ensure a file is provided
        $request->validate([
            'excel' => 'required|file|mimes:xls,xlsx',
        ]);

        // Start a database transaction
        DB::beginTransaction();

        try {
            // Create a new batch
            $batch = Batch::create([
                'gen_date' => date('Y/m/d'),
                'gen_user' => Auth::user()->id,
                'status' => 1,
            ]);

            // Import the Excel file
            Excel::import(new SalarySheetImport($batch->id), $request->file('excel'));

            // Commit the transaction
            DB::commit();

            // Flash success message and redirect
            Session::flash('success', 'Information Imported from Excel successfully');
            return redirect()->route('importexcel.get'); // Adjust the route name if necessary
        } catch (Exception $e) {
            // Rollback the transaction in case of error
            DB::rollBack();

            // Flash error message and redirect
            Session::flash('error', 'There was an error importing the file: ' . $e->getMessage());
            return redirect()->route('importexcel.get'); // Adjust the route name if necessary
        }
    }
}
