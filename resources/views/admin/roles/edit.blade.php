@extends('admin.layout')

@section('content')
  <div class="row">
    <div class="col-md-6">
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">Crear Rol</h3>
        </div>
        <div class="box-body">
					@include('partials.error-messages')

          <form method="POST" action="{{ route('admin.roles.update', $role) }}">
            @csrf
            @method('PUT')

            <div class="form-group">
              <label for="name">Nombre:</label>
              <input name="name" value="{{ old('name', $role->name) }}" class="form-control">
            </div>

            <div class="form-group">
              <label for="guard_name">Guard:</label>
                <select name="guard_name" class="form-control">
                    @foreach (config('auth.guards') as $guardName => $guard)
                        <option {{ old('guard_name', $role->guard_name) === $guardName ? 'selected' : '' }}
                            value="{{ $guardName }}">{{ $guardName }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="form-group col-md-6">
              <label>Permisos</label>
              @include('admin.permissions.checkboxes', ['model' => $role])
            </div>
            <button class="btn btn-primary btn-block">Crear rol</button>
          </form>
        </div>
      </div>
    </div>
  </div>
@endsection 