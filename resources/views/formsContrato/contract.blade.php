@extends('layouts.app')

@section('content')
<div>
  <div class="container">
    <div class="row">
      <div class="col-md-12 formcontent">
        <h1>Información del contrato</h1>
        <form
          class="ui form"
          action="{{route('contractPay')}}"
          id="contratoForm"
          method="POST">
          {{ method_field('post') }}
          {{csrf_field()}}
          <input type="hidden" name="asesorId" id="asesorId" value="{{$_GET["asesor"]}}" />
          <input type="hidden" name="clientId" id="clientId" value="{{decrypt($_GET["idenClient"])}}" />
          <input type="hidden" name="titleContract" id="titleContract" value="{{$tituloContrato}}" />
          <div class="form-group">
            <label>Nombre Completo del Titular del Contrato</label>
            <input
              type="text"
              value="{{$_GET["name"]}}"
              class="form-control"
              name="name"
              id="name"
              placeholder="Nombre Completo del Titular"
            />
          </div>
          <div class="form-group">
            <label>No de identificación</label>
            <input
              type="text"
              value="{{decrypt($_GET["numIdenficication"])}}"
              class="form-control"
              name="numIdenficication"
              id="numIdenficication"
              placeholder="no Identificación"
            />
          </div>
          <div class="form-group">
            <label>Dirección</label>
            <input
              type="text"
              value="{{decrypt($_GET["addrees"])}}"
              class="form-control"
              name="addrees"
              id="addrees"
              placeholder="Dirección"
            />
          </div>
          <div class="form-group">
            <label>Ocupación</label>
            <input
              type="text"
              class="form-control"
              name="ocupacion"
              id="ocupacion"
              placeholder="Ocupación"
            />
          </div>
          <div class="form-group">
            <label>Nombre de la Empresa</label>
            <input
              type="text"
              class="form-control"
              name="empresa"
              id="empresa"
              placeholder="Empresa"
            />
          </div>
          <div class="form-group">
            <label>Direccion</label>
            <input
              type="text"
              value="{{decrypt($_GET["city"])}}"
              class="form-control"
              name="city"
              id="city"
              placeholder="Direccion"
            />
          </div>
          <div class="form-group">
            <label>Domicilio</label>
            <input
              type="text"
              class="form-control"
              name="domicilio"
              id="domicilio"
              placeholder="Domicilio"
            />
          </div>
          <div class="form-group">
            <label>Cargo</label>
            <input type="text" class="form-control" name="cargo" id="cargo" placeholder="Cargo" />
          </div>
          <div class="form-group">
            <label>Teléfono</label>
            <input
              type="text"
              value="{{decrypt($_GET["phone"])}}"
              class="form-control"
              name="phone"
              id="phone"
              placeholder="Telefono"
            />
          </div>
          <div class="form-group">
            <label>Celular</label>
            <input
              type="text"
              class="form-control"
              name="celular"
              id="celular"
              placeholder="Celular"
            />
          </div>
          <div class="form-group">
            <label>Ingreso Mensual</label>
            <input
              type="text"
              class="form-control"
              name="ingresoMes"
              id="ingresoMes"
              placeholder="Ingreso Mensual"
            />
          </div>
          <div class="form-group">
            <label>Correo Electrónico</label>
            <input
              type="email"
              value="{{decrypt($_GET["email"])}}"
              class="form-control"
              name="email"
              id="email"
              placeholder="Correo Electronico"
            />
          </div>
          <hr>
          <h2>Referencias</h2>
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label>Nombre</label>
                <input
                  type="text"
                  class="form-control"
                  name="nombreRef"
                  id="nombreRef"
                  placeholder="Nombre"
                />
              </div>
              <div class="form-group">
                <label>Numero de Idenficication</label>
                <input
                  type="text"
                  class="form-control"
                  name="identificacionRef"
                  id="identificacionRef"
                  placeholder="Idenficication"
                />
              </div>
              <div class="form-group">
                <label>Ocupación</label>
                <input
                  type="text"
                  class="form-control"
                  name="ocupacionRef"
                  id="ocupacionRef"
                  placeholder="Ocupación"
                />
              </div>
              <div class="form-group">
                <label>Fecha de Nacimiento</label>
                <input
                  type="date"
                  class="form-control"
                  name="fechaNacRef"
                  id="fechaNacRef"
                />
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label>Nombre</label>
                <input
                  type="text"
                  class="form-control"
                  name="nombreRef2"
                  id="nombreRef2"
                  placeholder="Nombre"
                />
              </div>
              <div class="form-group">
                <label>Numero de Idenficication</label>
                <input
                  type="text"
                  class="form-control"
                  name="identificacionRef2"
                  id="identificacionRef2"
                  placeholder="Idenficication"
                />
              </div>
              <div class="form-group">
                <label>Ocupación</label>
                <input
                  type="text"
                  class="form-control"
                  name="ocupacionRef2"
                  id="ocupacionRef2"
                  placeholder="Ocupación"
                />
              </div>
              <div class="form-group">
                <label>Fecha de Nacimiento</label>
                <input
                  type="date"
                  class="form-control"
                  name="fechaNacRef2"
                  id="fechaNacRef2"
                />
              </div>
            </div>
          </div>

          <div class="form-check">
            <input
              onchange="contrato()"
              class="form-check-input"
              type="checkbox"
              value="SI"
              name="terminos"
              id="terminos"
            />
            <label class="form-check-label" for="terminos">
              Acepto estos términos y deseo continuar.
            </label>
          </div>
          <div class="form-check">
            <input
              class="form-check-input"
              type="checkbox"
              value="SI"
              name="terminosCompra"
              id="terminosCompra"
            />
            <label class="form-check-label" for="terminosCompra">
              Entiendo que los anteriores Términos de Compra tienen una
              fecha de ejemplo del acuerdo final (el "contrato"). Reconozco
              que recibiré el contrato efectivo final por correo electrónico
              al recibir el pago.
            </label>
          </div>
          <div class="form-check">
            <input
              class="form-check-input"
              type="checkbox"
              value="SI"
              name="terminosCusro"
              id="terminosCusro"
            />
            <label class="form-check-label" for="terminosCusro">
              Término del Curso: Entiendo y acepto que estoy comprando un programa de doce (12) meses por cuotas; y después que termine la duración, el programa se renovará automáticamente cada mes para que pueda continuar disfrutando el servicio.
            </label>
          </div>
          <br>
          <div id="contratocontenedor" style="display: none;">
            <div id='contrato' style="height: 300px !important;
            border: 1px solid #ddd !important;
            background: #f1f1f1 !important;
            overflow-y: scroll !important;">
              <div id='contenido' style="height: auto !important;">
                @foreach ($contract as $cnt)
                  <h4 class="textoContrato">TÉRMINOS Y CONDICIONES DE COMPRA: CONTRATO CELEBRADO EL {{$date_now}} ENTRE
                   <h4  class="textoContrato" id="nombreContrato"> </h4> <h4 class="textoContrato"> Y LECTOR AMI .</h4>
                  <p class="textoContrato">Por favor, lea los siguientes términos y condiciones de compra
                  con detenimiento (colectivamente, las &quot;Condiciones de Compra&quot;).
                  Estas Condiciones de Compra constituyen un acuerdo legal y
                  vinculante entre usted y Lector AMI (la &quot;Compañía&quot;) en relación
                  con la compra de 1 Programa(s) lectura Inteligente por (12)
                  mes(es) de Conexión (el &quot;Programa&quot;) ofrecido por la Compañía
                  de acuerdo con el interés demostrado por Ud. en su visita a la
                  página web. www.marketing.lectorami.co. Esta adquisición, está
                  sujeta a los Términos de Servicio que se encuentran publicados
                  en correo electrónico enviado por la Compañía, los cuales se
                  consideran parte integrante del presente documento.</p>
                  PAGO
                  <p class="textoContrato">
                    {{$cnt->firstText}}
                  </p>
                  RENOVACIÓN AUTOMÁTICA
                  <p class="textoContrato">
                    {{$cnt->secondText}}
                  </p>
                  <p class="textoContrato">Si usted tiene alguna pregunta o comentario sobre estas
                  condiciones de Compra, por favor, no dude en contactar a un
                  asesor de la Compañía a través de llamada telefónica al número
                  3213202115 o a través de los medios de contacto publicados en
                  la página web <a href="https://www.lectorami.com" target="_blank">www.lectorami.com</a>.</p>
                  <p class="textoContrato">NOTIFICACIONES A LECTOR AMI ACADEMIA</p>
                  <p class="textoContrato">Att: Asuntos Legales y Comerciales</p>
                  <p class="textoContrato">CARRERA 11 # 22N-10 POPAYAN</p>
                  <p class="textoContrato">Colombia</p>
                  <p class="textoContrato">3213202115 LINEA NACIONAL Whatsapp</p>
                  <p class="textoContrato">* El Suscriptor</p>
                  <p class="textoContrato">LECTOR AMI La Compañía</p>

                  <p class="textoContrato">*Por firma electrónica a las {{$date_now_hours}} </p>
                @endforeach
              </div>
            </div>
          </div>
          <div class="panel panel-default">
            <div class="panel-body">
              <b>GARANTÍA AMI PROFESIONAL Y AMI SEMIPROFESIONAL: LECTOR AMI COLOMBIA </b> dará al beneficiario asesoría especializada durante 4 meses a partir de la fecha en
              que se inicien las asesorías, el alumno se compromete a realizar las prácticas que el profesional le estipule, al igual asistir dos veces por semana una hora por cada clase para
              recibir sus asesoría. Esto es importante para poder garantizar el resultado de las habilidades antes mencionadas. En caso de no lograr las habilidades en el tiempo estipulado,
              podrá continuar con las asesorías hasta que desarrolle la habilidad teniendo como máximo 4 meses adicionales sin incremento en el pago. Nota: Solo si la persona cumple con
              las condiciones del programa. Asistir dos veces por semana y realizar las practicas que la monitora indique. Es importante mencionar que los pagos de cuota inicial y mensual
              dados no se pueden suspender bajo ninguna circunstancia. No se aceptan devoluciones. Una vez iniciado, debe cancelar la totalidad del programa asista ó no, es su
              responsabilidad. GARANTÍAAMI KIDS: Este programa tiene una duración de 10 meses completos, en caso de no culminar los objetivos planteados en el formato de verificación
              se otorgarán 2 meses adicionales para la finalización del mismo siempre y cuando haya cumplido con las condiciones establecidas.
            </div>
          </div>
          <textarea name="contract" style="display: none;" id="contract"></textarea>
          <button
            type="submit"
            id="pago"
            class="btn btn-success btn-lg btn-block"
          >
            Enviar Contrato
          </button>
        </form>
      </div>
    </div>
  </div>
</div>
<div
  class="modal fade"
  id="terminosdoc"
  tabindex="-1"
  role="dialog"
  aria-labelledby="ModalCenterTitle"
  aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="ModalCenterTitle">
          Política de Privacidad de Datos
        </h5>
        <button
          type="button"
          class="close"
          data-dismiss="modal"
          aria-label="Close"
        >
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>
          LECTOR AMI pone en conocimiento de los usuarios de
          www.lectorami.com, su política de protección de datos de carácter
          personal, para que los usuarios determinen libre y voluntariamente
          si desean facilitar a LECTOR AMI los datos personales que se les
          requieran con ocasión de rellenar cualquier formulario o correo de
          contacto, sin perjuicio que se proceda a dar cumplimiento al deber
          de información en cada uno de los medios a través de los que se
          proceda a la recogida de datos de carácter personal.
        </p>
        <p>
          LECTOR AMI declara su respeto y cumplimiento de las disposiciones
          recogidas en el decreto 1377 del 2013 de la republica de Colombia.
          El usuario responderá, en cualquier caso, de la veracidad de los
          datos facilitados, reservándose LECTOR AMI, el derecho a excluir
          de los servicios registrados a todo usuario que haya facilitado
          datos falsos, sin perjuicio de las demás acciones que procedan en
          derecho.
        </p>
        <p>
          Usted queda informado que los datos que facilite a través de la
          página web www.lectorami.com, LECTOR AMI utilizará esos datos para
          el envío de información, para el envío de publicidad y para la
          solicitud de información sobre productos y servicios y mejorar la
          calidad del servicio.
        </p>
        <p>
          Le informamos de la posibilidad de ejercer en cualquier momento
          los derechos de acceso, rectificación, oposición y, en su caso,
          cancelación de sus datos de carácter personal suministrados,
          mediante petición escrita dirigida a LECTOR AMI en la Carrera 4f #
          35-21 barrio Cadiz de la ciudad de Ibagué, Tolima, Colombia. O
          expresándolo por escrito vía correo electrónico a
          info@lectorami.com.
        </p>
      </div>
      <div class="modal-footer">
        <button
          type="button"
          class="btn btn-secondary"
          data-dismiss="modal"
        >
          Cerrar
        </button>
      </div>
    </div>
  </div>
</div>
@endsection
