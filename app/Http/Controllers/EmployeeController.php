<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EmployeeController extends Controller
{
    public function index()
    {
        $employees = DB::table('employees')->get();
        return view('employees.index', compact('employees'));
    }

    public function create()
    {
        return view('employees.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'position' => 'required',
            'salary' => 'required|numeric',
        ]);

        DB::table('employees')->insert([
            'name' => $request->input('name'),
            'position' => $request->input('position'),
            'salary' => $request->input('salary'),
        ]);

        return redirect()->route('employees.index');
    }

    public function edit($id)
    {
        $employee = DB::table('employees')->where('id', $id)->first();
        return view('employees.edit', compact('employee'));
    }
    public function show($id)
{
    $employee = DB::table('employees')->where('id', $id)->first();
    
    if (!$employee) {
        return redirect()->route('employees.index')->with('error', 'Employee not found.');
    }

    return view('employees.info', compact('employee'));
}


    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'position' => 'required',
            'salary' => 'required|numeric',
        ]);

        DB::table('employees')
            ->where('id', $id)
            ->update([
                'name' => $request->input('name'),
                'position' => $request->input('position'),
                'salary' => $request->input('salary'),
            ]);

        return redirect()->route('employees.index');
    }

    public function destroy($id)
    {
        DB::table('employees')->where('id', $id)->delete();
        return redirect()->route('employees.index');
    }
}
