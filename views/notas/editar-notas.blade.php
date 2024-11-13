@extends ('LayoutDafer.layout')

@section('ContenidoSite-01')

<div class="row">
 <div class="col-md-12 col-xl-10 offset-xl-2">

<div class="">
  <?php $status=Session::get('status'); ?>
  @if($status=='ok_create')
   <div class="alert alert-success">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    <strong>Regsitro Creado Con Exito</strong>
   </div>
  @endif

  @if($status=='ok_delete')
   <div class="alert alert-danger">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    <strong>Registro Eliminado Con Exito</strong>
   </div>
  @endif

  @if($status=='ok_update')
   <div class="alert alert-warning">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    <strong>Registro Actualizado Con Exito</strong>
   </div>
  @endif

 </div>

  <div class="content-header">
   <ul class="nav-horizontal text-center">
    <a class="btn btn-primary waves-effect waves-light" href="/dafer/notas"><i class="mdi mdi-bank"></i> Notas</a>
   </ul>
</div>
                                    <div class="card m-b-30">
                                        <div class="card-body">
            
                                            <h4 class="mt-0 header-title">Editar Nota</h4>
 <p class=" font-14" style="color:#fff">The Buttons extension for DataTables
                                                provides a common set of options, API methods and styling to display
                                                buttons on a page that will interact with a DataTable. The core library
                                                provides the based framework upon which plug-ins can built.
                                            </p>
    
    {{ Form::open(array('method' => 'POST','class' => 'form-horizontal','id' => 'defaultForm', 'url' => array('dafer/editarnotas',$notas->id))) }}

    <div class="form-group" style="display: none;">
     <label class="col-md-3 control-label" for="example-text-input">Nota</label>
      <div class="col-md-12">
       {{Form::textarea('notas', $notas->nota, array('class' => 'form-control summernote','placeholder'=>'Ingrese Nota', 'Required'=>'Required','Required'=>'Required'))}}

      </div>
    </div>    

    <div class="form-group" style="display: none;">
     <label class="col-md-3 control-label" for="example-text-input">Cliente Empresa o Cliente Individual</label>
      <div class="col-md-12">
       <select name="empresas" id="cars" class="form-control" required>
        @foreach($empresas as $empresasa)
        @if($empresasa->id == $notas->empresa_id)   
        @else   
        <option value="{{$notas->empresa_id}}" selected>{{$empresasa->n_negocio}}</option>
        @endif
        @endforeach

</select>
      </div>
    </div>


 <div class="form-group" style="display:none">
                                            <label class="col-md-3 control-label" for="example-password-input">Tipo Cliente</label>
                                            <div class="col-md-12">
                                                 {{ Form::select('procesos', [$notas->proceso_id => $notas->proceso_id,
                                                 '1' => 'Registro de Negocios',
                                                 '2' => 'Impuestos Corporativos',
                                                 '3' => 'Impuestos Personales',
                                                 '4' => 'Contabilidad',
                                                 '5' => 'Licencias',
                                                 '6' => 'Nómina',
                                                 '7' => 'Acuerdos de Pago',
                                                 '8' => 'Marketing',
                                                 '9' => 'Aplicación de Beneficios',
                                                 '10' => 'Auditoria',], null, array('class' => 'form-control','Required' => 'Required')) }}
                                            </div>
                                        </div>




 <div class="form-group">
  <label class="col-md-3 control-label" for="example-password-input">Estado de la Nota</label>
  <div class="col-md-12">
                                                 {{ Form::select('estado', [$notas->estado => $notas->estado,
                                                 '1' => 'En Proceso',
                                                 '2' => 'Finalizado'], null, array('class' => 'form-control','Required' => 'Required')) }}
                                            </div>
                                        </div>

 {{Form::hidden('user_id', $notas->user_id, array('class' => 'form-control','placeholder'=>'Ingrese Nota', 'Required'=>'Required','Required'=>'Required'))}}

    <div class="form-group form-actions">
     <div class="col-md-10 col-md-offset-3">
      <button type="submit" class="btn btn-sm btn-primary"><i class="fa fa-angle-right"></i> Editar Nota</button>
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



  @foreach($notas as $notas)
  @endforeach





                             
@stop