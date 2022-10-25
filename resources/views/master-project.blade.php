@extends('master.admin')
@section('title', 'Master Project')
@section('content-title', 'Master Project')
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
				<h6 class="m-0 font-weight-bold text-white">Project</h6>
			</div>
			<div id="contact" class="card-body">
				<h6 class="text-center">Silahkan Pilih Siswa Terlebih Dahulu</h6>
			</div>
		</div>	
	</div>
</div>

<script>
	function show(id){
		$.get('master-contact/'+id, function(data){
			$('#contact').html(data);
		});
	}
</script>

@endsection