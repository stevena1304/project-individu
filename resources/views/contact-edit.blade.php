@extends('master.admin')
@section('title', 'Edit Contact')
@section('content-title', 'Edit Contact')
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

				<form method="post" enctype="multipart/form-data" action="{{ route('master-contact.update', $kontak->id) }}">
					@csrf
					@method('PUT')
					<div class="form-group">
						<input type="hidden" name="siswa_id" value="{{ $kontak->siswa_id }}">
						<label for="deskripsi">Deskripsi : </label>
						<input type="text" class="form-control" id="deskripsi" name="deskripsi" value="{{$kontak->deskripsi}}">
					</div>	
					<div class="form-group">
						<!-- <a type="submit" class="btn btn-success">Save</a> -->
						<input type="submit" class="btn btn-success" value="Update">
						<a href="{{ route('master-contact.index') }}" class="btn btn-danger">Cancel</a>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>

@endsection