<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\kota;
use App\Models\negara;
use App\Http\Requests\StorekotaRequest;
use App\Http\Requests\UpdatekotaRequest;
use App\Http\Resources\kotaResource;

class KotaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('kota', [
            "title" => 'kota',
            "data" => kota::all(),
            "lokasi" => 'Kota',
            "datanegara" => negara::all(),
            "parent" => 'master'
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $validatedData = $request->validate([
            'nama_kota' => 'required|unique:kotas',
            'deskripsi_kota' => 'required|max:255',
            'negara_id' => 'required',
            'kodewarna_kota' => 'required',
            'gambar_kota' => 'required|image'
        ]);

        // kota::create($validatedData);

        // if ($request->file('gambar_kota')) {
        //     $validatedData['gambar_kota'] = $request->file('gambar_kota')->store('gambar_k');
        // }
        kota::create($validatedData);
        return redirect('/kota')->with('success', 'Sebuah kota telah ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(kota $kota)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(kota $kota)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatekotaRequest $request, kota $kota)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(kota $kota)
    {
        //
    }
}