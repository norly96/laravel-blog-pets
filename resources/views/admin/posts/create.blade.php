 
 
 <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
 <form method="POST" action="{{route('admin.posts.store')}}">
    {{csrf_field()}}
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Agreaga el titulo de tu nueva publicacion</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="form-group">
                               <label @error('title') style="color:red" @enderror>Titulo de la publicacion</label>
                               <input name="title" value="{{old('title')}}" placeholder="Ingresa el titulo de la publicacion" required class="form-control @error('title') is-invalid @enderror">
                               @error('title')
                               <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                               @enderror
                              {{-- {!!$errors->first('title','<span class="alert-danger">:Mensaje</span>')!!} --}}
                               
                             </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button class="btn btn-primary">Crear publicacion</button>
      </div>
    </div>
  </div>
  </form>
</div>