@if($project->isEmpty())
	<h6 class="text-center">Siswa Belum Memiliki Project</h6>
@else
	@foreach($project as $item)
		<div class="card">
			<div class="card-header">
				<strong>{{ $item->nama_project }}</strong>
			</div>

			<div class="card-body">
				<strong>Tanggal Project :</strong>
				<p>{{ $item->tanggal }}</p>
				<strong>Deskripsi Project :</strong>
				<p>{{ $item->deskripsi }}</p>
			</div>

			<div class="card-footer d-flex justify-content-end">
				<a href="{{ route('master-project.edit', $item -> id) }}" class="btn btn-warning btn-circle btn-sm"><i class="fas fa-edit"></i></a>
                <a href="{{ route('master-project.hapus', $item -> id) }}" class="btn btn-danger btn-circle btn-sm"><i class="fas fa-trash"></i></a> 
			</div>
		</div>
		<br>
	@endforeach
@endif