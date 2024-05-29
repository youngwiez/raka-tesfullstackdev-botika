<?php

namespace App\Http\Controllers;

use App\Models\Pekerjaan;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\View\View;
use Illuminate\Support\Facades\Storage;

class PekerjaanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pekerjaan = Pekerjaan::all();
        return inertia('Pekerjaan/Index', [
            'pekerjaan' => $pekerjaan
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $pekerjaan = new Pekerjaan();
        return inertia('Pekerjaan/Create', [
            'pekerjaan' => $pekerjaan
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Pekerjaan::create(
            $request->validate([
                'nama' => ['required', 'string', 'max:100'],
                'job' => ['required', 'string', 'max:255'],
            ])
        );
        return redirect('/pekerjaan');
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
    public function edit(Pekerjaan $pekerjaan)
    {
        return inertia('Pekerjaan/Edit', [
            'pekerjaan' => $pekerjaan
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pekerjaan $pekerjaan)
    {
        $pekerjaan->update(
            $request->validate([
                'nama' => ['required', 'string', 'max:100'],
                'job' => ['required', 'string', 'max:255'],
            ])
        );
        return redirect('/pekerjaan');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pekerjaan $pekerjaan)
    {
        $pekerjaan->delete();
        return redirect('/pekerjaan')->with('success', 'Data pekerjaan berhasil dihapus');
    }
}
