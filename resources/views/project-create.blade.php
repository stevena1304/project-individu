@extends('master.admin')
@section('title', 'Create Project')
@section('content-title', 'Create Project - '.$siswa->nama)
@section('content')

<div class="row">
	<div class="col-lg-12">
		<div class="card shadow mb-4">
			<div class="card-body">
				@if(count($errors)>0)
					<div class="alert alert-danger">
						<ul>
							@foreach($errors->all() as $item)
								<li>
									{{$item}}
								</li>
							@endforeach
						</ul>
					</div>

				@endif

<form method="post" enctype="multipart/form-data" action="{{ route('master-project.store') }}">
	@csrf
	<div class="form-group">
		<input type="hidden" name="id_siswa" value="{{ $siswa->id }}">
		<label for="nama_project">Nama Project : </label>
		<input type="text" class="form-control" id="nama_project" name="nama_project" value="{{ old('nama_project') }}">
	</div>
	<div class="form-group">
		<label for="tanggal">Tanggal : </label>
		<input type="date" class="form-control" id="tanggal" name="tanggal" value="{{ old('tanggal') }}">
	</div>
	<div class="form-group">
		<label for="deskripsi">Deskripsi : </label>
		<textarea class="form-control" id="deskripsi" name="deskripsi" >{{ old('deskripsi') }}</textarea>
	</div>
	<div class="form-group">
		<!-- <a type="submit" class="btn btn-success">Save</a> -->
		<input type="submit" class="btn btn-success" value="Save">
		<a href="{{ route('master-project.index') }}" class="btn btn-danger">Cancel</a>
	</div>

</form>
			</div>
		</div>
	</div>
</div>


@endsection