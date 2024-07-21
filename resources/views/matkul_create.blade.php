@extends('layouts.sbadmin')
@section('isinya')

<div class="container-fluid">
    <div class="row justify-content-center">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                Tambah Data Matkul
            </div>
            <div class="card-body">
            <form action="{{ url('matkul', []) }}" method="POST">
                    @method('POST')
                    @csrf
                    <div class="form-group">
                        <label for="my-input">Kode Matkul</label>
                        <input id="my-input" class="form-control" type="text" name="kode_matkul" value="{{ old('kode_matkul') }}">
                        <span class="text-danger">{{ $errors->first('kode_matkul') }}</span>
                    </div>
                    <div class="form-group">
                        <label for="my-input">Nama Matkul</label>
                        <input id="my-input" class="form-control" type="text" name="nama_matkul" value="{{ old('nama_matkul') }}">
                        <span class="text-danger">{{ $errors->first('nama_matkul') }}</span>
                    </div>
                    <div class="form-group">
                        <label for="my-select">Dosen</label>
                        <select id="my-select" class="form-control" name="dosen_id">
                            <option value="">Pilih Dosen</option>
                            @foreach ($list_dosen as $id => $a)
                                <option value="{{ $id }}" @selected($id==old('dosen_id'))>
                                    {{ $a }}
                                </option>
                            @endforeach
                        </select>
                        <span class="text-danger">{{ $errors->first('dosen_id') }}</span>
                    </div>
                    <div class="form-group">
                        <label for="my-input">Hari</label>
                        <input id="my-input" class="form-control" type="text" name="hari" value="{{ old('hari') }}">
                        <span class="text-danger">{{ $errors->first('hari') }}</span>
                    </div>
                    <div class="form-group">
                        <label for="my-input">Jam</label>
                        <input id="my-input" class="form-control" type="time" name="jam" value="{{ old('jam') }}">
                        <span class="text-danger">{{ $errors->first('jam') }}</span>
                    </div>
                    <div class="card-footer">
                        <button type="sumbit" class="btn btn-primary">Simpan</button>
                        </form>
                    </div>
            </div>
            
        </div>
    </div>
        
    </div>
</div>
@endsection