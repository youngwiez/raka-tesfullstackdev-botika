<?php

namespace App\Http\Controllers;

use App\Models\Karyawan;
use App\Models\Pekerjaan;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\View\View;
use Illuminate\Support\Facades\Storage;

class KaryawanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $karyawan = Karyawan::select('karyawan.*', 'pekerjaan.nama as pekerjaan_nama')
            ->join('pekerjaan', 'pekerjaan.id', '=', 'karyawan.pekerjaan_id')
            ->get();
        return inertia('Karyawan/Index', [
            'karyawan' => $karyawan,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $pekerjaan = Pekerjaan::all();
        return inertia('Karyawan/Create', [
            'pekerjaan' => $pekerjaan
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());
        Karyawan::create(
            $request->validate([
                'nama' => ['required', 'string', 'max:100'],
                'email' => ['required', 'string', 'max:100'],
                'alamat' => ['required', 'string', 'max:255'],
                'divisi' => ['required', 'string', 'max:30'],
                'pekerjaan_id' => ['required', 'integer'],
                'status' => ['required', 'string', 'max:30'],
            ])
        );
        return redirect('/karyawan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Karyawan $karyawan)
    {
        $pekerjaan = Pekerjaan::all();
        return inertia('Karyawan/Edit', [
            'karyawan' => $karyawan,
            'pekerjaan' => $pekerjaan
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Karyawan $karyawan)
    {
        $karyawan->update(
            $request->validate([
                'nama' => ['required', 'string', 'max:100'],
                'email' => ['required', 'string', 'max:100'],
                'alamat' => ['required', 'string', 'max:255'],
                'divisi' => ['required', 'string', 'max:30'],
                'pekerjaan_id' => ['required', 'integer'],
                'status' => ['required', 'string', 'max:30'],
            ])
        );
        return redirect('/karyawan');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Karyawan $karyawan)
    {
        $karyawan->delete();
        return redirect('/karyawan')->with('success', 'Data karyawan berhasil dihapus');
    }
}
