@extends('admin.layout')

@section('header')
<h1>
    USUARIOS
    <small>Listado</small>
</h1>
<ol class="breadcrumb">
    <li><a href="{{ route('dashboard') }}"><i class="fa fa-dashboard"></i> Inicio</a></li>
    <li class="active">Usuarios</li>
</ol>
@stop

@section('content')
<div class="box box-primary">
    <div class="box-header">
        <h3 class="box-title">Listado de usuarios</h3>
        <a href="{{ route('admin.users.create') }}" class="btn btn-primary pull-right">
            <i class="fa fa-plus"></i> Crear usuario
        </a> 


    </div>
    <!-- /.box-header -->
    <div class="box-body">
        <table id="users-table" class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Email</th>
                <th>Roles</th>
                <th>Acciones</th>
            </tr>
        </thead>
            
        <tbody>
            @foreach ($users as $user)
            <tr>
                <td>{{ $user->id }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->getRoleNames()->implode(', ') }}</td>
                <td>
                    @can('view', $user)
                        <a href="{{ route('admin.users.show', $user) }}"
                            class="btn btn-xs btn-default"
                            target="_blank"
                        ><i class="fa fa-eye"></i> </a>
                    @endcan

                    @can('update', $user)
                        <a href="{{ route('admin.users.edit', $user) }}"
                            class="btn btn-xs btn-info"
                        ><i class="fa fa-pencil"></i></a>
                    @endcan

                    @can('delete', $user)
                        <form method="POST"
                            action="{{ route('admin.users.destroy', $user) }}"
                            style="display: inline">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-xs btn-danger"
                                onclick="return confirm('¿Estas seguro de querer eliminar este usuario?')"
                            ><i class="fa fa-times"></i></button>
                        </form>
                    @endcan

                </td>
            </tr>
            @endforeach
        </tbody>

        
        </table>
    </div>
<!-- /.box-body -->
</div>
<!-- /.box -->
@stop

@push('styles')
    <link rel="stylesheet" href="/adminlte/plugins/datatables.net-bs/css/dataTables.bootstrap.min.css">
@endpush

@push('scripts')
    <script src="/adminlte/plugins/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="/adminlte/plugins/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>

    <script>
        $(function () {
            $('#users-table').DataTable();
        });
    </script>
    
@endpush