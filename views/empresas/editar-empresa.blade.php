@extends ('LayoutDafer.layout')


    @section('cabecera')
    @parent
    <link rel="stylesheet" href="/validaciones/dist/css/bootstrapValidator.css"/>

    <script type="text/javascript" src="/validaciones/vendor/jquery/jquery.min.js"></script>
    <script type="text/javascript" src="/validaciones/vendor/bootstrap/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="/validaciones/dist/js/bootstrapValidator.js"></script>
   
   {{ Html::style('Calendario/css/bootstrap-datetimepicker.min.css') }}
    @stop

@section('ContenidoSite-01')



 
<div class="row">
                                <div class="col-md-12 col-xl-10 offset-xl-2">
                                    <div class="content-header">
 <ul class="nav-horizontal text-center">

   <a class="btn btn-primary waves-effect waves-light" href="/dafer/usuarios"><i class="gi gi-parents"></i> Usuarios</a>
 

   <a class="btn btn-primary waves-effect waves-light" href="/dafer/crear-usuario"><i class="fa fa-user-plus"></i> Crear Usuario</a>

 </ul>
</div>
                                    <div class="card m-b-30">
                                        <div class="card-body">
                                            @if($facturacion->tipo == 1)
                                            <h4 class="mt-0 header-title">Editar Empresa</h4>
                                            @else
                                            <h4 class="mt-0 header-title">Editar Negocio</h4>
                                            @endif


                                            <p class="text-muted font-14">Parsley is a javascript form validation
                                                library. It helps you provide your users with feedback on their form
                                                submission before sending it to your server.</p>
                                    
                                    
        

                            
                                    {{ Form::open(array('method' => 'POST','class' => 'form-horizontal','id' => 'defaultForm', 'url' => array('dafer/actualizar-cliente',$facturacion->id))) }}
                                    @if($facturacion->tipo == 1)
                                       <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-email-input">Nombre del Negocio</label>
                                            <div class="col-md-12">
                                                  {{Form::text('n_negocio', $facturacion->n_negocio, array('class' => 'form-control','placeholder'=>'Ingrese nombre o razón social' ))}}
                                            </div>
                                        </div>

                                          <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-select">Estructura Legal</label>
                                            <div class="col-md-12">
                                                 {{ Form::select('e_legal', [$facturacion->e_legal => '$facturacion->e_legal',
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
                                                 '11' => 'NJ Domestic Non-Profit Veteran Corporation (NV)'], null, array('class' => 'form-control')) }}
                                             </div>
                                        </div>

                                            <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-select">Tipo identificación</label>
                                            <div class="col-md-12">
                                                 {{ Form::select('t_identificacion', [$facturacion->t_identificacion => $facturacion->t_identificacion,
                                                 '1' => 'EIN'], null, array('class' => 'form-control')) }}
                                             </div>
                                        </div>

                                         <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-password-input">Número de identificación</label>
                                            <div class="col-md-12">
                                                {{Form::text('n_identificacion', $facturacion->n_identificacion, array('class' => 'form-control','placeholder'=>'Ingrese número identificación' ))}}
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-password-input">Representante empresa</label>
                                            <div class="col-md-9">
                                                {{Form::text('representante', $facturacion->representante, array('class' => 'form-control','placeholder'=>'Nombre Representante' ))}}
                                            </div>
                                        </div>


                                         <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-password-input">Teléfono (1)</label>
                                            <div class="col-md-12 date" id="datetimepicker7">
                                                   {{Form::text('tel_1', $facturacion->tel_1, array('class' => 'form-control','placeholder'=>'Ingrese Telefono' ))}}
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-password-input">Teléfono (2)</label>
                                            <div class="col-md-12 date" id="datetimepicker7">
                                                   {{Form::text('tel_2', $facturacion->tel_2, array('class' => 'form-control','placeholder'=>'Ingrese Telefono' ))}}
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-password-input">Teléfono (3)</label>
                                            <div class="col-md-12 date" id="datetimepicker7">
                                                   {{Form::text('tel_3', $facturacion->tel_3, array('class' => 'form-control','placeholder'=>'Ingrese Telefono' ))}}
                                            </div>
                                        </div>


                                         <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-password-input">Correo electrónico (1)</label>
                                            <div class="col-md-12">
                                                 {{Form::text('email', $facturacion->email, array('class' => 'form-control','placeholder'=>'Ingrese Correo electronico' ))}}
                                            </div>
                                        </div>

                                         <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-password-input">Correo electrónico (2)</label>
                                            <div class="col-md-12">
                                                 {{Form::text('email_dos', $facturacion->email_dos, array('class' => 'form-control','placeholder'=>'Ingrese Correo electronico' ))}}
                                            </div>
                                        </div>


                                              <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-password-input">Dirección</label>
                                            <div class="col-md-12">
                                                    {{Form::text('direccion_1', $facturacion->direccion_1, array('class' => 'form-control','placeholder'=>'Ingrese dirección' ))}}
                                            </div>
                                        </div>


                                         <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-password-input">Ciudad</label>
                                            <div class="col-md-12">
                                                  {{Form::text('ciudad', $facturacion->ciudad, array('class' => 'form-control','placeholder'=>'Ingrese dirección' ))}}
                                              </div>
                                            </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-password-input">Estado</label>
                                            <div class="col-md-12">
                                                  {{Form::text('estado', $facturacion->estado, array('class' => 'form-control','placeholder'=>'Ingrese dirección' ))}}
                                              </div>
                                            </div>

                                            <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-password-input">Código Postal</label>
                                            <div class="col-md-12">
                                                  {{Form::text('c_postal', $facturacion->c_postal, array('class' => 'form-control','placeholder'=>'Ingrese dirección' ))}}
                                              </div>
                                            </div>
                                        
                                          <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-password-input">Dirección (2)</label>
                                            <div class="col-md-12">
                                                    {{Form::text('direccion_2', $facturacion->direccion_2, array('class' => 'form-control','placeholder'=>'Ingrese dirección' ))}}
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-password-input">Ciudad (2)</label>
                                            <div class="col-md-12">
                                                  {{Form::text('ciudad_2', $facturacion->ciudad_2, array('class' => 'form-control','placeholder'=>'Ingrese dirección' ))}}
                                              </div>
                                            </div>



                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-password-input">Estado (2)</label>
                                            <div class="col-md-12">
                                                  {{Form::text('estado_2', $facturacion->estado_2, array('class' => 'form-control','placeholder'=>'Ingrese dirección' ))}}
                                              </div>
                                            </div>

                                            <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-password-input">Código Postal (2)</label>
                                            <div class="col-md-12">
                                                  {{Form::text('c_postal_2', $facturacion->c_postal_2, array('class' => 'form-control','placeholder'=>'Ingrese dirección' ))}}
                                              </div>
                                            </div>


                                         <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-password-input">Fecha inicio</label>
                                            <div class="col-md-12 ">
                                                  {{Form::date('f_inicio',$facturacion->f_inicio, array('class' => 'form-control','placeholder'=>'Ingrese fecha inicio'))}}
                                            </div>
                                        </div>


                                         <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-password-input">Situación Actual</label>
                                            <div class="col-md-12">
                                                 {{ Form::select('s_actual', [$facturacion->s_actual => $facturacion->s_actual,
                                                 '1' => 'Activo',
                                                 '2' => 'Inactivo',
                                                 '3' => 'Saldo Pendiente',], null, array('class' => 'form-control')) }}
                                            </div>
                                        </div>

                                        {{Form::hidden('tipo', $facturacion->tipo, array('class' => 'form-control','placeholder'=>'Ingrese nombre o razón social' ))}}
    

                                          
                                        <div class="form-group form-actions">
                                            <div class="col-md-9 col-md-offset-3">
                                                <button type="submit" class="btn btn-sm btn-primary"><i class="fa fa-angle-right"></i> Submit</button>
                                                <button type="reset" class="btn btn-sm btn-warning"><i class="fa fa-repeat"></i> Reset</button>
                                            </div>
                                        </div>
                                        @else
                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-email-input">Nombre del Negocio</label>
                                            <div class="col-md-12">
                                                  {{Form::text('n_negocio', $facturacion->n_negocio, array('class' => 'form-control','placeholder'=>'Ingrese nombre o razón social' ))}}
                                            </div>
                                        </div>

                                       

                                            <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-select">Tipo identificación</label>
                                            <div class="col-md-12">
                                                 {{ Form::select('t_identificacion', [$facturacion->t_identificacion => $facturacion->t_identificacion,
                                                 '2' => 'Seguro Social',
                                                 '3' => 'Número ITIN'], null, array('class' => 'form-control')) }}
                                             </div>
                                        </div>

                                         <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-password-input">Número de identificación</label>
                                            <div class="col-md-12">
                                                {{Form::text('n_identificacion', $facturacion->n_identificacion, array('class' => 'form-control','placeholder'=>'Ingrese número identificación' ))}}
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-password-input">Representante empresa</label>
                                            <div class="col-md-9">
                                                {{Form::text('representante', $facturacion->representante, array('class' => 'form-control','placeholder'=>'Nombre Representante' ))}}
                                            </div>
                                        </div>


                                         <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-password-input">Teléfono (1)</label>
                                            <div class="col-md-12 date" id="datetimepicker7">
                                                   {{Form::text('tel_1', $facturacion->tel_1, array('class' => 'form-control','placeholder'=>'Ingrese Telefono' ))}}
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-password-input">Teléfono (2)</label>
                                            <div class="col-md-12 date" id="datetimepicker7">
                                                   {{Form::text('tel_2', $facturacion->tel_2, array('class' => 'form-control','placeholder'=>'Ingrese Telefono' ))}}
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-password-input">Teléfono (3)</label>
                                            <div class="col-md-12 date" id="datetimepicker7">
                                                   {{Form::text('tel_3', $facturacion->tel_3, array('class' => 'form-control','placeholder'=>'Ingrese Telefono' ))}}
                                            </div>
                                        </div>


                                         <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-password-input">Correo electrónico</label>
                                            <div class="col-md-12">
                                                 {{Form::text('email', $facturacion->email, array('class' => 'form-control','placeholder'=>'Ingrese Correo electronico' ))}}
                                            </div>
                                        </div>

                                          <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-password-input">Dirección (1)</label>
                                            <div class="col-md-12">
                                                    {{Form::text('direccion_1', $facturacion->direccion_1, array('class' => 'form-control','placeholder'=>'Ingrese dirección' ))}}
                                            </div>
                                        </div>

                                         <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-password-input">Ciudad</label>
                                            <div class="col-md-12">
                                                  {{Form::text('ciudad', $facturacion->ciudad, array('class' => 'form-control','placeholder'=>'Ingrese dirección' ))}}
                                              </div>
                                            </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-password-input">Estado</label>
                                            <div class="col-md-12">
                                                  {{Form::text('estado', $facturacion->estado, array('class' => 'form-control','placeholder'=>'Ingrese dirección' ))}}
                                              </div>
                                            </div>

                                            <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-password-input">Código Postal</label>
                                            <div class="col-md-12">
                                                  {{Form::text('c_postal', $facturacion->c_postal, array('class' => 'form-control','placeholder'=>'Ingrese dirección' ))}}
                                              </div>
                                            </div>

                                         <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-password-input">Dirección (2)</label>
                                            <div class="col-md-12">
                                                    {{Form::text('direccion_2', $facturacion->direccion_2, array('class' => 'form-control','placeholder'=>'Ingrese dirección' ))}}
                                            </div>
                                        </div>

                                         <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-password-input">Ciudad (2)</label>
                                            <div class="col-md-12">
                                                  {{Form::text('ciudad_2', $facturacion->ciudad_2, array('class' => 'form-control','placeholder'=>'Ingrese dirección' ))}}
                                              </div>
                                            </div>



                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-password-input">Estado (2)</label>
                                            <div class="col-md-12">
                                                  {{Form::text('estado_2', $facturacion->estado_2, array('class' => 'form-control','placeholder'=>'Ingrese dirección' ))}}
                                              </div>
                                            </div>

                                            <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-password-input">Código Postal (2)</label>
                                            <div class="col-md-12">
                                                  {{Form::text('c_postal_2', $facturacion->c_postal_2, array('class' => 'form-control','placeholder'=>'Ingrese dirección' ))}}
                                              </div>
                                            </div>


                                         <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-password-input">Fecha inicio</label>
                                            <div class="col-md-12 ">
                                                  {{Form::date('f_inicio',$facturacion->f_inicio, array('class' => 'form-control','placeholder'=>'Ingrese fecha inicio'))}}
                                            </div>
                                        </div>


                                         <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-password-input">Situación Actual</label>
                                            <div class="col-md-12">
                                                 {{ Form::select('s_actual', [$facturacion->s_actual => $facturacion->s_actual,
                                                 '1' => 'Activo',
                                                 '2' => 'Inactivo',
                                                 '3' => 'Saldo Pendiente',], null, array('class' => 'form-control')) }}
                                            </div>
                                        </div>

                                        {{Form::hidden('tipo', $facturacion->tipo, array('class' => 'form-control','placeholder'=>'Ingrese nombre o razón social' ))}}
    

                                          
                                        <div class="form-group form-actions">
                                            <div class="col-md-9 col-md-offset-3">
                                                <button type="submit" class="btn btn-sm btn-primary"><i class="fa fa-angle-right"></i> Submit</button>
                                                <button type="reset" class="btn btn-sm btn-warning"><i class="fa fa-repeat"></i> Reset</button>
                                            </div>
                                        </div>
                                        @endif
                                    {{ Form::close() }}
 </div>
                                    </div>
                                </div> <!-- end col -->




 {{ Html::script('Calendario/js/moment.min.js') }}
     {{ Html::script('Calendario/js/bootstrap-datetimepicker.min.js') }}


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
                message: 'The username is not valid',
                validators: {
                    notEmpty: {
                        message: 'Este campo es obligatorio'
                    },
                    regexp: {
                        regexp: /^[- a-zA-Z0-9_\.ñáéíóú]+$/,
                        message: 'The username can only consist of alphabetical, number, dot and underscore'
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
                        regexp: /^[- a-zA-Z0-9_#\.ñáéíóú]+$/,
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
                        regexp: /^[-. a-zA-Z0-9_\.ñáéíóú]+$/,
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
                        regexp: /^[+() a-zA-Z0-9_\.ñáéíóú]+$/,
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
    $('#datetimepicker7').datetimepicker({
      pickTime: true,
      format: 'MM/DD/YYYY HH:mm'

    });
});
</script>

   
@stop