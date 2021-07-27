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
 
 <form method="POST" action="{{route('admin.posts.update', $post)}}">
    {{csrf_field()}} {{method_field('PUT')}}
             <div class="row">
            
                 <div class="col-md-8">
                      <div class="card card-primary">
                           {{-- <div class="card-header ">
                                <h3 class="card-title">Crear una publicacion</h3>
                           </div> --}}
     
                          <div class="card-body">
                             <div class="form-group">
                               <label @error('title') style="color:red" @enderror>Titulo de la publicacion</label>
                               <input name="title" value="{{old('title', $post->title)}}" placeholder="Ingresa el titulo de la publicacion" class="form-control @error('title') is-invalid @enderror">
                               @error('title')
                               <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                               @enderror
                              {{-- {!!$errors->first('title','<span class="alert-danger">:Mensaje</span>')!!} --}}
                               
                             </div>
                             
                             <div class="form-group">
                              <label @error('body') style="color:red" @enderror>Contenido de la publicacion</label>
                              <textarea id="summernote" rows="10" name="body" placeholder="Ingresa el contenido completo de la publicacion" class="form-control @error('body') is-invalid @enderror">{{old('body',$post->body)}}</textarea>
                             @error('body')
                               <span class="invalid-feedback" role="a">
                                        <strong>{{ $message }}</strong>
                                    </span>
                               @enderror
                             </div>
                             

                          </div>
                          
                      </div>
                 </div>
                 <div class="col-md-4">
                 <div class="card card-primary">
                                
                          <div class="card-body">
                             
                             <div class="form-group">
                               <label @error('mediumtext') style="color:red" @enderror>Extracto de la publicacion</label>
                               <textarea name="mediumtext" placeholder="Ingresa un extracto de la publicacion" class="form-control @error('mediumtext') is-invalid @enderror">{{old('mediumtext', $post->mediumtext)}}</textarea>
                             @error('mediumtext')
                               <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                               @enderror
                             </div>
                        <div class="form-group">
                               <label @error('published_at') style="color:red" @enderror>Fecha de publicacion:</label>
                             <div class="input-group date" id="reservationdate" data-target-input="nearest">
                             {{-- <input name="published_at" value="{{old('published_at', $post->published_at ? $post->published_at->format('m/d/Y') : null)}}" type="text" class="form-control datetimepicker-input @error('published_at') is-invalid @enderror" data-target="#reservationdate"/> --}}
                             <input name="published_at" value="{{old('published_at', $post->published_at ? $post->published_at->format('m/d/Y') : null)}}" type="text" class="form-control datetimepicker-input @error('published_at') is-invalid @enderror" data-target="#reservationdate"/>
                           <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                           </div>
                           @error('published_at')
                               <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                               @enderror
                            </div>
                            
                        </div>
                        <div class="form-group">
                             <label @error('category_id') style="color:red" @enderror>Categorias</label>
                             <select name="category_id" class="form-control @error('category_id') is-invalid @enderror">
                                <option value="">Selecciona una categoria</option>
                                @foreach($categories as $category)
                                    <option value="{{$category->id}}" {{old('category_id', $post->category_id) == $category->id ? 'selected' : ''}} >{{$category->name}} </option> {{-- Para que el campo categorias se quede con el valor en caso de error una validacion y se refresquen los datos introducidos --}}
                                @endforeach
                             </select>
                             @error('category_id')
                               <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                               @enderror
                        </div>

                        <div class="form-group">
                        <label @error('tags') style="color:red" @enderror>Etiquetas</label>
                        <div class="select2-purple">
                        <select name="tags[]" class="select2 @error('tags') is-invalid @enderror"  multiple="multiple" data-placeholder="Selecciona una o mas etiquetas" style="width: 100%;" data-dropdown-css-class="select2-purple">
                        @foreach($tags as $tag)
                            <option {{ collect(old('tags',$post->tags->pluck('id')))->contains($tag->id) ? 'selected' : ''}} value="{{$tag->id}}">{{$tag->name}}</option>
                        @endforeach
                        </select>
                        @error('tags')
                               <span class="invalid-feedback" role="a">
                                        <strong>{{ $message }}</strong>
                                    </span>
                               @enderror
                        </div>
                        </div>

                        <div class="form-group">

                        <div class="dropzone"></div>

                        </div>

                        <div class="form-group">
                             <button type="submit" class="btn btn-primary btn-block">Guardar publicacion</button>
                        </div>
                           </div>
                 </div>                   
                 </div>
            
            </div>
</form>     

@if($post->photos->count())
 <div class="row">
    <div class="col-md-8">
        <div class="card card-primary">
            <div class="card-body">

                @foreach($post->photos as $photo)
                <form method="POST" action="{{route('admin.photos.destroy',$photo)}}">
                    {{method_field('DELETE') }} {{ csrf_field() }}
                    <div class="col-sm-4">
                        <button class="btn btn-danger btn-xs " style="position: absolute">X</button>
                        <img class="img-responsive" width="200px" src="{{url($photo->url)}}">
                    </div>
                <form>
                 @endforeach
            </div>
        </div>
    </div>
</div>
@endif



@stop

@push('styles')
 <!-- summernote -->
  <link rel="stylesheet" href={{asset("adminlte/plugins/summernote/summernote-bs4.min.css")}}>
    <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href={{asset("adminlte/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css")}}>
  <!-- Select2 -->
  <link rel="stylesheet" href={{asset("adminlte/plugins/select2/css/select2.min.css")}}>
  <link rel="stylesheet" href={{asset("adminlte/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css")}}>
  <link rel="stylesheet" href={{asset("adminlte/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css")}}>
  <link rel="stylesheet" href={{asset("adminlte/css/dropzone.css")}}>
  
@endpush



@push('scripts')

<script src={{asset("adminlte/js/dropzone.min.js")}}></script>
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
    $('#summernote').summernote({
      height: 415,
    })

    //Initialize Select2 Elements
    $('.select2').select2({
      tags: true
    })

    //Initialize Select2 Elements
    $('.select2bs4').select2({
      theme: 'bootstrap4'
    })

 

    $('#reservationdate').datetimepicker({
        format: 'L'
    });
})


 var myDropzone = new Dropzone('.dropzone', {
   url: '/admin/posts/{{$post->url}}/photos',
   acceptedFiles: 'image/*',
   maxFilesize: 2,
   //maxFiles:1,
   paramName: 'photo',
   headers: {
       'X-CSRF-TOKEN' : '{{csrf_token()}}'
   },
   dictDefaultMessage: 'Arrastra las fotos aqui para subirlas'
});


Dropzone.autoDiscover= false;

</script>    


@endpush





