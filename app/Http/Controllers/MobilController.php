<?php

namespace App\Http\Controllers;

use App\Models\Mobil;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class MobilController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Mobil::orderBy('nomor_seri', 'desc')->paginate(3);
        return view('mobil/index')->with('data', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('mobil/create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Session::flash('nomor_seri', $request->nomor_seri);
        Session::flash('merek', $request->merek);
        Session::flash('deskripsi', $request->deskripsi);
        $request->validate([
            'nomor_seri' => 'required|numeric|unique:mobil,nomor_seri',
            'merek' => 'required',
            'deskripsi' => 'required',
        ], [
            'nomor_seri.required' => 'Nomor Seri harus diisi',
            'nomor_seri.numeric' => 'Nomor Seri harus berupa angka',
            'nomor_seri.unique' => 'Nomor Seri sudah terdaftar',
            'merek.required' => 'Merek harus diisi',
            'deskripsi.required' => 'Deskripsi harus diisi',
        ]);
        $data = [
            'nomor_seri' => $request->nomor_seri,
            'merek' => $request->merek,
            'deskripsi' => $request->deskripsi,
        ];
        Mobil::create($data);
        return redirect()->to('mobil')->with('success', 'Data berhasil disimpan');
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
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
