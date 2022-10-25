@extends('master.admin')
@section('title', 'Show Siswa')
@section('content-title', 'Show Siswa')
@section('content')

<div class="col-lg-12" align="right">
		<a href="{{ route('master-siswa.index') }}" class="btn btn-secondary">Back</a>
</div>

<br>

<div class="row">

	<!-- kartu 1 -->
	<div class="col-lg-4">
		<div class="card shadow mb-4">
			<div class="card-header bg-dark">
				<h6 class="m-0 font-weight-bold text-white"><i class="fas fa-user"></i> Siswa</h6>
			</div>
			<div class="card-body text-center">
				<img src="{{asset('./template/img/'.$siswa->foto)}}" width="200" class="rounded-circle mt-3 mx-auto img-thumbnail"><br><br>
				<h3>{{ $siswa->nama }}</h3>
				<h5><i class="fas fa-address-card"></i> {{ $siswa->nisn }}</h5>
				<h5><i class="fas fa-map-pin"></i> {{ $siswa->alamat }}</h5>
				<h5><i class="fas fa-venus-mars"></i> {{ $siswa->jk }}</h5>
			</div>
		</div>

		<!-- kartu 2 -->
		<div class="card shadow mb-4">
			<div class="card-header bg-dark">
				<h6 class="m-0 font-weight-bold text-white"><i class="fas fa-address-card"></i> Contact</h6>
			</div>
			<div class="card-body text-center">
				<ol>
					@foreach($kontak as $item)
						<li>{{$item->jenis_contact}} : {{$item->pivot->deskripsi}}</li>
					@endforeach
				</ol>	
			</div>
		</div>
	</div>

	<div class="col-lg-8">

		<!-- kartu 3 -->
		<div class="card shadow mb-4">
			<div class="card-header bg-dark">
				<h6 class="m-0 font-weight-bold text-white"><i class="fas fa-quote-left"></i> About</h6>
			</div>
			<div class="card-body text-center">
				<blockquote class="blockquote text-center">
					<p class="mb-0">{{$siswa->about}}</p>
					<footer class="blockquote-footer">Oleh <cite title="Source Title">{{$siswa->nama}}</cite></footer>
				</blockquote>
			</div>
		</div>

		<!-- kartu 4 -->
		<div class="card shadow mb-4">
			<div class="card-header bg-dark">
				<h6 class="m-0 font-weight-bold text-white"><i class="fas fa-book"></i> Project</h6>
			</div>
			<div class="card-body">
				
			</div>
		</div>
	</div>
</div>

@endsection