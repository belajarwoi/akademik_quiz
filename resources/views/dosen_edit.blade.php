@extends('layouts.sbadmin')
@section('isinya')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                Edit Data Dosen
            </div>
            <div class="card-body">
               <form action="{{ url('dosen/'.$dosen->id, []) }}" method="POST">
                    @method('PUT')
                    @csrf
                    <div class="form-group">
                        <label for="my-input">Kode Dosen</label>
                        <input id="my-input" class="form-control" type="text" name="kode_dosen" value="{{ $dosen ->kode_dosen ?? old('kode_dosen') }}">
                        <span class="text-danger">{{ $errors->first('kode_dosen') }}</span>
                    </div>
                    <div class="form-group">
                        <label for="my-input">Nama Dosen</label>
                        <input id="my-input" class="form-control" type="text" name="nama_dosen" value="{{ $dosen ->nama_dosen ?? old('nama_dosen') }}">
                        <span class="text-danger">{{ $errors->first('nama_dosen') }}</span>
                    </div>
                    <div class="form-group">
                        <label for="my-select">Fakultas</label>
                        <select id="my-select" class="form-control" name="fakultas">
                        <option value="">Pilih Fakultas</option>
                            @foreach ( $list_fk as $a )
                                <option value="{{ $a }}" @selected($a==$dosen->fakultas)>{{ $a }}</option>
        
                            @endforeach
                        </select>               
                        <span class="text-danger">{{ $errors->first('fakultas') }}</span>
                    </div>
                    <div class="form-group">
                        <label for="my-input">Nomor Hp</label>
                        <input id="my-input" class="form-control" type="text" name="nomor_hp" value="{{ $dosen ->nomor_hp ?? old('nomor_hp') }}">
                        <span class="text-danger">{{ $errors->first('nomor_hp') }}</span>
                    </div>
               <form>
            </div>
            <div class="card-footer">
                <button type="sumbit" class="btn btn-primary">Update</button>
            </div>
        </div>
    </div>
        
    </div>
</div>
@endsection