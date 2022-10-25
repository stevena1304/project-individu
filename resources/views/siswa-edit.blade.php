@extends('master.admin')
@section('title', 'Edit Siswa')
@section('content-title', 'Edit Siswa')
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

				<form method="post" enctype="multipart/form-data" action="{{ route('master-siswa.update', $siswa->id) }}">
					@csrf
					@method('PUT')
					<div class="form-group">
						<label for="nama">NAMA : </label>
						<input type="text" class="form-control" id="nama" name="nama" value="{{$siswa->nama}}">
					</div>
					<div class="form-group">
						<label for="nisn">NISN : </label>
						<input type="text" class="form-control" id="nisn" name="nisn" value="{{$siswa->nisn}}">
					</div>
					<div class="form-group">
						<label for="alamat">ALAMAT : </label>
						<input type="text" class="form-control" id="alamat" name="alamat" value="{{$siswa->alamat}}">
					</div>
					<div class="form-group">
						<label for="jk">JENIS KELAMIN : </label>
						<select class="form-select form-control" id="jk" name="jk">
							<option value="Laki" @if($siswa->jk == 'laki') selected @endif>Laki</option>
							<option value="Perempuan" @if($siswa->jk == 'perempuan') selected @endif>Perempuan</option>
							<option value="Lainnya" @if($siswa->jk == 'lainnya') selected @endif>Lainnya</option>
						</select>
					</div>
					<div class="form-group">
						<label for="foto">FOTO : </label><br>
						<img src="{{asset('./template/img/'.$siswa->foto)}}" width="300" class="img-thumbnail">
						<input type="file" class="form-control-file" id="foto" name="foto">
					</div>
					<div class="form-group">
						<label for="about">ABOUT : </label>
						<textarea class="form-control" id="about" name="about">{{$siswa->about}}</textarea>
					</div>	
					<div class="form-group">
						<!-- <a type="submit" class="btn btn-success">Save</a> -->
						<input type="submit" class="btn btn-success" value="Update">
						<a href="{{ route('master-siswa.index') }}" class="btn btn-danger">Cancel</a>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>

@endsection