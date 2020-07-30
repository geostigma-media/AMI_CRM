@extends('layouts.app')
@section('content')
<div class="page-wrapper">
  <div class="container-fluid">
    <div class="row page-titles">
      <div class="col-md-5 align-self-center">
        <h4 class="text-themecolor">Bienvendio</h4>
      </div>
      <div class="col-md-7 align-self-center text-right">
        <div class="d-flex justify-content-end align-items-center">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="/">Inicio</a></li>
              <li class="breadcrumb-item"><a href="/correos">Gestion de Correos</a></li>
              <li class="breadcrumb-item activate"><a href="#">Editar Correo</a></li>
            </ol>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-body">
            <form  action="{{route('updatePlantilla',$templateEmail->id)}}" id="formEmails" method="POST" enctype="multipart/form-data">
              {{csrf_field()}}
              {{ method_field('put') }}
              <div class="form-group">
                <label for="title">Titulos</label>
                <input type="text" value="{{$templateEmail->title}}" class="form-control" id="title" name="title">
              </div>
              <div class="form-group">
                <label for="firstText">Texto Principal</label>
                <textarea name="firstText" class="form-control" id="firstText" cols="30" rows="10" style="resize: none">{{$templateEmail->firstText}}</textarea>
              </div>
              <div class="form-group">
                <img src="{{asset('images/'.$templateEmail->image)}}" style="width: 20%" alt="">
                <label for="image">Imagen</label>
                <input type="file" name="image" id="image" value="{{$templateEmail->image}}">
              </div>
              <button type="submit" class="btn btn-primary">Editar Plantilla</button>
              <a href="/correos" class="btn btn-warning">Cancelar</a>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
