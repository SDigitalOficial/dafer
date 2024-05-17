<?php

namespace DigitalsiteSaaS\Dafer\Http;
use DigitalsiteSaaS\Usuario\Usuario;
use Illuminate\Support\Facades\Auth;
use DB;
use File;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use Input;
use Illuminate\Support\Str;
use GuzzleHttp\Client;
use Hyn\Tenancy\Models\Hostname;
use Hyn\Tenancy\Models\Website;
use Hyn\Tenancy\Repositories\HostnameRepository;
use Hyn\Tenancy\Repositories\WebsiteRepository;
use DigitalsiteSaaS\Facturacion\Empresa;
use Request;


class UsuarioController extends Controller{

protected $tenantName = null;

public function __construct(){
 $this->middleware('auth');
  $hostname = app(\Hyn\Tenancy\Environment::class)->hostname();
  if ($hostname){
  $fqdn = $hostname->fqdn;
  $this->tenantName = explode(".", $fqdn)[0];
 }
}

public function index() {
 if(!$this->tenantName){
 $users = Usuario::all();
 }else{
 $users = \DigitalsiteSaaS\Usuario\Tenant\Usuario::all();
 }
 $website = app(\Hyn\Tenancy\Environment::class)->website();
 return view('dafer::usuarios.usuarios')->with('users',$users)->with('website',$website);
}


public function crearusuario() {
 return View('dafer::usuarios.crear-usuario');
}


public function crear(){
 if(!$this->tenantName){
 $price = Usuario::max('id');
 }else{
 $price = \DigitalsiteSaaS\Usuario\Tenant\Usuario::max('id');
 }
 $suma = $price + 1;
 $path = public_path() . '/fichaimg/clientes/'.$suma;
 File::makeDirectory($path, 0777, true, true);
 $password = Input::get('password');
 $remember = Input::get('_token');
 if(!$this->tenantName){
 $user = new Usuario;
 }else{
 $user = new \DigitalsiteSaaS\Usuario\Tenant\Usuario;	
 }
 $user->name = Input::get('name');
 $user->last_name = Input::get('last_name');
 $user->email = Input::get('email');
 $user->address = Input::get('address');
 $user->phone = Input::get('phone');;
 $user->rol_id = Input::get('level');
 $user->remember_token = Input::get('_token');
 $user->password = Hash::make($password);
 $user->remember_token = Hash::make($remember);
 $user->save();
 return Redirect('dafer/usuarios')->with('status', 'ok_create');
}  

public function eliminar($id) {
 if(!$this->tenantName){
 $user = Usuario::find($id);
 }else{
 $user = \DigitalsiteSaaS\Usuario\Tenant\Usuario::find($id);
 }
 $user->delete();
 return Redirect('dafer/usuarios')->with('status', 'ok_delete');
}

public function eliminarinfobancaria($id) {

 if(!$this->tenantName){
 $user = Informacion::find($id);
 }else{
 $user = \DigitalsiteSaaS\Dafer\Tenant\Informacion::find($id);
 $regreso = \DigitalsiteSaaS\Dafer\Tenant\Informacion::where('id', '=', $id)->get();

 }
 $user->delete();
 foreach ($regreso as $regreso) {
   $identi = $regreso->empresa_id;
 }

 return Redirect('dafer/informacion-bancaria/'.$identi)->with('status', 'ok_delete');
}



public function editar($id){
 if(!$this->tenantName){
 $usuario = Usuario::find($id);
 }else{
 $usuario = \DigitalsiteSaaS\Usuario\Tenant\Usuario::find($id);
 }
 return view('dafer::usuarios.editar')->with('usuario', $usuario);
}

public function actualizar($id){
 $input = Input::all();
 if(!$this->tenantName){
 $user = Usuario::find($id);
 }else{
 $usuario = \DigitalsiteSaaS\Usuario\Tenant\Usuario::find($id);	
 }
 $user->name = Input::get('name');
 $user->last_name = Input::get('last_name');
 $user->email = Input::get('email');
 $user->address = Input::get('address');
 $user->phone = Input::get('phone');
 $user->rol_id = Input::get('level');
 $user->save();
 return Redirect('dafer/usuarios')->with('status', 'ok_update');
}



public function empresas(){
if(!$this->tenantName){
$facturacion = Empresa::all();
}
else{
$facturacion = \DigitalsiteSaaS\Dafer\Tenant\Empresa::all();
}
return view('dafer::empresas.empresas')->with('facturacion', $facturacion);
     
}


public function crearempresa() {
 return View('dafer::empresas.crear-empresa');
}

public function editarproducto($id){
if(!$this->tenantName){
 $producto = Producto::find($id);
 }else{
 $producto = \DigitalsiteSaaS\Dafer\Tenant\Producto::find($id); 
 }
 return view('dafer::productos.editar-producto')->with('producto', $producto);
}

public function editarproductoc($id){
if(!$this->tenantName){
 $producto = Producto::all();
 }else{
 $producto = \DigitalsiteSaaS\Dafer\Tenant\Producto::all(); 
 $datos = \DigitalsiteSaaS\Dafer\Tenant\Producto::join('dafer_infoproductos','dafer_productos.id', '=', 'dafer_infoproductos.producto_id')
         ->where('dafer_infoproductos.id', '=', $id)->get();
 }

 return view('dafer::productos.editar-productoc')->with('producto', $producto)->with('datos', $datos);
}

public function create() {
 if(!$this->tenantName){
 $facturacion = new Empresa;
 }
 else{
 $facturacion = new \DigitalsiteSaaS\Dafer\Tenant\Empresa;  
 }
 $facturacion->tipo = Input::get('tipo');
 $facturacion->n_negocio = Input::get('n_negocio');
 $facturacion->e_legal = Input::get('e_legal');
 $facturacion->t_identificacion = Input::get('t_identificacion');
 $facturacion->n_identificacion = Input::get('n_identificacion');
 $facturacion->representante = Input:: get ('representante');
 $facturacion->tel_1 = Input:: get ('tel_1');
 $facturacion->tel_2 = Input:: get ('tel_2');
 $facturacion->tel_3 = Input:: get ('tel_3');
 $facturacion->email = Input:: get ('email');
 $facturacion->email_dos = Input:: get ('email_dos');
 $facturacion->direccion_1 = Input:: get ('direccion_1');
 $facturacion->direccion_2 = Input:: get ('direccion_2');
 $facturacion->ciudad = Input:: get ('ciudad');
 $facturacion->estado = Input:: get ('estado');
 $facturacion->c_postal = Input:: get ('c_postal');
 $facturacion->ciudad_2 = Input:: get ('ciudad_2');
 $facturacion->estado_2 = Input:: get ('estado_2');
 $facturacion->c_postal_2 = Input:: get ('c_postal_2');
 $facturacion->f_inicio = Input:: get ('f_inicio');
 $facturacion->s_actual = Input:: get ('s_actual');
 $facturacion->save();

  return Redirect('/dafer/empresas')->with('status', 'ok_create');
}

public function actualizarempresa($id){
 $input = Input::all();
 if(!$this->tenantName){
 $facturacion = Empresa::find($id);
 }else{
 $facturacion = \DigitalsiteSaaS\Dafer\Tenant\Empresa::find($id);
 }
 $facturacion->tipo = Input::get('tipo');
 $facturacion->n_negocio = Input::get('n_negocio');
 $facturacion->e_legal = Input::get('e_legal');
 $facturacion->t_identificacion = Input::get('t_identificacion');
 $facturacion->n_identificacion = Input::get('n_identificacion');
 $facturacion->representante = Input:: get ('representante');
 $facturacion->tel_1 = Input:: get ('tel_1');
 $facturacion->tel_2 = Input:: get ('tel_2');
 $facturacion->tel_3 = Input:: get ('tel_3');
 $facturacion->email = Input:: get ('email');
 $facturacion->email_dos = Input:: get ('email_dos');
 $facturacion->direccion_1 = Input:: get ('direccion_1');
 $facturacion->direccion_2 = Input:: get ('direccion_2');
 $facturacion->ciudad = Input:: get ('ciudad');
 $facturacion->estado = Input:: get ('estado');
 $facturacion->c_postal = Input:: get ('c_postal');
 $facturacion->ciudad_2 = Input:: get ('ciudad_2');
 $facturacion->estado_2 = Input:: get ('estado_2');
 $facturacion->c_postal_2 = Input:: get ('c_postal_2');
 $facturacion->f_inicio = Input:: get ('f_inicio');
 $facturacion->s_actual = Input:: get ('s_actual');
 $facturacion->save();

 return Redirect('/dafer/empresas')->with('status', 'ok_create');
}

 public function eliminarempresa($id){
 if(!$this->tenantName){
  $facturacion = Empresa::find($id);
 }else{
  $facturacion = \DigitalsiteSaaS\Dafer\Tenant\Empresa::find($id);    
 } 
  $facturacion->delete();
  
  return Redirect('dafer/empresas')->with('status', 'ok_delete');
        }

public function eliminarproducto($id){
 if(!$this->tenantName){
  $facturacion = Producto::find($id);
 }else{
  $facturacion = \DigitalsiteSaaS\Dafer\Tenant\Producto::find($id);    
 } 
  $facturacion->delete();
  return Redirect('dafer/productos')->with('status', 'ok_delete');
        }

  public function eliminarproductoc($id){
 if(!$this->tenantName){
  $facturacion = Infoproducto::find($id);
 }else{
  $facturacion = \DigitalsiteSaaS\Dafer\Tenant\Infoproducto::find($id);   
   $regreso = \DigitalsiteSaaS\Dafer\Tenant\Infoproducto::where('id', '=', $id)->get(); 

 } 
  $facturacion->delete();

 foreach ($regreso as $regreso) {
   $identi = $regreso->empresa_id;
 }
  return Redirect('dafer/informacion-producto/'.$identi)->with('status', 'ok_delete');
        }


  public function eliminarcuenta($id){
 if(!$this->tenantName){
  $facturacion = Cuentas::find($id);
 }else{
  $facturacion = \DigitalsiteSaaS\Dafer\Tenant\Cuentas::find($id);   
   $regreso = \DigitalsiteSaaS\Dafer\Tenant\Cuentas::where('id', '=', $id)->get(); 

 } 
  $facturacion->delete();

 foreach ($regreso as $regreso) {
   $identi = $regreso->empresa_id;
 }
  return Redirect('dafer/cuentas-asignadas/'.$identi)->with('status', 'ok_delete');
        }




  public function eliminarbanco($id){
 if(!$this->tenantName){
  $banco = Banco::find($id);
 }else{
  $banco = \DigitalsiteSaaS\Dafer\Tenant\Banco::find($id);    
 } 
  $banco->delete();
  return Redirect('dafer/bancos')->with('status', 'ok_delete');
        }

public function acceso() {
 return View('dafer::acceso.acceso');
}


public function informacion($id){
if(!$this->tenantName){
$datos = Informacion::all();
}
else{
$datos = \DigitalsiteSaaS\Dafer\Tenant\Banco::join('dafer_infobancaria','dafer_infobancaria.banco_id', '=', 'dafer_bancos.id')
         ->where('dafer_infobancaria.empresa_id', '=', $id)->get();
}

return view('dafer::bancos.informacion-bancaria')->with('datos', $datos);
     
}



public function infoproducto($id){
if(!$this->tenantName){
$datos = Producto::all();
}
else{
$datos = \DigitalsiteSaaS\Dafer\Tenant\Producto::join('dafer_infoproductos','dafer_productos.id', '=', 'dafer_infoproductos.producto_id')
         ->where('dafer_infoproductos.empresa_id', '=', $id)->get();
}

return view('dafer::productos.informacion-productos')->with('datos', $datos);
     
}


public function infocuentas($id){
if(!$this->tenantName){
$datos = Cuentas::all();
}
else{
$datos = \DigitalsiteSaaS\Dafer\Tenant\Cuentas::where('empresa_id','=', $id)->get();
}

return view('dafer::cuentas.informacion-cuentas')->with('datos', $datos);
     
}

public function crearinformacion() {
 if(!$this->tenantName){
 $banco = new informacion;
 }
 else{
 $banco = new \DigitalsiteSaaS\Dafer\Tenant\Informacion;  
 }
 $banco->banco_id = Input::get('banco');
 $banco->usuario = Input::get('usuario');
 $banco->password = Input::get('password');
 $banco->informacion = Input::get('informacion');
 $banco->empresa_id = Input::get('empresa_id');
 $banco->save();

  return Redirect('/dafer/informacion-bancaria/'.$banco->empresa_id)->with('status', 'ok_create');
}

public function crearinformacionpro() {
 if(!$this->tenantName){
 $banco = new Infoproducto;
 }
 else{
 $banco = new \DigitalsiteSaaS\Dafer\Tenant\Infoproducto;  
 }
 $banco->producto_id = Input::get('producto');
 $banco->inicio = Input::get('inicio');
 $banco->fin = Input::get('renovacion');
 $banco->empresa_id = Input::get('empresa_id');
 $banco->save();

  return Redirect('/dafer/informacion-producto/'.$banco->empresa_id)->with('status', 'ok_create');
}



public function editarproductosc($id){
 $input = Input::all();
 if(!$this->tenantName){
 $producto = infoproducto::find($id);
 }else{
 $producto = \DigitalsiteSaaS\Dafer\Tenant\Infoproducto::find($id);
 }
 $producto->producto_id = Input::get('producto');
 $producto->inicio = Input::get('inicio');
 $producto->fin = Input::get('renovacion');
 $producto->empresa_id = Input::get('empresa_id');
 $producto->save();

 return Redirect('dafer/informacion-producto/'.$producto->empresa_id)->with('status', 'ok_create');
}





public function bancos(){
if(!$this->tenantName){
$bancos = Banco::all();
}
else{
$bancos = \DigitalsiteSaaS\Dafer\Tenant\Banco::all();
}
return view('dafer::bancos.informacion')->with('bancos', $bancos);
     
}

public function crearbancos(){

return view('dafer::bancos.crear-bancos');
     
}


public function infobancaria(){
if(!$this->tenantName){
$bancos = Banco::all();
}
else{
$bancos = \DigitalsiteSaaS\Dafer\Tenant\Banco::all();
}
return view('dafer::bancos.crear-infobancaria')->with('bancos', $bancos);
     
}

public function infoproductoweb(){
if(!$this->tenantName){
$productos = Producto::all();
}
else{
$productos = \DigitalsiteSaaS\Dafer\Tenant\Producto::all();
}
return view('dafer::productos.crear-infoproducto')->with('productos', $productos);
     
}

public function crearbanco() {
 if(!$this->tenantName){
 $banco = new Banco;
 }
 else{
 $banco = new \DigitalsiteSaaS\Dafer\Tenant\Banco;  
 }
 $banco->banco = Input::get('banco');
 $banco->save();

  return Redirect('/dafer/bancos')->with('status', 'ok_create');
}


public function crearcuenta() {
 if(!$this->tenantName){
 $cuenta = new Cuentas;
 }
 else{
 $cuenta = new \DigitalsiteSaaS\Dafer\Tenant\Cuentas;  
 }
 $cuenta->plataforma = Input::get('plataforma');
 $cuenta->correo = Input::get('correo');
 $cuenta->contrasena = Input::get('contrasena');
 $cuenta->empresa_id = Input::get('empresa_id');
 $cuenta->save();

  return Redirect('/dafer/cuentas-asignadas/'.$cuenta->empresa_id)->with('status', 'ok_create');
}


public function productos(){
if(!$this->tenantName){
$productos = Producto::all();
}
else{
$productos = \DigitalsiteSaaS\Dafer\Tenant\Producto::all();
}
return view('dafer::productos.productos')->with('productos', $productos);
     
}


public function cproductos(){
if(!$this->tenantName){
$datos = Informacion::all();
}
else{
$datos = \DigitalsiteSaaS\Dafer\Tenant\Informacion::join('dafer_bancos','dafer_bancos.id', '=', 'dafer_infobancaria.empresa_id')
         ->where('dafer_infobancaria.empresa_id', '=', $id)->get();
}

return view('dafer::bancos.informacion-prodcuto')->with('datos', $datos);
     
}


public function crearproducto() {
 if(!$this->tenantName){
 $producto = new Producto;
 }
 else{
 $producto = new \DigitalsiteSaaS\Dafer\Tenant\Producto;  
 }
 $producto->producto = Input::get('producto');
 $producto->save();

  return Redirect('/dafer/productos')->with('status', 'ok_create');
}

public function crearproductos(){

return view('dafer::productos.crear-producto');
     
}


public function editarproductos($id){
 $input = Input::all();
 if(!$this->tenantName){
 $producto = Producto::find($id);
 }else{
 $producto = \DigitalsiteSaaS\Dafer\Tenant\Producto::find($id);
 }
 $producto->producto = Input::get('producto');
 $producto->save();

 return Redirect('/dafer/productos')->with('status', 'ok_create');
}

public function editarbanco($id){
if(!$this->tenantName){
 $banco = Banco::find($id);
 }else{
 $banco = \DigitalsiteSaaS\Dafer\Tenant\Banco::find($id); 
 }
 return view('dafer::bancos.editar-banco')->with('banco', $banco);
}

public function editarbancaria($id){
if(!$this->tenantName){
 $banco = Informacion::find($id);
 $bancos = Banco::all();
 }else{
 $banco = \DigitalsiteSaaS\Dafer\Tenant\Informacion::join('dafer_bancos','dafer_bancos.id', '=', 'dafer_infobancaria.banco_id')->where('dafer_infobancaria.id', '=', $id)->get(); 
 $bancos = \DigitalsiteSaaS\Dafer\Tenant\Banco::all();

 }

 return view('dafer::bancos.editar-informacionbancaria')->with('banco', $banco)->with('bancos', $bancos);
}

public function editarbancos($id){
 $input = Input::all();
 if(!$this->tenantName){
 $banco = Banco::find($id);
 }else{
 $banco = \DigitalsiteSaaS\Dafer\Tenant\Banco::find($id);
 }
 $banco->banco = Input::get('banco');
 $banco->save();

 return Redirect('/dafer/bancos')->with('status', 'ok_create');
}


public function editarempresa($id){
 $input = Input::all();
 if(!$this->tenantName){
 $facturacion = Empresa::find($id);
 }else{
 $facturacion = \DigitalsiteSaaS\Dafer\Tenant\Empresa::find($id);
 }

  return view('dafer::empresas.editar-empresa')->with('facturacion', $facturacion);
}

public function detalle($id){
if(!$this->tenantName){
$detalle = Informacion::all();
}
else{
$detalle = \DigitalsiteSaaS\Dafer\Tenant\Empresa::join('dafer_infobancaria','dafer_infobancaria.id', '=', 'dafer_infobancaria.empresa_id')->where('clientes.id', '=', $id)->get();

}
return view('dafer::bancos.informacion-bancaria')->with('datos', $datos);
     
}



}