@extends ('LayoutDafer.layout')

 

  @section('ContenidoSite-01')


 <div class="container">
  <?php $status=Session::get('status'); ?>
  @if($status=='ok_create')
   <div class="alert alert-success">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    <strong>Cliente registrado con éxito</strong>
   </div>
  @endif

  @if($status=='ok_delete')
   <div class="alert alert-danger">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    <strong>Ciente eliminado con éxito</strong>
   </div>
  @endif

  @if($status=='ok_update')
   <div class="alert alert-warning">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    <strong>Cliente actualizado con éxito</strong>
   </div>
  @endif

 </div>





                            <div class="row">
                                <div class="col-md-10 offset-md-1">

                                                                 <div class="content-header">
 <ul class="nav-horizontal text-center">

   <a class="btn btn-primary waves-effect waves-light" href="/dafer/empresas"><i class="gi gi-parents"></i> Empresas</a>
 

   <a class="btn btn-primary waves-effect waves-light" href="/dafer/crear-infobancaria/{{Request::segment(3)}}"><i class="fa fa-user-plus"></i> Crear Información Bancaria</a>


   <a class="btn btn-primary waves-effect waves-light" href="/dafer/informacion-tarjetas/{{Request::segment(3)}}"><i class="fa fa-user-plus"></i> Crear Información Tarjetas</a>

 </ul>
</div>
                                    <div class="card">
                                        <div class="card-body">
            
                                            <h4 class="mt-0 header-title"><b>Clientes Registrados</b></h4>
                                            <p class="text-muted  font-14">The Buttons extension for DataTables
                                                provides a common set of options, API methods and styling to display
                                                buttons on a page that will interact with a DataTable. The core library
                                                provides the based framework upon which plug-ins can built.
                                            </p>
            
                                            <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">

                                                <thead>

                                                <tr>
                                                    <th><b>Banco</b></th>
                                                    <th><b>Usuario</b></th>
                                                    <th><b>Contaseña</b></th>
                                                    <th><b>Información</b></th>
                                                    <th><b>Creación</b></th>
                                                    <th><b>ACCIONES</b></th>
                                                </tr>
                                                </thead>
            
            
                                                <tbody>
           @foreach($datos as $datos)                                      
         <tr>
          <td class="text-center">{{ $datos->banco}}</td>
          <td class="text-center">{{ $datos->usuario}}</td>
          <td>{{ $datos->password}}</td>
          <td>{{ $datos->informacion}}</td>
          <td>{{ $datos->created_at}}</td>
          <td class="text-center">
           <div class="btn-group">
       
       <a href="<?=URL::to('dafer/editar-infobancaria');?>/{{$datos->id}}"><span  id="tip" data-toggle="tooltip" data-placement="top" title="Información Bancaria" class="btn btn-primary"><i class="fas fa-user-edit"></i></span></a>
           <a href="<?=URL::to('dafer/eliminar-infobancaria');?>/{{$datos->id}}" onclick="return confirm('¿Está seguro que desea eliminar el registro?')"><button class="btn btn-danger" data-toggle="tooltip" data-placement="right" title="Eliminar Usuario"><i class="fas fa-trash-alt"></i></button></a>
           </div>
          </td>
         </tr>
         @endforeach
     
                                                </tbody>
                                            </table>
            
                                        </div>
                                    </div>
                                </div> <!-- end col -->
                                </div>
  

<div class="row">
<div class="col-md-10 offset-md-1">

<div class="card">
                                        <div class="card-body">
            
                                            <h4 class="mt-0 header-title"><b>Información Tarjetas</b></h4>
                                            <p class="text-muted  font-14">The Buttons extension for DataTables
                                                provides a common set of options, API methods and styling to display
                                                buttons on a page that will interact with a DataTable. The core library
                                                provides the based framework upon which plug-ins can built.
                                            </p>
            
                                            <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap" width="100%" style="border-collapse: collapse; border-spacing: 0; width: 100%;">

                                                <thead>

                                                <tr>
                                                    <th><b>Tipo</b></th>
                                                    <th><b>Tarjeta</b></th>
                                                    <th><b>verificación</b></th>
                                                    <th><b>Fecha</b></th>
                                                    <th><b>Observaciones</b></th>
                                                    <th><b>Actualziado</b></th>
                                                    <th><b>ACCIONES</b></th>
                                                </tr>
                                                </thead>
            
            
                                                <tbody>
           @foreach($tarjetas as $tarjetas)                                      
         <tr>
          <td class="text-center">{{ $tarjetas->tipo}}</td>
          <td class="text-center">{{ $tarjetas->tarjeta}}</td>
          <td class="text-center">{{ $tarjetas->verificacion}}</td>
          <td class="text-center">{{ $tarjetas->fecha}}</td>
          <td class="text-center">{{ $tarjetas->observaciones}}</td>
          <td>{{$tarjetas->updated_at}}</td>
          
          <td class="text-center">
           <div class="btn-group">
           
       <a href="<?=URL::to('dafer/editar-banco');?>/{{$tarjetas->id}}" style="padding: 1px;"><span  id="tip" data-toggle="tooltip" data-placement="top" title="Editar Usuario" class="btn btn-primary"><i class="mdi mdi-tooltip-edit"></i></span></a>
       
           <a href="<?=URL::to('dafer/eliminar-tarjeta/');?>/{{$tarjetas->id}}" style="padding: 1px;" onclick="return confirm('¿Está seguro que desea eliminar el registro?')"><button class="btn btn-danger" data-toggle="tooltip" data-placement="right" title="Eliminar Usuario"><i class="fas fa-trash-alt"></i></button></a>
           </div>

          </td>
         </tr>
         @endforeach
     
                                                </tbody>
                                            </table>
            
                                        </div>
                                    </div></div></div>

  @stop
