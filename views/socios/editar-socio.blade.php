@extends ('LayoutDafer.layout')

@section('ContenidoSite-01')
@if(Auth::user()->rol_id == 31)

<div class="container text-center">
   <h1>No tienes permisos para editar Socios, contactate con el Administrador</h1> 
</div>
@else

@endif
<div class="row">
                                <div class="col-md-12 col-xl-10 offset-xl-2">
                                    <div class="content-header">
 <ul class="nav-horizontal text-center">

   <a class="btn btn-primary waves-effect waves-light" href="/dafer/bancos"><i class="mdi mdi-bank"></i> Editar Socio</a>
 

 </ul>
</div>
                                    <div class="card m-b-30">
                                        <div class="card-body">
            
                                            <h4 class="mt-0 header-title">Editar Socio</h4>

                                           <p class=" font-14" style="color:#fff">The Buttons extension for DataTables
                                                provides a common set of options, API methods and styling to display
                                                buttons on a page that will interact with a DataTable. The core library
                                                provides the based framework upon which plug-ins can built.
                                            </p>
 
   {{ Form::open(array('method' => 'POST','class' => 'form-horizontal','id' => 'defaultForm', 'url' => array('dafer/editarsocios',$socio->id))) }}


    <div class="form-group">
     <label class="col-md-3 control-label" for="example-text-input">Nombres</label>
      <div class="col-md-12">
       {{Form::text('nombres', $socio->nombres, array('class' => 'form-control','placeholder'=>'Ingrese Nombres de Socio', 'Required'=>'Required'))}}
      </div>
    </div>

     <div class="form-group">
     <label class="col-md-3 control-label" for="example-text-input">Apellidos</label>
      <div class="col-md-12">
       {{Form::text('apellidos', $socio->apellidos, array('class' => 'form-control','placeholder'=>'Ingrese Apellidos del Socio', 'Required'=>'Required'))}}
      </div>
    </div>

     <div class="form-group">
     <label class="col-md-3 control-label" for="example-text-input">ITIN - Seguro Social </label>
      <div class="col-md-12">
       {{Form::text('identificacion', $socio->identificacion, array('class' => 'form-control','placeholder'=>'Ingrese ITIN o Seguro Social', 'Required'=>'Required'))}}
      </div>
    </div>

     <div class="form-group">
     <label class="col-md-3 control-label" for="example-text-input">Teléfono </label>
      <div class="col-md-12">
       {{Form::text('telefono', $socio->telefono, array('class' => 'form-control','placeholder'=>'Ingrese Número de Celular', 'Required'=>'Required'))}}
      </div>
    </div>

      <div class="form-group">
     <label class="col-md-3 control-label" for="example-text-input">Dirección de Residencia </label>
      <div class="col-md-12">
       {{Form::text('direccion', $socio->direccion, array('class' => 'form-control','placeholder'=>'Ingrese Dirección de Residencia', 'Required'=>'Required'))}}
      </div>
    </div>

     <div class="form-group">
     <label class="col-md-3 control-label" for="example-text-input">Cargo</label>
      <div class="col-md-12">
       {{Form::text('cargo', $socio->cargo, array('class' => 'form-control','placeholder'=>'Ingrese Cargo del Socio', 'Required'=>'Required'))}}
      </div>
    </div>

     <div class="form-group">
     <label class="col-md-3 control-label" for="example-text-input">Porcentaje Participación</label>
      <div class="col-md-12">
       {{Form::number('porcentaje', $socio->porcentaje, array('class' => 'form-control','placeholder'=>'Ingrese Porcentaje de participación', 'Required'=>'Required'))}}
      </div>
    </div>


    <div class="form-group">
     <label class="col-md-3 control-label" for="example-text-input">Porcentaje Participación</label>
      <div class="col-md-12">
       <select name="empresas" id="cars" class="form-control" required>

@foreach($empresas as $empresas)
@if($socio->empresa_id == $empresas->id)
 <option value="{{$socio->id}}" selected>{{$empresas->n_negocio}}</option>
@endif
  <option value="{{$empresas->id}}">{{$empresas->n_negocio}}</option>
@endforeach
</select>
      </div>
    </div>



    <div class="form-group form-actions">
     <div class="col-md-9 col-md-offset-3">
      <button type="submit" class="btn btn-sm btn-primary"><i class="fa fa-angle-right"></i> Crear Socio</button>
      <button type="reset" class="btn btn-sm btn-warning"><i class="fa fa-repeat"></i> Cancelar</button>
     </div>
    </div>
    
    {{ Form::close() }}
                                
   </div>
                                    </div>
                                </div> <!-- end col -->

<footer>
 <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
 {{ Html::script('modulo-usuarios/validaciones/crear-usuario.js') }}
 {{ Html::script('//cdnjs.cloudflare.com/ajax/libs/jquery.bootstrapvalidator/0.5.0/js/bootstrapValidator.min.js') }} 
</footer>




 @foreach($socio as $socio)
  @endforeach
               



                             
@stop
