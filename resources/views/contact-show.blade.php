@if($kontak->isEmpty())
	<h6 class="text-center">Siswa Belum Memiliki Contact</h6>
@else
	@foreach($kontak as $item)
		<div class="card">

			<div class="card-body">
				<strong>Deskripsi Contact :</strong>
				<p>{{$item->jenis_contact}} : {{ $item->pivot->deskripsi }}</p>
			</div>

			<div class="card-footer d-flex justify-content-end">
				<a href="{{ route('master-contact.edit', $item ->kontak-> id) }}" class="btn btn-warning btn-circle btn-sm"><i class="fas fa-edit"></i></a>
                <a href="{{ route('master-contact.hapus', $item ->kontak-> id) }}" class="btn btn-danger btn-circle btn-sm"><i class="fas fa-trash"></i></a> 
			</div>
		</div>
		<br>
	@endforeach
@endif