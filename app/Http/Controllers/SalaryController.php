<?php


namespace App\Http\Controllers;

use App\Models\Salary;
use Illuminate\Http\Request;

class SalaryController extends Controller
{
    public function index()
    {
        return Salary::all();
    }

    public function show($id)
    {
        return Salary::findOrFail($id);
    }

    public function store(Request $request)
    {
        return Salary::create($request->all());
    }

    public function update(Request $request, $id)
    {
        $salary = Salary::findOrFail($id);
        $salary->update($request->all());
        return $salary;
    }

    public function destroy($id)
    {
        $salary = Salary::findOrFail($id);
        $salary->delete();
        return response()->json(['message' => 'Salary deleted successfully']);
    }
}
