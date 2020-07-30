@extends('layouts.app')
@section('contenido')
<div class="continer">
  <div class="row">
    <div class="col-lg-4 col-md-12">
      <div class="card">
        <div class="card-body">
          @if($errors->any())
          <div class="alert alert-danger" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
            @foreach($errors->all() as $error)
              {{ $error }}<br/>
            @endforeach
          </div>
        @endif
          <form
            class="ui form"
            action="{{route('createPublic')}}"
            id=""
            method="POST">
            {{ method_field('post') }}
            {{csrf_field()}}
            <div class="form-group">
              <input type="text" class="form-control" name="name" id="name" placeholder="Nombre Completo">
              <input type="hidden" name="asesorId" id="asesorId" value="1">
            </div>
            <div class="form-group">
              <input type="email" class="form-control" name="email" id="email" placeholder="Correo Electronico">
            </div>
            <div class="form-group">
              <input type="text" class="form-control" name="phone" id="phone" placeholder="Celular">
            </div>
            <button type="submit" id="" class="btn btn-success btn-block">Inscribir</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
