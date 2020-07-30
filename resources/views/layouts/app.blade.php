<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" type="image/png" sizes="16x16" href="../assets/images/favicon.png">
    <title>Lector AMI CRM</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/7e8f963e2a.js" crossorigin="anonymous"></script>
    <link href="{{ asset('extras/morrisjs/morris.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css')}}" rel="stylesheet">
    <link href="{{ asset('css/styles.css')}}" rel="stylesheet">
    <link href="{{ asset('css/style.min.css')}}" rel="stylesheet">
    <link href="{{ asset('extras/toast-master/css/jquery.toast.css') }}" rel="stylesheet">
    <link href="{{ asset('css/pages/dashboard1.css')}}" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
</head>

<body class="skin-default-dark fixed-layout">
@routes
<style>
.btncelular{
  display:none !important;
}
@media (max-width: 992px) {
  .btncelular {
    display: block !important;
  }
  .btngrande{
    display:none;
  }
  .breadcrumb{margin-top: -22px !important;}

}
</style>
    <div id="main-wrapper">
    <div id="app">
    @guest
      <main class="py-4">
        @yield('contenido')
      </main>
    @else
      @include('layouts.nav')
    @endguest
      <main class="py-4">
        @yield('content')
      </main>
    </div>
    @include('layouts.fotter')
    <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
    <script src="{{ asset ('js/perfect-scrollbar.jquery.min.js') }}"></script>
    <script src="{{ asset('js/waves.js') }}"></script>
    <script src="{{ asset('js/sidebarmenu.js') }}"></script>
    <script src="{{ asset('js/custom.min.js') }}"></script>
    <script src="{{ asset('extras/popper/popper.min.js') }}"></script>
    <script src="{{ asset('extras/flot/jquery.flot.js') }}"></script>
    <script src="{{ asset('extras/flot.tooltip/js/jquery.flot.tooltip.min.js') }}"></script>
    <script src="{{ asset('extras/sparkline/jquery.sparkline.min.js') }}"></script>
    <script src="{{ asset('extras/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('js/dashboard2.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.8/js/select2.min.js" defer></script>
    <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.5/js/dataTables.responsive.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.min.js"></script>
    <script src="{{ asset('js/validacion.js') }}"></script>
    <script src="{{ asset('js/functions.js') }}"></script>

    <script type="text/javascript">
    $(document).ready(function() {
      $('.select2').select2({
        allowClear: true,
        placeholder: "Seleccione una opcion.."
      });
      $('.table').DataTable({ language:
        {
          sProcessing: "Procesando...",
          sLengthMenu: "Mostrar _MENU_ registros",
          sZeroRecords: "No se encontraron resultados",
          sEmptyTable: "Ningún dato disponible en esta tabla",
          sInfo:
            "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
          sInfoEmpty: "Mostrando registros del 0 al 0 de un total de 0 registros",
          sInfoFiltered: "(filtrado de un total de _MAX_ registros)",
          sInfoPostFix: "",
          sSearch: "Buscar:",
          sUrl: "",
          sInfoThousands: ",",
          sLoadingRecords: "Cargando...",
          oPaginate: {
            sFirst: "Primero",
            sLast: "Último",
            sNext: "Siguiente",
            sPrevious: "Anterior",
          },
          oAria: {
            sSortAscending:
              ": Activar para ordenar la columna de manera ascendente",
            sSortDescending:
              ": Activar para ordenar la columna de manera descendente",
          },
        }
      });
      let alerta = $(".close").length;
      if (alerta == 1) {
        setTimeout(function () {
          $(".alert-success").fadeOut(1500);
        }, 3000);
      }
    });
  </script>


</body>
</html>
