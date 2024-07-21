<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MatkulController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['matkul'] = \App\Models\Matkul::paginate(5);
        $data['judul'] = 'Data-Data Matkul';
        return view('matkul_index',$data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data['list_dosen'] =
        \App\Models\Dosen::selectRaw("id,concat(kode_dosen,'-',nama_dosen) as tampil")
        ->pluck('tampil','id');

        return view('matkul_create', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'kode_matkul' => 'required',
            'nama_matkul' => 'required',
            'dosen_id' => 'required',
            'hari' => 'required',
            'jam' => 'required'
        ]);

        $matkul = new \App\Models\Matkul();
        $matkul->kode_matkul = $request->kode_matkul;
        $matkul->nama_matkul = $request->nama_matkul;
        $matkul->dosen_id = $request->dosen_id;
        $matkul->hari = $request->hari;
        $matkul->jam = $request->jam;
        $matkul->save();

        return back()->with('pesan','Data sudah Disimpan');
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
        $data['matkul']=\App\Models\Matkul::findOrFail($id);

        $data['list_dosen']=\App\Models\Dosen::selectRaw("id,concat(kode_dosen,'-',nama_dosen) as tampil")
        ->pluck('tampil', 'id');

        return view('matkul_edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'kode_matkul' => 'required',
            'nama_matkul' => 'required',
            'dosen_id' => 'required',
            'hari' => 'required',
            'jam' => 'required'
        ]);

        $matkul = \App\Models\Matkul::findOrFail($id);
        $matkul->kode_matkul = $request->kode_matkul;
        $matkul->nama_matkul = $request->nama_matkul;
        $matkul->dosen_id = $request->dosen_id;
        $matkul->hari = $request->hari;
        $matkul->jam = $request->jam;
        $matkul->save();

        return redirect('/matkul')->with('pesan','Data Sudah Diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $matkul = \App\Models\Matkul::findOrFail($id);
        $matkul->delete();
        return back()->with('pesan','Data sudah Dihapus');
    }

    public function laporan()
    {
        $data['matkul'] = \App\Models\Matkul::all();
        $data['judul'] = 'Laporan Data Matakuliah';
        return view('matkul_laporan',$data);
    }
}