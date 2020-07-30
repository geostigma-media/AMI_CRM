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
              </ol>
          </div>
        </div>
      </div>
        <div class="row">
          @if (Auth()->user()->role == 1)
            @include('layouts.cardsCountAdmin')
          @else
            @include('layouts.cardsCountAsesor')
          @endif
        </div>
        <div class="row">
            <div class="col-lg-12 col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div id="morris-donut-chart" class="ecomm-donute"></div>
                          <div class="row">
                            <div class="col-md-12">
                              @if(Session::has('message'))
                                <div class="alert alert-success">
                                  {!! Session::get('message') !!}
                                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                </div>
                              @endif
                              @if(Session::has('messageErrorEmail'))
                                <div class="alert alert-danger">
                                  {!! Session::get('messageErrorEmail') !!}
                                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                </div>
                              @endif
                              <div id="tabs">
                                <ul class="nav nav-tabs" role="tablist">
                                  @if (Auth()->user()->role == 1)
                                    <li class="nav-item">
                                      <a class="nav-link active" data-toggle="tab" href="#tabs-1" role="tab">Lista de Clientes</a>
                                    </li>
                                    <li class="nav-item">
                                      <a class="nav-link" data-toggle="tab" href="#tabs-2" role="tab">Registrar</a>
                                    </li>
                                    <li class="nav-item">
                                      <a class="nav-link" data-toggle="tab" href="#tabs-3" role="tab">Envio de Correos Promocionales</a>
                                    </li>
                                  @else
                                    <li class="nav-item">
                                      <a class="nav-link active" data-toggle="tab" href="#tabs-1" role="tab">Lista de mis Clientes</a>
                                    </li>
                                    <li class="nav-item">
                                      <a class="nav-link" data-toggle="tab" href="#tabs-2" role="tab">Registrar</a>
                                    </li>
                                    <li class="nav-item">
                                      <a class="nav-link" data-toggle="tab" href="#tabs-3" role="tab">Envio de Correos Promocionales</a>
                                    </li>
                                  @endif
                                </ul>
                              </div>
                              <br>
                              <div id="appinterno" class="tab-content">
                                @if (Auth()->user()->role == 1)
                                  @include('layouts.tabs.tabsAdmin')
                                @else
                                  @include('layouts.tabs.tabsClient')
                                @endif
                              </div>
                            </div>
                          </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
  </div>
</div>
@endsection
