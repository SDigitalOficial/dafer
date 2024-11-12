@extends ('LayoutDafer.layout')
 @section('ContenidoSite-01')

<div class="page-content-wrapper">
 <div class="container-fluid">
  @foreach($notas as $notas)
   <div class="container d-flex justify-content-center">
    <div class="col-xl-12">
     <div class="card">
      <div class="card-body invoice"> 
       
       <div class="float-left">
        <h6><strong>ID NOTA:</strong> # <strong> {{$notas->id}}</strong></h6>
        <h6 class="mb-0 ">Fecha Creación:  {{$notas->created_at}}</h6><hr>
        <h6><strong>Responsable: </strong>
        @foreach($usuarios as $usuariosa)
         @if($notas->user_id == $usuariosa->id)
          <span class="badge badge-primary">{{$usuariosa->name}}</span>
         @else
        @endif
        @endforeach
        </h6>
        <h6><strong>Empresa: </strong>
        @foreach($empresas as $empresasa)
         @if($notas->empresa_id == $empresasa->id)
         <strong> {{$empresasa->n_negocio}}</strong>
          @else
          @endif
          @endforeach
        </h6>
       </div>
                                                                                       
       <div class="clearfix"> </div>
       <hr>
       <div class="row">
        <div class="col-md-12">
         <div class="table-responsive">
          <h3 class="text-primary">NOTA:</h3>
          {!!$notas->nota!!}
         </div>
        </div>
       </div><!--end row-->
        </div>
       </div>
                              </div>
                            </div><!--end row-->
                            @endforeach

                        </div><!-- container -->

                    </div> <!-- Page content Wrapper -->


  <div class="container-fluid">
  <div class="card">
                                        <div class="card-body">
            
                                            <h4 class="mt-0 header-title">Crear Comentario</h4>

    {{ Form::open(array('method' => 'POST','class' => 'form-horizontal','id' => 'defaultForm', 'url' => array('dafer/crearcomentario'))) }}

    <div class="form-group">
     <label class="col-md-3 control-label" for="example-text-input">Comentario</label>
      <div class="col-md-12">
       {{Form::textarea('comentario', '', array('class' => 'form-control','placeholder'=>'Ingrese Nota', 'Required'=>'Required'))}}

      </div>
    </div>    

    {{Form::hidden('nota_id', Request::segment(3), array('class' => 'form-control','placeholder'=>'Ingrese Nota', 'Required'=>'Required'))}}

    <div class="form-group form-actions">
     <div class="col-md-10 col-md-offset-3">
      <button type="submit" class="btn btn-sm btn-primary"><i class="fa fa-angle-right"></i> Crear Comentario</button>
      <button type="reset" class="btn btn-sm btn-warning"><i class="fa fa-repeat"></i> Cancelar</button>
     </div>
    </div>
    
    {{ Form::close() }}
                                
   </div>
                                    </div>
                                </div> <!-- end col -->

</div>

       <div class="container-fluid">


                                        <div class="col-lg-12 col-sm-12">
                                            <div class="card">
                                                <div class="card-body">
                                                    <h5 class="header-title pb-3">Actividad Notas</h5>
                                                    <div id="user-activities" class="tab-pane">
                                                        <div class="timeline-2">
                                                           @foreach($comentarios as $comentarios)
                                                            <div class="time-item">
                                                                <div class="item-info">
                                                                    <div class="text-muted">{{$comentarios->created_at}}</div>
                                                                    <p><a href="" class="text-primary">{{$comentarios->created_at}}</a> commentario realizado por .@foreach($usuarios as $usuariosa)
          @if($comentarios->user_id == $usuariosa->id)
          <span class="badge badge-primary">{{$usuariosa->name}}</span>
          @else
          @endif
          @endforeach</p>
                                                                <p><em>"{{$comentarios->comentario}} "</em></p>
                                                                </div>
                                                            </div>
                                                            @endforeach
                                                            

                                                          
                                                        
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                

@stop