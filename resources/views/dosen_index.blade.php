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
                                <th>Kode Dosen</th>
                                <th>Nama Dosen</th>
                                <th>Fakultas</th>
                                <th>No Hp</th>
                                <th>Created</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($dosen as $a)
                            <tr>
                                <td>{{ $a->id }}</td>
                                <td>{{ $a->kode_dosen }}</td>
                                <td>{{ $a->nama_dosen }}</td>
                                <td>{{ $a->fakultas }}</td>
                                <td>{{ $a->nomor_hp }}</td>
                                <td>{{ $a->created_at }}</td>
                                <td>
                                    <a href="{{ url('dosen/'.$a->id.'/edit',[]) }}" 
                                        class="btn btn-primary btn-sm">Edit</a>
                                    <form action= "{{ url('dosen/' .$a->id, []) }}"method="post" class="d-inline"
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
                    {{ $dosen->links() }}
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
