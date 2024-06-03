<?php


namespace App\Http\Controllers;

use App\Models\Salary;
use Illuminate\Http\Request;

class SalaryController extends Controller
{
    public function index()
    {
        $salaries = Salary::all();
        return view('salaries.index', ['salaries' => $salaries]);
    }

    public function create()
    {
        return view('salaries.create');
    }

    public function store(Request $request)
    {
        // Validate input data
        $validatedData = $request->validate([
            'employee_id' => 'required|exists:employees,id',
            'amount' => 'required|numeric',
            'effective_date' => 'required|date',
        ]);

        // Create new salary
        Salary::create($validatedData);

        return redirect()->route('salaries.index')->with('success', 'Salary created successfully.');
    }

    public function show($id)
    {
        $salary = Salary::findOrFail($id);
        return view('salaries.show', ['salary' => $salary]);
    }

    public function edit($id)
    {
        $salary = Salary::findOrFail($id);
        return view('salaries.edit', ['salary' => $salary]);
    }

    public function update(Request $request, $id)
    {
        // Validate input data
        $validatedData = $request->validate([
            'employee_id' => 'required|exists:employees,id',
            'amount' => 'required|numeric',
            'effective_date' => 'required|date',
        ]);

        // Update the salary
        $salary = Salary::findOrFail($id);
        $salary->update($validatedData);

        return redirect()->route('salaries.index')->with('success', 'Salary updated successfully.');
    }

    public function destroy($id)
    {
        // Delete the salary
        $salary = Salary::findOrFail($id);
        $salary->delete();

        return redirect()->route('salaries.index')->with('success', 'Salary deleted successfully.');
    }
}
