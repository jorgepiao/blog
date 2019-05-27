@extends('admin.layout')

@section('content')
	<div class="row">
		<div class="col-md-6">
			<div class="box box-primary">
				<div class="box-header with-border">
					<h3 class="box-title">Actualizar Permiso</h3>
				</div>
				<div class="box-body">
					@include('partials.error-messages')
					<form method="POST" action="{{ route('admin.permissions.update', $permission) }}">
						@csrf  @method('PUT')

						<div class="form-group">
							<label for="name">Identificador:</label>
							<input disabled value="{{ $permission->name }}" class="form-control">
						</div>
						<div class="form-group">
							<label for="name">Nombre:</label>
							<input name="name" value="{{ old('name', $permission->name) }}" class="form-control">
						</div>
						<button class="btn btn-primary btn-block">Actualizar permiso</button>
					</form>
				</div>
			</div>
		</div>
	</div>
@endsection 