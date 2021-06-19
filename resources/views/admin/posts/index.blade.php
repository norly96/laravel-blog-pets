@extends('admin.layout')

@section('header')

<div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Todas las publicaciones</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Inicio</a></li>
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
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="posts-table" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>ID</th>
                    <th>Titulo</th>
                    
                  </tr>
                  </thead>
                  <tbody>
                  @foreach($posts as $post)
                  <tr>
                       <td>{{$post->id}}</td>
                       <td>{{$post->title}}</td>
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