@extends('admin.layout')

@section('header')

<div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Todas las publicaciones</h1>
            
          </div><!-- /.col -->
          <div class="col-sm-6">
          
          
          
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Inicio</a></li>
              <li class="breadcrumb-item active">Posts</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->


@stop


@section('content') 

              

<div class="card">
              <div class="card-header">
              
                <h3 class="card-title">Listado de publicaciones</h3>
              
                <button class="btn btn-primary float-right" data-toggle="modal" data-target="#exampleModal">Crear Publicacion</button>
                
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="posts-table" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>ID</th>
                    <th>Titulo</th>
                    <th>Extracto</th>
                    <th>Acciones</th>
                    
                  </tr>
                  </thead>
                  <tbody>
                  @foreach($posts as $post)
                  <tr>
                       <td>{{$post->id}}</td>
                       <td>{{$post->title}}</td>
                       <td>{{$post->mediumtext}}</td>
                       <td>
                       <a href="{{route('posts.show',$post)}}" class="btn btn-info" target="_blank"><i class="fa fa-eye"></i></a>
                       <a href="{{route('admin.posts.edit', $post)}}" class="btn btn-info"><i class="fa fa-edit"></i></a>
                       <form method="POST" action="{{route('admin.posts.destroy',$post)}}" style="display: inline">
                       {{csrf_field()}}  {{method_field('DELETE')}}
                       <button class="btn btn-danger" onclick="return confirm('Estas seguro de qeliminar el post')"><i class="fa fa-times-circle"></i></button>
                       </form>
                       
                       </td>
                  </tr>
                      
                  @endforeach
                 
                  </tbody>
                  {{-- <tfoot>
                  <tr>
                    <th>ID</th>
                    <th>Titulo</th>
                  </tr>
                  </tfoot> --}}
                </table>
              </div>
              <!-- /.card-body -->
            </div>

@stop    