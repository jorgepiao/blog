@extends('admin.layout')

@section('header')
<h1>
    POSTS
    <small>Crear publicacion</small>
</h1>
<ol class="breadcrumb">
    <li><a href="{{ route('dashboard') }}"><i class="fa fa-dashboard"></i> Inicio</a></li>
    <li><a href="{{ route('admin.posts.index') }}"><i class="fa fa-list"></i> Posts</a></li>
    <li class="active">Crear</li>
</ol>
@stop

@section('content')
    
<div class="row">
    <form method="POST" action="{{ route('admin.posts.store') }}">  
    {{ csrf_field() }}
    <div class="col-md-8">
        <div class="box box-primary">

                <div class="box-body">
                    <div class="form-group {{ $errors->has('titulo') ? 'has-error' : '' }}">
                        <label>Titulo de la publicacion</label>
                        <input name="titulo" 
                            class="form-control"
                            value="{{ old('titulo') }}"
                            placeholder="Ingresa aqui el titulo de la publicacion">
                        {!! $errors->first('titulo', '<span class="help-block">:message</span>') !!}
                        
                    </div>
                    
                    <div class="form-group {{ $errors->has('cuerpo') ? 'has-error' : '' }}">
                        <label>Contenido publicacion</label>
                        <textarea rows="10" name="cuerpo" id="editor" class="form-control" placeholder="Ingresa el contenido completo de la publicacion">{{ old('cuerpo') }}</textarea>
                        {!! $errors->first('cuerpo', '<span class="help-block">:message</span>') !!}
                    </div>
                </div>
            
        </div>
    </div>

    <div class="col-md-4">
        <div class="box box-primary">
            <div class="box-body">

                <div class="form-group">
                    <label>Fecha de publicacion:</label>
                    <div class="input-group date">
                        <div class="input-group-addon">
                            <i class="fa fa-calendar"></i>
                        </div>
                        <input name="fecha_publicacion"                             
                            class="form-control pull-right"
                            value="{{ old('fecha_publicacion') }}"
                            type="text" 
                            id="datepicker">
                    </div>
                </div>

                <div class="form-group {{ $errors->has('categoria') ? 'has-error' : '' }}">
                    <label>Categorias</label>
                    <select name="categoria" class="form-control">
                        <option value="">Selecciona una categoria</option>
                        @foreach($categorias as $categoria)
                            <option value="{{ $categoria->id }}"
                                {{ old('categoria') == $categoria->id ? 'selected' : '' }}
                            >{{ $categoria->nombre }}</option>
                        @endforeach
                    </select>
                    {!! $errors->first('categoria', '<span class="help-block">:message</span>') !!}
                </div>

                <div class="form-group {{ $errors->has('tags') ? 'has-error' : '' }}">
                    <label>Etiquetas</label>
                    <select name="tags[]" class="form-control select2"
                            multiple="multiple"
                            data-placeholder="Selecciona una o mas etiquetas" style="width: 100%;">
                        @foreach ($tags as $tag)
                            <option {{ collect(old('tags'))->contains($tag->id) ? 'selected' : '' }} value="{{ $tag->id }}">{{ $tag->nombre }}</option>
                        @endforeach
                    </select>
                    {!! $errors->first('tags', '<span class="help-block">:message</span>') !!}
                </div>

                <div class="form-group {{ $errors->has('extracto') ? 'has-error' : '' }}">
                    <label>Extracto publicacion</label>
                    <textarea name="extracto"
                        class="form-control"
                        placeholder="Ingresa un extracto de la publicacion">{{ old('extracto') }}</textarea>
                    {!! $errors->first('extracto', '<span class="help-block">:message</span>') !!}
                </div>
                    <button type="submit" class="btn btn-primary btn-block">Guardar publicacion</button>
                <div class="form-group">

                </div>

            </div>
        </div>
    </div>
    </form>

</div>

@stop

@push('styles')
    <link rel="stylesheet" href="/adminlte/plugins/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
    <link rel="stylesheet" href="/adminlte/plugins/select2/dist/css/select2.min.css">
@endpush

@push('scripts')
    <script src="/adminlte/plugins/ckeditor/ckeditor.js"></script>
    <script src="/adminlte/plugins/select2/dist/js/select2.full.min.js"></script>
    <script src="/adminlte/plugins/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>

    <script>
        $('#datepicker').datepicker({
            autoclose: true
        });
        $('.select2').select2();
        CKEDITOR.replace('editor');
    </script>
    
@endpush

