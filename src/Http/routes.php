<?php
Route::get('/dafer/dafer', function () {
return 'hola';
});

Route::group(['middleware' => ['auths','usuariodafer']], function (){
Route::resource('dafer/usuarios', 'DigitalsiteSaaS\Dafer\Http\UsuarioController');
Route::get('dafer/crear-usuario', 'DigitalsiteSaaS\Dafer\Http\UsuarioController@crearusuario');
Route::post('dafer/crear-usuario', 'DigitalsiteSaaS\Dafer\Http\UsuarioController@crear');
Route::get('dafer/eliminar/{id}', 'DigitalsiteSaaS\Dafer\Http\UsuarioController@eliminar');
Route::get('dafer/editar/{id}', 'DigitalsiteSaaS\Dafer\Http\UsuarioController@editar');
Route::post('dafer/actualizar/{id}', 'DigitalsiteSaaS\Dafer\Http\UsuarioController@actualizar');



Route::get('dafer/empresas', 'DigitalsiteSaaS\Dafer\Http\UsuarioController@empresas');
Route::get('dafer/crear-empresa', 'DigitalsiteSaaS\Dafer\Http\UsuarioController@crearempresa');
Route::post('dafer/crear-empresa', 'DigitalsiteSaaS\Dafer\Http\UsuarioController@create');
Route::get('dafer/editar-empresa/{id}', 'DigitalsiteSaaS\Dafer\Http\UsuarioController@editarempresa');
Route::post('dafer/actualizar-cliente/{id}', 'DigitalsiteSaaS\Dafer\Http\UsuarioController@actualizarempresa');
Route::get('dafer/eliminar-empresa/{id}', 'DigitalsiteSaaS\Dafer\Http\UsuarioController@eliminarempresa');

Route::get('dafer/informacion-bancaria/{id}', 'DigitalsiteSaaS\Dafer\Http\UsuarioController@informacion');
Route::get('dafer/informacion-tarjetas/{id}', 'DigitalsiteSaaS\Dafer\Http\UsuarioController@informaciontarjetas');
Route::get('dafer/informacion-producto/{id}', 'DigitalsiteSaaS\Dafer\Http\UsuarioController@infoproducto');
Route::get('dafer/cuentas-asignadas/{id}', 'DigitalsiteSaaS\Dafer\Http\UsuarioController@infocuentas');
Route::get('dafer/eliminar-infobancaria/{id}', 'DigitalsiteSaaS\Dafer\Http\UsuarioController@eliminarinfobancaria');
Route::get('dafer/editar-infobancaria/{id}', 'DigitalsiteSaaS\Dafer\Http\UsuarioController@editarbancaria');
Route::post('dafer/editar-infobancarias/{id}', 'DigitalsiteSaaS\Dafer\Http\UsuarioController@posteditarbancaria');


Route::get('dafer/bancos', 'DigitalsiteSaaS\Dafer\Http\UsuarioController@bancos');
Route::get('dafer/crear-banco', 'DigitalsiteSaaS\Dafer\Http\UsuarioController@crearbancos');
Route::post('dafer/crear-banco', 'DigitalsiteSaaS\Dafer\Http\UsuarioController@crearbanco');
Route::post('dafer/crear-cuentas', 'DigitalsiteSaaS\Dafer\Http\UsuarioController@crearcuenta');
Route::post('dafer/editar-cuenta/{id}', 'DigitalsiteSaaS\Dafer\Http\UsuarioController@editarcuenta');
Route::get('dafer/editar-cuentas/{id}', 'DigitalsiteSaaS\Dafer\Http\UsuarioController@editcuenta');
Route::get('dafer/eliminar-banco/{id}', 'DigitalsiteSaaS\Dafer\Http\UsuarioController@eliminarbanco');
Route::get('dafer/eliminar-tarjeta/{id}', 'DigitalsiteSaaS\Dafer\Http\UsuarioController@eliminartarjeta');
Route::get('dafer/editar-banco/{id}', 'DigitalsiteSaaS\Dafer\Http\UsuarioController@editarbanco');
Route::post('dafer/editarbanco/{id}', 'DigitalsiteSaaS\Dafer\Http\UsuarioController@editarbancos');


Route::get('dafer/socios', 'DigitalsiteSaaS\Dafer\Http\UsuarioController@socios');
Route::get('dafer/socios-empresa/{id}', 'DigitalsiteSaaS\Dafer\Http\UsuarioController@sociosempresa');


Route::get('dafer/crear-socio', 'DigitalsiteSaaS\Dafer\Http\UsuarioController@crearsocios');
Route::post('dafer/crearsocio', 'DigitalsiteSaaS\Dafer\Http\UsuarioController@crearsocio');
Route::get('dafer/editar-socio/{id}', 'DigitalsiteSaaS\Dafer\Http\UsuarioController@editarsocio');
Route::post('dafer/editarsocios/{id}', 'DigitalsiteSaaS\Dafer\Http\UsuarioController@editarsocios');
Route::get('dafer/eliminar-socio/{id}', 'DigitalsiteSaaS\Dafer\Http\UsuarioController@eliminarsocio');


Route::get('dafer/crear-infobancaria/{id}', 'DigitalsiteSaaS\Dafer\Http\UsuarioController@infobancaria');
Route::post('dafer/crear-infobancaria', 'DigitalsiteSaaS\Dafer\Http\UsuarioController@crearinformacion');
Route::post('dafer/crear-infotarjetas', 'DigitalsiteSaaS\Dafer\Http\UsuarioController@crearinformaciontarjeta');
Route::post('dafer/crear-infoproducto', 'DigitalsiteSaaS\Dafer\Http\UsuarioController@crearinformacionpro');

Route::get('dafer/crear-infoproducto/{id}', 'DigitalsiteSaaS\Dafer\Http\UsuarioController@infoproductoweb');
Route::get('dafer/productos', 'DigitalsiteSaaS\Dafer\Http\UsuarioController@productos');
Route::post('dafer/crearproducto', 'DigitalsiteSaaS\Dafer\Http\UsuarioController@crearproducto');
Route::get('dafer/crear-producto', 'DigitalsiteSaaS\Dafer\Http\UsuarioController@crearproductos');
Route::get('dafer/eliminar-producto/{id}', 'DigitalsiteSaaS\Dafer\Http\UsuarioController@eliminarproducto');
Route::get('dafer/editar-producto/{id}', 'DigitalsiteSaaS\Dafer\Http\UsuarioController@editarproducto');
Route::post('dafer/editarproducto/{id}', 'DigitalsiteSaaS\Dafer\Http\UsuarioController@editarproductos');
Route::post('dafer/editarproductoc/{id}', 'DigitalsiteSaaS\Dafer\Http\UsuarioController@editarproductosc');
Route::get('dafer/eliminar-productoc/{id}', 'DigitalsiteSaaS\Dafer\Http\UsuarioController@eliminarproductoc');
Route::get('dafer/editar-productoc/{id}', 'DigitalsiteSaaS\Dafer\Http\UsuarioController@editarproductoc');

Route::get('dafer/notas', 'DigitalsiteSaaS\Dafer\Http\UsuarioController@notas');
Route::get('dafer/notas-empresa/{id}', 'DigitalsiteSaaS\Dafer\Http\UsuarioController@notasempresa');
Route::get('dafer/crear-notas', 'DigitalsiteSaaS\Dafer\Http\UsuarioController@crearnotas');
Route::get('dafer/editar-notas/{id}', 'DigitalsiteSaaS\Dafer\Http\UsuarioController@editarnotas');
Route::post('dafer/editarnotas/{id}', 'DigitalsiteSaaS\Dafer\Http\UsuarioController@editarnotasweb');
Route::post('dafer/crearnotas', 'DigitalsiteSaaS\Dafer\Http\UsuarioController@crearnota');
Route::post('dafer/crearcomentario', 'DigitalsiteSaaS\Dafer\Http\UsuarioController@crearcomentario');
Route::get('dafer/detalle-nota/{id}', 'DigitalsiteSaaS\Dafer\Http\UsuarioController@detallenota');



Route::get('dafer/eliminar-cuenta/{id}', 'DigitalsiteSaaS\Dafer\Http\UsuarioController@eliminarcuenta');

Route::get('dafer/cproductos/{id}', 'DigitalsiteSaaS\Dafer\Http\UsuarioController@cproductos');

Route::get('dafer/productos/{id}', 'DigitalsiteSaaS\Dafer\Http\UsuarioController@detalle');

Route::get('dafer/detalle-empresa/{id}', 'DigitalsiteSaaS\Dafer\Http\UsuarioController@detalle');

Route::get('dafer/resumen-cliente/{id}', 'DigitalsiteSaaS\Dafer\Http\UsuarioController@resumen');

Route::get('dafer/pagos/{id}', 'DigitalsiteSaaS\Dafer\Http\UsuarioController@pagos');
Route::post('dafer/crear-pagos', 'DigitalsiteSaaS\Dafer\Http\UsuarioController@crearpagos');
Route::get('dafer/eliminar-pago/{id}', 'DigitalsiteSaaS\Dafer\Http\UsuarioController@eliminarpagos');
Route::get('dafer/editar-pago/{id}', 'DigitalsiteSaaS\Dafer\Http\UsuarioController@editarpagos');
Route::post('dafer/editarpagos/{id}', 'DigitalsiteSaaS\Dafer\Http\UsuarioController@editarpago');

Route::post('dafer/editarpagosxxx/{id}', 'DigitalsiteSaaS\Dafer\Http\UsuarioController@editarpagoxxx');

});






