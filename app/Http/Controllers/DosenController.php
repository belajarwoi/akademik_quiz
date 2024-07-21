<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DosenController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return \Illuminate\Http\Response
     */
    
    public function index()
    {
        $data['dosen'] = \App\Models\Dosen::paginate(5);
        $data['judul'] = 'Data-Data Dosen';
        return view('dosen_index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data['list_fk'] = ['Ilmu Komputer','Ilmu Ekonomi'];
        return view('dosen_create', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'kode_dosen' => 'required|unique:dosens,kode_dosen',
            'nama_dosen' => 'required',
            'fakultas' => 'required',
            'nomor_hp' => 'required'
        ]);

        $dosen = new \App\Models\Dosen();
        $dosen->kode_dosen = $request->kode_dosen;
        $dosen->nama_dosen = $request->nama_dosen;
        $dosen->fakultas = $request->fakultas;
        $dosen->nomor_hp = $request->nomor_hp;
        $dosen->save();
    
        return back()->with('pesan','Data sudah disimpan');
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
        $data['dosen']= \App\Models\Dosen::findOrFail($id);
        $data['list_fk']=['Ilmu Komputer', 'Ilmu Ekonomi'];
        return view ('dosen_edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'kode_dosen' => 'required|unique:dosens,kode_dosen,'.$id,
            'nama_dosen' => 'required',
            'fakultas' => 'required',
            'nomor_hp' => 'required'
        ]);

        $dosen = \App\Models\Dosen::findOrFail($id);
        $dosen->kode_dosen = $request->kode_dosen;
        $dosen->nama_dosen= $request->nama_dosen;
        $dosen->fakultas = $request->fakultas;
        $dosen->nomor_hp = $request->nomor_hp;
        $dosen->save();
    
        return redirect('/dosen')->with('pesan','Data sudah diUpdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $dosen = \App\Models\Dosen::findOrFail($id);
        $dosen->delete();
        return back ()->with('pesan','Data Sudah Dihapus');
    }

    public function laporan()
    {
        $data['dosen'] = \App\Models\Dosen::all();
        $data['judul'] = 'Laporan Data Dosen';
        return view('dosen_laporan',$data);
    }
}