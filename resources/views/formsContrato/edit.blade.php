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
              <li class="breadcrumb-item"><a href="/contratos">Gestion de Contratos</a></li>
              <li class="breadcrumb-item activate">Editar Correo</li>
            </ol>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-body">
            <form action="{{route('updateContract',$contract->id)}}" method="POST" id="contratoEdit">
              {{csrf_field()}}
              {{ method_field('put') }}
              <div class="form-group">
                <label for="title">Titulo</label>
                <input type="text" class="form-control" value="{{$contract->title}}" id="title" name="title" placeholder="Titulo del contrato">
              </div>
              <div class="form-group">
                <label for="firstText">Texto Principal</label>
                <textarea name="firstText" class="form-control" id="firstText" style="resize: none" cols="30" rows="10">{{$contract->firstText}}</textarea>
              </div>
              <div class="form-group">
                <label for="secondText">Texto Secundario</label>
                <textarea name="secondText" class="form-control" id="secondText" style="resize: none" cols="30" rows="10">{{$contract->secondText}}</textarea>
              </div>
              <div class="form-group">
                <label for="link">Link de pago</label>
              <input type="text" class="form-control" value="{{$contract->link}}" id="link" name="link" placeholder="Link de pago o Promoción">
              </div>
              @if($contract->emailId != null || $contract->emailId != '')
                <div class="form-group">
                  <label>Plantilla de Email</label>
                  <select class="form-control select2" name="emailId" style="width: 100%" id="emailId">
                    <option value="{{$contract->emails->id}}">{{$contract->emails->title}}</option>
                    @foreach ($templatesEmail as $template)
                      <option value="{{$template->id}}">{{$template->title}}</option>
                    @endforeach
                  </select>
                </div>
              @endIf
              <button type="submit" class="btn btn-primary">Editar Contrato</button>
              <a href="/contratos" class="btn btn-warning">Cancelar</a>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
