<?php

namespace App\Http\Controllers;

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

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
            'profile_photo_path' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'address' => 'nullable|string',
            'country' => 'nullable|string',
            'postal_code' => 'nullable|string',
            'about' => 'nullable|string',
        ]);

        DB::beginTransaction();

        try {
            $employeeId = DB::table('employees')->insertGetId([
                'name' => $request->input('name'),
                'position' => $request->input('position'),
                'salary' => $request->input('salary'),
                'address' => $request->input('address'),
                'country' => $request->input('country'),
                'postal_code' => $request->input('postal_code'),
                'about' => $request->input('about'),
                'profile_photo_path' => null, // Default value
            ]);

            if ($request->hasFile('profile_photo_path')) {
                $path = $request->file('profile_photo_path')->store('profile-photos', 'public');
                DB::table('employees')->where('id', $employeeId)->update(['profile_photo_path' => $path]);
            }

            DB::commit();

            return redirect()->route('employees.index');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Failed to create employee: ' . $e->getMessage());
        }
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
            'profile_photo_path' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'address' => 'nullable|string',
            'country' => 'nullable|string',
            'postal_code' => 'nullable|string',
            'about' => 'nullable|string',
        ]);

        DB::beginTransaction();

        try {
            DB::table('employees')
                ->where('id', $id)
                ->update([
                    'name' => $request->input('name'),
                    'position' => $request->input('position'),
                    'salary' => $request->input('salary'),
                    'address' => $request->input('address'),
                    'country' => $request->input('country'),
                    'postal_code' => $request->input('postal_code'),
                    'about' => $request->input('about'),
                ]);

            if ($request->hasFile('profile_photo_path')) {
                $path = $request->file('profile_photo_path')->store('profile-photos', 'public');
                DB::table('employees')->where('id', $id)->update(['profile_photo_path' => $path]);
            }

            DB::commit();

            return redirect()->route('employees.index');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Failed to update employee: ' . $e->getMessage());
        }
    }

    public function destroy($id)
    {
        DB::table('employees')->where('id', $id)->delete();
        return redirect()->route('employees.index');
    }
    public function up()
    {
        Schema::table('employees', function (Blueprint $table) {
            $table->string('profile_photo_path')->nullable();
        });
    }

    public function down()
    {
        Schema::table('employees', function (Blueprint $table) {
            $table->dropColumn('profile_photo_path');
        });
    }
    public function profile($id)
    {
        // Dapatkan data karyawan berdasarkan ID yang diberikan
        $employee = DB::table('employees')->where('id', $id)->first();

        // Kirim data karyawan ke view untuk ditampilkan
        return view('employees.profile', ['employee' => $employee]);
    }
}
