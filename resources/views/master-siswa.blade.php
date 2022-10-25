@extends('master.admin')
@section('title', 'Master Siswa')
@section('content-title', 'Master Siswa')
@section('content')

@if($message = Session::get('sukses'))
    <div class="alert alert-success alert-block">
        <button type="button" class="close" data-dismiss="alert">X</button>
        <strong>{{ $message  }} </strong>                       
    </div>
@endif

@if($message = Session::get('hapus'))
    <div class="alert alert-danger alert-block">
        <button type="button" class="close" data-dismiss="alert">X</button>
        <strong>{{ $message  }} </strong>                       
    </div>
@endif

@if($message = Session::get('berhasil'))
    <div class="alert alert-success alert-block">
        <button type="button" class="close" data-dismiss="alert">X</button>
        <strong>{{ $message  }} </strong>                       
    </div>
@endif

<div class="col-lg-12">
    <div class="card shadow mb-4">
        <div class="card-header bg-dark py-3">
            <a href="{{ route('master-siswa.create') }}" class="btn btn-success">Tambah Data</a>
        </div>
        <div class="card-body">
            <table class="table">
                <thead class="bg-dark text-white">
                    <tr>
                      <th scope="col" >No.</th>
                      <th scope="col">Nama</th>
                      <th scope="col">NISN</th>
                      <th scope="col">Alamat</th>
                      <th scope="col">Jenis Kelamin</th>
                      <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>

                @foreach($data as $i => $item)
                <tr>
                <th scope="row">{{++$i}}</th>
                <td>{{ $item -> nama }}</td>
                <td>{{ $item -> nisn }}</td>
                <td>{{ $item -> alamat }}</td>
                <td>{{ $item -> jk }}</td>
                <td>
                    <a href="{{ route('master-siswa.show', $item -> id) }}" class="btn btn-info btn-circle btn-sm"><i class="fas fa-info"></i></a>
                    <a href="{{ route('master-siswa.edit', $item -> id) }}" class="btn btn-warning btn-circle btn-sm"><i class="fas fa-edit"></i></a>
                    <a href="{{ route('master-siswa.hapus', $item -> id) }}" class="btn btn-danger btn-circle btn-sm"><i class="fas fa-trash"></i></a> 
                </td>
                </tr>
                @endforeach
                    
                </tbody>
            </table>
        </div>
    </div>
</div>



@endsection