@extends('admin.layout')
  
@section('header')

<div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Crear publicacion</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Inicio</a></li>
              <li class="breadcrumb-item"><a href="{{route('admin.posts.index')}}">Posts</a></li>
              <li class="breadcrumb-item active">Crear</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->


@stop

 @section('content')
 <form>
             <div class="row">
            
                 <div class="col-md-8">
                      <div class="card card-primary">
                           {{-- <div class="card-header ">
                                <h3 class="card-title">Crear una publicacion</h3>
                           </div> --}}
     
                          <div class="card-body">
                             <div class="form-group">
                               <label>Titulo de la publicacion</label>
                               <input name="title" placeholder="Ingresa el titulo de la publicacion" class="form-control">
                             </div>
                             
                             <div class="form-group">
                              <label>Contenido de la publicacion</label>
                              <textarea id="summernote" rows="10" name="body" placeholder="Ingresa el contenido completo de la publicacion" class="form-control"></textarea>
                             </div>
                          </div>
                      </div>
                 </div>
                 <div class="col-md-4">
                 <div class="card card-primary">
                                
                          <div class="card-body">
                             
                             <div class="form-group">
                               <label>Extracto de la publicacion</label>
                               <textarea name="mediumtext" placeholder="Ingresa un extracto de la publicacion" class="form-control"></textarea>
                             </div>
                        <div class="form-group">
                               <label>Fecha de publicacion:</label>
                             <div class="input-group date" id="reservationdate" data-target-input="nearest">
                             <input name="published_at" type="text" class="form-control datetimepicker-input" data-target="#reservationdate"/>
                           <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                           </div>
                            </div>
                            
                        </div>
                        <div class="form-group">
                             <label>Categorias</label>
                             <select class="form-control">
                                <option value="">Selecciona una categoria</option>
                                @foreach($categories as $category)
                                    <option value="{{$category->id}}"> {{$category->name}} </option>
                                @endforeach
                             </select>
                        </div>

                        <div class="form-group">
                        <label>Etiquetas</label>
                        <div class="select2-purple">
                        <select class="select2" multiple="multiple" data-placeholder="Selecciona una o mas etiquetas" style="width: 100%;" data-dropdown-css-class="select2-purple">
                        @foreach($tags as $tag)
                            <option value="{{$tag->id}}">{{$tag->name}}</option>
                        @endforeach
                        </select>
                        </div>
                        </div>

                        <div class="form-group">
                             <button type="submit" class="btn btn-primary btn-block">Guardar publicacion</button>
                        </div>
                           </div>
                 </div>                   
                 </div>
            
            </div>
</form>            
@stop

@push('styles')
 <!-- summernote -->
  <link rel="stylesheet" href={{asset("adminlte/plugins/summernote/summernote-bs4.min.css")}}>
    <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href={{asset("adminlte/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css")}}>
  <!-- Select2 -->
  <link rel="stylesheet" href={{asset("adminlte/plugins/select2/css/select2.min.css")}}>
  <link rel="stylesheet" href={{asset("adminlte/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css")}}>
  
@endpush



@push('scripts')
<!-- Summernote -->
<script src={{asset("adminlte/plugins/summernote/summernote-bs4.min.js")}}></script>
<!-- Select2 -->
<script src={{asset("adminlte/plugins/select2/js/select2.full.min.js")}}></script>
    <!-- Tempusdominus Bootstrap 4 -->
<script src={{asset("adminlte/plugins/moment/moment.min.js")}}></script>
<script src={{asset("adminlte/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js")}}></script>

    <!--Date picker-->
<script>

$(function () {
      // Summernote
    $('#summernote').summernote()

    //Initialize Select2 Elements
    $('.select2').select2()

    //Initialize Select2 Elements
    $('.select2bs4').select2({
      theme: 'bootstrap4'
    })


    $('#reservationdate').datetimepicker({
        format: 'L'
    });
})

</script>    


@endpush





