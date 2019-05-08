<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <form method="POST" action="{{ route('admin.posts.store') }}">  
    {{ csrf_field() }}
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Agrega el titulo de tu nueva publicacion</h4>
            </div>
            <div class="modal-body">
                <div class="form-group {{ $errors->has('titulo') ? 'has-error' : '' }}">
                    <!-- <label>Titulo de la publicacion</label> -->
                    <input name="titulo" 
                        class="form-control"
                        value="{{ old('titulo') }}"
                        placeholder="Ingresa aqui el titulo de la publicacion" required>
                    {!! $errors->first('titulo', '<span class="help-block">:message</span>') !!}
                    
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button class="btn btn-primary">Crear publicacion</button>
            </div>
        </div>
    </div>
    </form>
</div>