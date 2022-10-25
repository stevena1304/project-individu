@extends('master.admin')
@section('title', 'Master Contact')
@section('content-title', 'Master Contact')
@section('content')

@if($message = Session::get('success'))
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
        <div class="card-header bg-dark">
            <h6 class="m-0 font-weight-bold text-white">Jenis Kontak</h6>
        </div>
        <div class="card-header py-3">
            <a href="#" data-toggle="modal" data-target="#createJenis" class="btn btn-success">Create Jenis Contact</a>
        </div>
        <div class="card-body">
            <table class="table">
                <thead class="bg-dark text-white">
                    <tr>
                        <th scope="col">No.</th>
                        <th scope="col">Jenis Kontak</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($jk as $j => $item2)
                        <tr>
                            <th scope="row">{{++$j}}</th>
                            <td>{{ $item2 -> jenis_contact }}</td>
                            <td>
                                <a href="{{route('master-contact.editjenis', $item2->id)}}" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></a>
                                <!-- <a href="{{route('master-contact.hapusjenis', $item2->id)}}" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></a> -->
                                <a href="#" data-toggle="modal" data-target="#hapusJenis" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

<div class="row">
	<div class="col-lg-5">
    <div class="card shadow mb-4">
        <div class="card-header bg-dark">
        	<h6 class="m-0 font-weight-bold text-white">Data Siswa</h6>
        </div>
        <div class="card-body">
            <table class="table">
                <thead class="bg-dark text-white">
                    <tr>
                      <th scope="col">NISN</th>
                      <th scope="col">Nama</th>
                      <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>

                @foreach($data as $i => $item)
                	<tr>
                		<td>{{ $item -> nisn }}</td>
                		<td>{{ $item -> nama }}</td>
	                	<td>
	                    	<a class="btn btn-info btn-sm" onclick="show({{ $item->id }})"><i class="fas fa-folder"></i></a>
	                    	<a href="{{route('master-contact.tambah', $item->id)}}" class="btn btn-success btn-sm"><i class="fas fa-plus"></i></a>
	                	</td>
	                </tr>

                    <div class="modal fade" id="hapusJenis" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Yakin mau hapus kah Dexck ?</h5>
                                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">×</span>
                                    </button>
                                </div>
                                <div class="modal-footer">
                                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                                    <a type="submit" class="btn btn-danger" href="{{route('master-contact.hapusjenis', $item2->id)}}">Hapus</a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
                    
                </tbody>
            </table>
            <div class="card-footer d-flex justify-content-end">
            	{{$data->links()}}
            </div>
        </div>
    </div>
	</div>

	<div class="col-lg-7">
	<div class="card shadow mb-4">
			<div class="card-header bg-dark">
				<h6 class="m-0 font-weight-bold text-white">Contact</h6>
			</div>
			<div id="contact" class="card-body">
				<h6 class="text-center">Silahkan Pilih Siswa Terlebih Dahulu</h6>
			</div>
		</div>	
	</div>
</div>


<!-- Modal Hapus Jenis -->
<!-- <div class="modal fade" id="hapusJenis" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Yakin mau hapus kah Dexck ?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <a type="submit" class="btn btn-danger" href="{{route('master-contact.hapusjenis', $item2->id)}}">Hapus</a>
            </div>
        </div>
    </div>
</div> -->

<script>
	function show(id){
		$.get('master-contact/'+id, function(data){
			$('#contact').html(data);
		});
	}
</script>

@endsection