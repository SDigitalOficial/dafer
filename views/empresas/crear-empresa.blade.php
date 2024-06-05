@extends ('LayoutDafer.layout')

    @section('cabecera')
    @parent

    
    <link rel="stylesheet" href="/validaciones/dist/css/bootstrapValidator.css"/>

    <script type="text/javascript" src="/validaciones/vendor/jquery/jquery.min.js"></script>
    <script type="text/javascript" src="/validaciones/vendor/bootstrap/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="/validaciones/dist/js/bootstrapValidator.js"></script>
   
   {{ Html::style('modulo-facturacion/css/bootstrap-datetimepicker.min.css') }}
<script type="text/javascript">
function mostrar(id) {
  if (id == "estudiante") {
    $("#estudiante").show();
    $("#trabajador").hide();
    $("#autonomo").hide();
    $("#paro").hide();
  }
  
  if (id == "trabajador") {
    $("#estudiante").hide();
    $("#trabajador").show();
    $("#autonomo").hide();
    $("#paro").hide();
  }
  
  if (id == "autonomo") {
    $("#estudiante").hide();
    $("#trabajador").hide();
    $("#autonomo").show();
    $("#paro").hide();
  }
  
  if (id == "paro") {
    $("#estudiante").hide();
    $("#trabajador").hide();
    $("#autonomo").hide();
    $("#paro").show();
  }
}
</script>

    @stop

@section('ContenidoSite-01')

<div class="container">
 <div class="row">
 <div class="col-md-12 col-xl-12">
  <div class="content-header">
   <ul class="nav-horizontal text-center">
    <a class="btn btn-primary waves-effect waves-light" href="/dafer/usuarios"><i class="gi gi-parents"></i> Usuarios</a>
    <a class="btn btn-primary waves-effect waves-light" href="/dafer/crear-usuario"><i class="fa fa-user-plus"></i> Crear Usuario</a>
   </ul>
  </div>
 </div>
</div>
</div>

<div class="container">   
<div class="row">

 <label class="col-md-3 control-label" for="example-select">Tipo de cliente</label>
  <div class="col-md-12">
  <select  class="form-control" name="status" onchange="mostrar(this.value);">
        <option selected>--- Elige persona ---</option>
        <option value="estudiante">Crear Cliente Individual</option>
        <option value="trabajador">Crear Cliente Empresa</option>
     </select>
   <br><br>
  </div>

</div>
</div>


<div id="trabajador" class="element" style="display: none;">
                                <div class="block">

                                    <div class="card m-b-30">
                                        <div class="card-body">
            
                                            <h4 class="mt-0 header-title">Crear Cliente Empresa</h4>
                                            <p class="text-muted font-14">Parsley is a javascript form validation
                                                library. It helps you provide your users with feedback on their form
                                                submission before sending it to your server.</p>
                                    
                                    <!-- Basic Form Elements Content -->
                                  {{ Form::open(array('method' => 'POST','class' => 'form-horizontal','id' => 'defaultForm1', 'url' => array('dafer/crear-empresa'))) }}

                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-email-input">Nombre del Negocio</label>
                                            <div class="col-md-12">
                                                  {{Form::text('n_negocio', '', array('class' => 'form-control','placeholder'=>'Ingrese nombre o razón social' ))}}
                                            </div>
                                        </div>

                                          <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-select">Estructura Legal</label>
                                            <div class="col-md-12">
                                                 {{ Form::select('e_legal', [
                                                 '1' => 'NJ Domestic For-Profit Corporation (DP)',
                                                 '2' => 'NJ Domestic Professional Corporation (PA)',
                                                 '3' => 'NJ Domestic Limited Liability Company (LLC)',
                                                 '4' => 'NJ Domestic Limited Partnership (LLP)',
                                                 '5' => 'NJ Domestic Non-Profit Corporation (NP)',
                                                 '6' => 'NJ Foreign For-Profit Corporation (FR)',
                                                 '7' => 'NJ Foreign Limited Liability Company (FLC)',
                                                 '8' => 'NJ Foreign Limited Partnership (LF)',
                                                 '9' => 'NJ Foreign Limited Liability Partnership (FLP)',
                                                 '10' => 'NJ Foreign Non-Profit Corportion (NF)',
                                                 '11' => 'NJ Domestic Non-Profit Veteran Corporation (NV)'], null, array('class' => 'form-control','placeholder'=>'-- Seleccione tipo identificación --')) }}
                                             </div>
                                        </div>

                                            <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-select">Tipo identificación</label>
                                            <div class="col-md-12">
                                                 {{ Form::select('t_identificacion', [
                                                 '1' => 'EIN'], null, array('class' => 'form-control','placeholder'=>'-- Seleccione tipo identificación --')) }}
                                             </div>
                                        </div>

                                         <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-password-input">Número de identificación</label>
                                            <div class="col-md-12">
                                                {{Form::text('n_identificacion', '', array('class' => 'form-control','placeholder'=>'Ingrese número identificación' ))}}
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-password-input">Representante empresa</label>
                                            <div class="col-md-9">
                                                {{Form::text('representante', '', array('class' => 'form-control','placeholder'=>'Nombre Representante' ))}}
                                            </div>
                                        </div>


                                         <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-password-input">Teléfono (1)</label>
                                            <div class="col-md-12 date" id="datetimepicker7">
                                                   {{Form::text('tel_1', '', array('class' => 'form-control','placeholder'=>'Ingrese Telefono' ))}}
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-password-input">Teléfono (2)</label>
                                            <div class="col-md-12 date" id="datetimepicker7">
                                                   {{Form::text('tel_2', '', array('class' => 'form-control','placeholder'=>'Ingrese Telefono' ))}}
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-password-input">Teléfono (3)</label>
                                            <div class="col-md-12 date" id="datetimepicker7">
                                                   {{Form::text('tel_3', '', array('class' => 'form-control','placeholder'=>'Ingrese Telefono' ))}}
                                            </div>
                                        </div>


                                         <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-password-input">Correo electrónico (1)</label>
                                            <div class="col-md-12">
                                                 {{Form::text('email', '', array('class' => 'form-control','placeholder'=>'Ingrese Correo electronico' ))}}
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-password-input">Correo electrónico (2)</label>
                                            <div class="col-md-12">
                                                 {{Form::text('email_dos', '', array('class' => 'form-control','placeholder'=>'Ingrese Correo electronico' ))}}
                                            </div>
                                        </div>

                                        
                                         <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-password-input">Dirección</label>
                                            <div class="col-md-12">
                                                    {{Form::text('direccion_1', '', array('class' => 'form-control','placeholder'=>'Ingrese dirección' ))}}
                                            </div>
                                        </div>

                                         <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-password-input">Ciudad</label>
                                            <div class="col-md-12">
                                                  {{Form::text('ciudad', '', array('class' => 'form-control','placeholder'=>'Ingrese dirección' ))}}
                                              </div>
                                            </div>



                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-password-input">Estado</label>
                                            <div class="col-md-12">
                                                  {{Form::text('estado', '', array('class' => 'form-control','placeholder'=>'Ingrese dirección' ))}}
                                              </div>
                                            </div>

                                            <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-password-input">Código Postal</label>
                                            <div class="col-md-12">
                                                  {{Form::text('c_postal', '', array('class' => 'form-control','placeholder'=>'Ingrese dirección' ))}}
                                              </div>
                                            </div>

                                          

                                          <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-password-input">Dirección (2)</label>
                                            <div class="col-md-12">
                                                    {{Form::text('direccion_2', '', array('class' => 'form-control','placeholder'=>'Ingrese dirección' ))}}
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-password-input">Ciudad (2)</label>
                                            <div class="col-md-12">
                                                  {{Form::text('ciudad_2', '', array('class' => 'form-control','placeholder'=>'Ingrese dirección' ))}}
                                              </div>
                                            </div>



                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-password-input">Estado (2)</label>
                                            <div class="col-md-12">
                                                  {{Form::text('estado_2', '', array('class' => 'form-control','placeholder'=>'Ingrese dirección' ))}}
                                              </div>
                                            </div>

                                            <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-password-input">Código Postal (2)</label>
                                            <div class="col-md-12">
                                                  {{Form::text('c_postal_2', '', array('class' => 'form-control','placeholder'=>'Ingrese dirección' ))}}
                                              </div>
                                            </div>
                                         <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-password-input">Fecha inicio</label>
                                            <div class="col-md-12 ">
                                                  {{Form::date('f_inicio','', array('class' => 'form-control','placeholder'=>'Ingrese fecha inicio'))}}
                                            </div>
                                        </div>


                                         <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-password-input">Situación Actual</label>
                                            <div class="col-md-12">
                                                 {{ Form::select('s_actual', [
                                                 '1' => 'Activo',
                                                 '2' => 'Inactivo',
                                                 '3' => 'Saldo Pendiente',], null, array('class' => 'form-control','placeholder'=>'-- Seleccione situación cliente --')) }}
                                            </div>
                                        </div>

                                        {{Form::hidden('tipo', '1', array('class' => 'form-control','placeholder'=>'Ingrese nombre o razón social' ))}}
    

                                          
                                        <div class="form-group form-actions">
                                            <div class="col-md-9 col-md-offset-3">
                                                <button type="submit" class="btn btn-sm btn-primary"><i class="fa fa-angle-right"></i> Submit</button>
                                                <button type="reset" class="btn btn-sm btn-warning"><i class="fa fa-repeat"></i> Reset</button>
                                            </div>
                                        </div>
                                    {{ Form::close() }}
                                
 </div>
                                    </div>
                                </div> <!-- end col --></div>


    <div id="estudiante" class="element" style="display: none;">
                                <div class="block">

                                    <div class="card m-b-30">
                                        <div class="card-body">
            
                                            <h4 class="mt-0 header-title">Crear Cliente Individual</h4>
                                            <p class="text-muted font-14">Parsley is a javascript form validation
                                                library. It helps you provide your users with feedback on their form
                                                submission before sending it to your server.</p>
                                    
                                    <!-- Basic Form Elements Content -->
                                  {{ Form::open(array('method' => 'POST','class' => 'form-horizontal','id' => 'defaultForm1', 'url' => array('dafer/crear-empresa'))) }}


                                        
        

                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-email-input">Nombre del Cliente</label>
                                            <div class="col-md-12">
                                                  {{Form::text('n_negocio', '', array('class' => 'form-control','placeholder'=>'Ingrese nombre o razón social' ))}}
                                            </div>
                                        </div>
                                        <!--
                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-select">Estructura Legal</label>
                                            <div class="col-md-12">
                                                 {{ Form::select('t_documento', [
                                                 '1' => 'NJ Domestic For-Profit Corporation (DP)',
                                                 '2' => 'NJ Domestic Professional Corporation (PA)',
                                                 '3' => 'NJ Domestic Limited Liability Company (LLC)',
                                                 '4' => 'NJ Domestic Limited Partnership (LLP)',
                                                 '5' => 'NJ Domestic Non-Profit Corporation (NP)',
                                                 '6' => 'NJ Foreign For-Profit Corporation (FR)',
                                                 '7' => 'NJ Foreign Limited Liability Company (FLC)',
                                                 '8' => 'NJ Foreign Limited Partnership (LF)',
                                                 '9' => 'NJ Foreign Limited Liability Partnership (FLP)',
                                                 '10' => 'NJ Foreign Non-Profit Corportion (NF)',
                                                 '11' => 'NJ Domestic Non-Profit Veteran Corporation (NV)'], null, array('class' => 'form-control','placeholder'=>'-- Seleccione tipo identificación --')) }}
                                             </div>
                                        </div>
                                        -->

                                            <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-select">Tipo identificación</label>
                                            <div class="col-md-12">
                                                 {{ Form::select('t_identificacion', [
                                                 '2' => 'Seguro Social',
                                                 '3' => 'Número ITIN'], null, array('class' => 'form-control','placeholder'=>'-- Seleccione tipo identificación --')) }}
                                             </div>
                                        </div>

                                         <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-password-input">Número de identificación</label>
                                            <div class="col-md-12">
                                                {{Form::text('n_identificacion', '', array('class' => 'form-control','placeholder'=>'Ingrese número identificación' ))}}
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-password-input">Representante empresa</label>
                                            <div class="col-md-9">
                                                {{Form::text('representante', '', array('class' => 'form-control','placeholder'=>'Nombre Representante' ))}}
                                            </div>
                                        </div>


                                         <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-password-input">Teléfono (1)</label>
                                            <div class="col-md-12 date" id="datetimepicker7">
                                                   {{Form::text('tel_1', '', array('class' => 'form-control','placeholder'=>'Ingrese Telefono' ))}}
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-password-input">Teléfono (2)</label>
                                            <div class="col-md-12 date" id="datetimepicker7">
                                                   {{Form::text('tel_2', '', array('class' => 'form-control','placeholder'=>'Ingrese Telefono' ))}}
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-password-input">Teléfono (3)</label>
                                            <div class="col-md-12 date" id="datetimepicker7">
                                                   {{Form::text('tel_3', '', array('class' => 'form-control','placeholder'=>'Ingrese Telefono' ))}}
                                            </div>
                                        </div>

                                         <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-password-input">Correo electrónico</label>
                                            <div class="col-md-12">
                                                 {{Form::text('email', '', array('class' => 'form-control','placeholder'=>'Ingrese Correo electronico' ))}}
                                            </div>
                                        </div>

                                           <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-password-input">Correo electrónico (2)</label>
                                            <div class="col-md-12">
                                                 {{Form::text('email_dos', '', array('class' => 'form-control','placeholder'=>'Ingrese Correo electronico' ))}}
                                            </div>
                                        </div>

                                          


                                         <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-password-input">Ciudad</label>
                                            <div class="col-md-12">
                                                  {{Form::text('ciudad', '', array('class' => 'form-control','placeholder'=>'Ingrese dirección' ))}}
                                              </div>
                                            </div>
                                              <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-password-input">Dirección (1)</label>
                                            <div class="col-md-12">
                                                    {{Form::text('direccion_1', '', array('class' => 'form-control','placeholder'=>'Ingrese dirección' ))}}
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-password-input">Estado</label>
                                            <div class="col-md-12">
                                                  {{Form::text('estado', '', array('class' => 'form-control','placeholder'=>'Ingrese dirección' ))}}
                                              </div>
                                            </div>

                                            <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-password-input">Código Postal</label>
                                            <div class="col-md-12">
                                                  {{Form::text('c_postal', '', array('class' => 'form-control','placeholder'=>'Ingrese dirección' ))}}
                                              </div>
                                            </div>



                                          <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-password-input">Dirección (2)</label>
                                            <div class="col-md-12">
                                                    {{Form::text('direccion_2', '', array('class' => 'form-control','placeholder'=>'Ingrese dirección' ))}}
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-password-input">Ciudad (2)</label>
                                            <div class="col-md-12">
                                                  {{Form::text('ciudad_2', '', array('class' => 'form-control','placeholder'=>'Ingrese dirección' ))}}
                                              </div>
                                            </div>



                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-password-input">Estado (2)</label>
                                            <div class="col-md-12">
                                                  {{Form::text('estado_2', '', array('class' => 'form-control','placeholder'=>'Ingrese dirección' ))}}
                                              </div>
                                            </div>

                                            <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-password-input">Código Postal (2)</label>
                                            <div class="col-md-12">
                                                  {{Form::text('c_postal_2', '', array('class' => 'form-control','placeholder'=>'Ingrese dirección' ))}}
                                              </div>
                                            </div>

                                         <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-password-input">Fecha inicio</label>
                                            <div class="col-md-12 ">
                                                  {{Form::date('f_inicio','', array('class' => 'form-control','placeholder'=>'Ingrese fecha inicio'))}}
                                            </div>
                                        </div>


                                         <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-password-input">Situación Actual</label>
                                            <div class="col-md-12">
                                                 {{ Form::select('s_actual', [
                                                 '1' => 'Activo',
                                                 '2' => 'Inactivo',
                                                 '3' => 'Saldo Pendiente',], null, array('class' => 'form-control','placeholder'=>'-- Seleccione situación cliente --')) }}
                                            </div>
                                        </div>

                                        
                                        {{Form::hidden('tipo', '2', array('class' => 'form-control','placeholder'=>'Ingrese nombre o razón social' ))}}

                                          
                                        <div class="form-group form-actions">
                                            <div class="col-md-9 col-md-offset-3">
                                                <button type="submit" class="btn btn-sm btn-primary"><i class="fa fa-angle-right"></i> Submit</button>
                                                <button type="reset" class="btn btn-sm btn-warning"><i class="fa fa-repeat"></i> Reset</button>
                                            </div>
                                        </div>
                                    {{ Form::close() }}
                                
 </div>
                                    </div>
                                </div> <!-- end col --></div>


     {{ Html::script('modulo-facturacion/js/moment.min.js') }}
     {{ Html::script('modulo-facturacion/js/bootstrap-datetimepicker.min.js') }}
     


<script type="text/javascript">
$(document).ready(function() {
    $('#defaultForm').bootstrapValidator({
        message: 'This value is not valid',
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            terceros: {
                message: 'The username is not valid',
                validators: {
                    notEmpty: {
                        message: 'Este campo es obligatorio'
                    },
                    regexp: {
                        regexp: /^[a-zA-Z0-9_\.ñáéíóú]+$/,
                        message: 'The username can only consist of alphabetical, number, dot and underscore'
                    }
                }
            },
             regimen: {
                message: 'The username is not valid',
                validators: {
                    notEmpty: {
                        message: 'Este campo es obligatorio'
                    },
                    regexp: {
                        regexp: /^[ a-zA-Z0-9_\.ñáéíóú]+$/,
                        message: 'The username can only consist of alphabetical, number, dot and underscore'
                    }
                }
            },
            p_apellido: {
                message: 'The username is not valid',
                validators: {
                    notEmpty: {
                        message: 'Este campo es obligatorio'
                    },
                     stringLength: {
                        min: 2,
                        max: 30,
                        message: 'El campo identificador debe contener un minimo de 2 y un maximo de 30 Caracteres'
                    },
                    regexp: {
                        regexp: /^[ a-zA-Z0-9_\.ñáéíóú]+$/,
                        message: 'The username can only consist of alphabetical, number, dot and underscore'
                    }
                }
            },
           s_apellido: {
                message: 'The username is not valid',
                validators: {
                    notEmpty: {
                        message: 'Este campo es obligatorio'
                    },
                     stringLength: {
                        min: 2,
                        max: 30,
                        message: 'El campo identificador debe contener un minimo de 2 y un maximo de 30 Caracteres'
                    },
                    regexp: {
                        regexp: /^[ a-zA-Z0-9_\.ñáéíóú]+$/,
                        message: 'The username can only consist of alphabetical, number, dot and underscore'
                    }
                }
            },
            p_nombre: {
                message: 'The username is not valid',
                validators: {
                    notEmpty: {
                        message: 'Este campo es obligatorio'
                    },
                     stringLength: {
                        min: 2,
                        max: 100,
                        message: 'El campo razón social debe contener un minimo de 2 y un maximo de 100 Caracteres'
                    },
                    regexp: {
                        regexp: /^[ a-zA-Z0-9_\.ñáéíóú]+$/,
                        message: 'The username can only consist of alphabetical, number, dot and underscore'
                    }
                }
            },
            s_nombre: {
                message: 'The username is not valid',
                validators: {
                    notEmpty: {
                        message: 'Este campo es obligatorio'
                    },
                     stringLength: {
                        min: 2,
                        max: 30,
                        message: 'El campo identificador debe contener un minimo de 2 y un maximo de 30 Caracteres'
                    },
                    regexp: {
                        regexp: /^[ a-zA-Z0-9_\.ñáéíóú]+$/,
                        message: 'The username can only consist of alphabetical, number, dot and underscore'
                    }
                }
            },
            t_documento: {
                message: 'The username is not valid',
                validators: {
                    notEmpty: {
                        message: 'Este campo es obligatorio'
                    },
                    regexp: {
                        regexp: /^[ a-zA-Z0-9_\.ñáéíóú]+$/,
                        message: 'The username can only consist of alphabetical, number, dot and underscore'
                    }
                }
            },
            documento: {
                validators: {
                    notEmpty: {
                        message: 'Este campo es obligatorio'
                    },
                    stringLength: {
                        min: 2,
                        max: 20,
                        message: 'El campo NIT debe contener un minimo de 2 y un maximo de 20 Caracteres'
                    },
                    remote: {
                        type: 'GET',
                        url: '/gestor/validacionesado',
                        message: 'Este número cliente ya se encuentra registrado',
                        delay: 2000
                    }
                }
            },
            direccion: {
                message: 'The username is not valid',
                validators: {
                    notEmpty: {
                        message: 'Este campo es obligatorio'
                    },
                     stringLength: {
                        min: 2,
                        max: 50,
                        message: 'El campo dirección debe contener un minimo de 2 y un maximo de 50 Caracteres'
                    },
                    regexp: {
                        regexp: /^[-# a-zA-Z0-9_\.ñáéíóú]+$/,
                        message: 'The username can only consist of alphabetical, number, dot and underscore'
                    }
                }
            },
            ciudad: {
                message: 'The username is not valid',
                validators: {
                    notEmpty: {
                        message: 'Este campo es obligatorio'
                    },
                     stringLength: {
                        min: 2,
                        max: 30,
                        message: 'El campo ciudad debe contener un minimo de 2 y un maximo de 30 Caracteres'
                    },
                    regexp: {
                        regexp: /^[- a-zA-Z0-9_\.ñáéíóú]+$/,
                        message: 'The username can only consist of alphabetical, number, dot and underscore'
                    }
                }
            },
            telefono: {
                message: 'The username is not valid',
                validators: {
                    notEmpty: {
                        message: 'Este campo es obligatorio'
                    },
                     stringLength: {
                        min: 2,
                        max: 30,
                        message: 'El campo teléfono debe contener un minimo de 2 y un maximo de 30 Caracteres'
                    },
                    regexp: {
                        regexp: /^[ a-zA-Z0-9_\.ñáéíóú]+$/,
                        message: 'The username can only consist of alphabetical, number, dot and underscore'
                    }
                }
            },
            email: {
                validators: {
                   notEmpty: {
                        message: 'Este campo es obligatorio'
                    },
                    emailAddress: {
                        message: 'La dirección de correo no es valida'
                    }
                }
            },
            situacion: {
                message: 'The username is not valid',
                validators: {
                    notEmpty: {
                        message: 'Este campo es obligatorio'
                    },
                    regexp: {
                        regexp: /^[ a-zA-Z0-9_\.ñáéíóú]+$/,
                        message: 'The username can only consist of alphabetical, number, dot and underscore'
                    }
                }
            },

             start: {
                message: 'The username is not valid',
                validators: {
                    notEmpty: {
                        message: 'The date is required and cannot be empty'
                    }
                }
            },
         
            retefuente: {
                message: 'The username is not valid',
                validators: {
                    notEmpty: {
                        message: 'Este campo es obligatorio'
                    },
                      stringLength: {
                        min: 1,
                        max: 4,
                        message: 'El campo retefiuente debe contener un minimo de 1 y un maximo de 2 Caracteres'
                    },
                    regexp: {
                        regexp: /^[ a-zA-Z0-9_\.ñáéíóú]+$/,
                        message: 'The username can only consist of alphabetical, number, dot and underscore'
                    }
                }
            },
        }
    });
});
</script>


<script type="text/javascript">
$(document).ready(function() {
    $('#defaultForm1').bootstrapValidator({
        message: 'This value is not valid',
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            terceros: {
                message: 'The username is not valid',
                validators: {
                    notEmpty: {
                        message: 'Este campo es obligatorio'
                    },
                    regexp: {
                        regexp: /^[a-zA-Z0-9_\.ñáéíóú]+$/,
                        message: 'The username can only consist of alphabetical, number, dot and underscore'
                    }
                }
            },
             regimen: {
                message: 'The username is not valid',
                validators: {
                    notEmpty: {
                        message: 'Este campo es obligatorio'
                    },
                    regexp: {
                        regexp: /^[ a-zA-Z0-9_\.ñáéíóú]+$/,
                        message: 'The username can only consist of alphabetical, number, dot and underscore'
                    }
                }
            },
            p_apellido: {
                message: 'The username is not valid',
                validators: {
                    notEmpty: {
                        message: 'Este campo es obligatorio'
                    },
                     stringLength: {
                        min: 2,
                        max: 30,
                        message: 'El campo identificador debe contener un minimo de 2 y un maximo de 30 Caracteres'
                    },
                    regexp: {
                        regexp: /^[ a-zA-Z0-9_\.ñáéíóú]+$/,
                        message: 'The username can only consist of alphabetical, number, dot and underscore'
                    }
                }
            },
           s_apellido: {
                message: 'The username is not valid',
                validators: {
                    notEmpty: {
                        message: 'Este campo es obligatorio'
                    },
                     stringLength: {
                        min: 2,
                        max: 30,
                        message: 'El campo identificador debe contener un minimo de 2 y un maximo de 30 Caracteres'
                    },
                    regexp: {
                        regexp: /^[ a-zA-Z0-9_\.ñáéíóú]+$/,
                        message: 'The username can only consist of alphabetical, number, dot and underscore'
                    }
                }
            },
            p_nombre: {
                message: 'The username is not valid',
                validators: {
                    notEmpty: {
                        message: 'Este campo es obligatorio'
                    },
                     stringLength: {
                        min: 2,
                        max: 100,
                        message: 'El campo razón social debe contener un minimo de 2 y un maximo de 100 Caracteres'
                    },
                    regexp: {
                        regexp: /^[ a-zA-Z0-9_\.ñáéíóú]+$/,
                        message: 'The username can only consist of alphabetical, number, dot and underscore'
                    }
                }
            },
            s_nombre: {
                message: 'The username is not valid',
                validators: {
                    notEmpty: {
                        message: 'Este campo es obligatorio'
                    },
                     stringLength: {
                        min: 2,
                        max: 30,
                        message: 'El campo identificador debe contener un minimo de 2 y un maximo de 30 Caracteres'
                    },
                    regexp: {
                        regexp: /^[ a-zA-Z0-9_\.ñáéíóú]+$/,
                        message: 'The username can only consist of alphabetical, number, dot and underscore'
                    }
                }
            },
            t_documento: {
                message: 'The username is not valid',
                validators: {
                    notEmpty: {
                        message: 'Este campo es obligatorio'
                    },
                    regexp: {
                        regexp: /^[ a-zA-Z0-9_\.ñáéíóú]+$/,
                        message: 'The username can only consist of alphabetical, number, dot and underscore'
                    }
                }
            },
            documento: {
                validators: {
                    notEmpty: {
                        message: 'Este campo es obligatorio'
                    },
                    stringLength: {
                        min: 2,
                        max: 20,
                        message: 'El campo NIT debe contener un minimo de 2 y un maximo de 20 Caracteres'
                    },
                    remote: {
                        type: 'GET',
                        url: '/gestor/validacionesado',
                        message: 'Este número cliente ya se encuentra registrado',
                        delay: 2000
                    }
                }
            },
            direccion: {
                message: 'The username is not valid',
                validators: {
                    notEmpty: {
                        message: 'Este campo es obligatorio'
                    },
                     stringLength: {
                        min: 2,
                        max: 50,
                        message: 'El campo dirección debe contener un minimo de 2 y un maximo de 50 Caracteres'
                    },
                    regexp: {
                        regexp: /^[-# a-zA-Z0-9_\.ñáéíóú]+$/,
                        message: 'The username can only consist of alphabetical, number, dot and underscore'
                    }
                }
            },
            ciudad: {
                message: 'The username is not valid',
                validators: {
                    notEmpty: {
                        message: 'Este campo es obligatorio'
                    },
                     stringLength: {
                        min: 2,
                        max: 30,
                        message: 'El campo ciudad debe contener un minimo de 2 y un maximo de 30 Caracteres'
                    },
                    regexp: {
                        regexp: /^[- a-zA-Z0-9_\.ñáéíóú]+$/,
                        message: 'The username can only consist of alphabetical, number, dot and underscore'
                    }
                }
            },
            telefono: {
                message: 'The username is not valid',
                validators: {
                    notEmpty: {
                        message: 'Este campo es obligatorio'
                    },
                     stringLength: {
                        min: 2,
                        max: 30,
                        message: 'El campo teléfono debe contener un minimo de 2 y un maximo de 30 Caracteres'
                    },
                    regexp: {
                        regexp: /^[ a-zA-Z0-9_\.ñáéíóú]+$/,
                        message: 'The username can only consist of alphabetical, number, dot and underscore'
                    }
                }
            },
            email: {
                validators: {
                   notEmpty: {
                        message: 'Este campo es obligatorio'
                    },
                    emailAddress: {
                        message: 'La dirección de correo no es valida'
                    }
                }
            },
            situacion: {
                message: 'The username is not valid',
                validators: {
                    notEmpty: {
                        message: 'Este campo es obligatorio'
                    },
                    regexp: {
                        regexp: /^[ a-zA-Z0-9_\.ñáéíóú]+$/,
                        message: 'The username can only consist of alphabetical, number, dot and underscore'
                    }
                }
            },

             start: {
                message: 'The username is not valid',
                validators: {
                    notEmpty: {
                        message: 'The date is required and cannot be empty'
                    }
                }
            },
         
            retefuente: {
                message: 'The username is not valid',
                validators: {
                    notEmpty: {
                        message: 'Este campo es obligatorio'
                    },
                      stringLength: {
                        min: 1,
                        max: 4,
                        message: 'El campo retefiuente debe contener un minimo de 1 y un maximo de 2 Caracteres'
                    },
                    regexp: {
                        regexp: /^[ a-zA-Z0-9_\.ñáéíóú]+$/,
                        message: 'The username can only consist of alphabetical, number, dot and underscore'
                    }
                }
            },
        }
    });
});
</script>
<script type="text/javascript">
$(document).ready(function(){
    $('#datetimepicker8').datetimepicker({
      pickTime: true,
      format: 'MM/DD/YYYY'

    });
});
</script>
<script type="text/javascript">
$(document).ready(function(){
    $('#datetimepicker9').datetimepicker({
      pickTime: true,
      format: 'MM/DD/YYYY'

    });
});
</script>
@stop