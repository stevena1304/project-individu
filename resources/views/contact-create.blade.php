@extends('master.admin')
@section('title', 'Create Contact')
@section('content-title', 'Create Contact')
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

<form method="post" enctype="multipart/form-data" action="{{ route('master-contact.store') }}">
	@csrf
	<div class="form-group">
		<input type="hidden" name="siswa_id" value="{{ $siswa->id }}">
		<label for="jenis_contact_id">Jenis Contact : </label>
			<select class="form-select form-control" id="jenis_contact_id" name="jenis_contact_id">
				@foreach($jk as  $item)
					<option value="{{$item -> id}}">{{ $item->jenis_contact}}</option>
				@endforeach
			</select>
	</div>
	<div class="form-group">
		<label for="deskripsi">Deskripsi : </label>
		<input type="text" class="form-control" id="deskripsi" name="deskripsi" value="{{ old('deskripsi') }}">
	</div>
	<div class="form-group">
		<!-- <a type="submit" class="btn btn-success">Save</a> -->
		<input type="submit" class="btn btn-success" value="Save">
		<a href="{{ route('master-contact.index') }}" class="btn btn-danger">Cancel</a>
	</div>

</form>
			</div>
		</div>
	</div>
</div>


@endsection