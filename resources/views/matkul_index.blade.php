@extends('layouts.sbadmin')
@section('isinya')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    {{ $judul }}
                </div>
                <div class="card-body">
                    <table class="table table-bordered table table-striped table-hover">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Kode Matkul</th>
                                <th>Nama Matkul</th>
                                <th>Nama Dosen</th>
                                <th>Hari</th>
                                <th>Jam</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($matkul as $a)
                            <tr>
                                <td>{{ $a->id }}</td>
                                <td>{{ $a->kode_matkul }}</td>
                                <td>{{ $a->nama_matkul }}</td>
                                <td>{{ $a->dosen->nama_dosen }}</td>
                                <td>{{ $a->hari }}</td>
                                <td>{{ $a->jam }}</td>
                                <td>
                                    <a href="{{ url('matkul/'.$a->id.'/edit', []) }}" class="btn btn-primary btn-sm">Edit</a>
                                    <form action="{{ url('matkul/'.$a->id, []) }}" method="post" class="d-inline"
                                        onsubmit="return confirm('Apakah Dihapus?')">
                                        @method('delete')
                                        @csrf
                                        <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                                    </form>
                                </td>
                            </tr>  
                            @endforeach
                        </tbody>
                    </table>

                </div>
                <div class="card-footer">
                {{ $matkul->links() }}
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
