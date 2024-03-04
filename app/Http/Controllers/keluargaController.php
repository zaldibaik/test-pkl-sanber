<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class KeluargaController extends Controller
{
    public function index()
    {
        $keluarga = DB::table('keluarga')->get();
        return view('keluarga.index', compact('keluarga'));
    }

    public function create()
    {
        return view('keluarga.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama_ayah' => 'required',
            'nama_ibu' => 'required',
            'nomor_KK' => 'required|numeric',
        ]);

        DB::beginTransaction();

        try {
            $keluargaId = DB::table('keluarga')->insertGetId([
                'nama_ayah' => $request->input('nama_ayah'),
                'nama_ibu' => $request->input('nama_ibu'),
                'nomor_KK' => $request->input('nomor_KK'),
            ]);

            DB::commit();

            return redirect()->route('keluarga.index');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Failed to create keluarga: ' . $e->getMessage());
        }
    }

    public function edit($id)
    {
        $keluarga = DB::table('keluarga')->where('id', $id)->first();
        return view('keluarga.edit', compact('keluarga'));
    }


    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'nama_ayah' => 'required',
            'nama_ibu' => 'required',
            'nomor_KK' => 'required|numeric',
        ]);

        DB::beginTransaction();

        try {
            DB::table('keluarga')
                ->where('id', $id)
                ->update([
                    'nama_ayah' => $request->input('nama_ayah'),
                    'nama_ibu' => $request->input('nama_ibu'),
                    'nomor_KK' => $request->input('nomor_KK'),
                ]);

            DB::commit();

            return redirect()->route('keluarga.index');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Failed to update keluarga: ' . $e->getMessage());
        }
    }

    public function destroy($id)
    {
        DB::table('keluarga')->where('id', $id)->delete();
        return redirect()->route('keluarga.index');
    }
}
