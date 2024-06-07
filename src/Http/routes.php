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
Route::get('dafer/informacion-producto/{id}', 'DigitalsiteSaaS\Dafer\Http\UsuarioController@infoproducto');
Route::get('dafer/cuentas-asignadas/{id}', 'DigitalsiteSaaS\Dafer\Http\UsuarioController@infocuentas');
Route::get('dafer/eliminar-infobancaria/{id}', 'DigitalsiteSaaS\Dafer\Http\UsuarioController@eliminarinfobancaria');
Route::get('dafer/editar-infobancaria/{id}', 'DigitalsiteSaaS\Dafer\Http\UsuarioController@editarbancaria');
Route::post('dafer/editar-infobancarias/{id}', 'DigitalsiteSaaS\Dafer\Http\UsuarioController@posteditarbancaria');


Route::get('dafer/bancos', 'DigitalsiteSaaS\Dafer\Http\UsuarioController@bancos');
Route::get('dafer/crear-banco', 'DigitalsiteSaaS\Dafer\Http\UsuarioController@crearbancos');
Route::post('dafer/crear-banco', 'DigitalsiteSaaS\Dafer\Http\UsuarioController@crearbanco');
Route::post('dafer/crear-cuentas', 'DigitalsiteSaaS\Dafer\Http\UsuarioController@crearcuenta');
Route::get('dafer/eliminar-banco/{id}', 'DigitalsiteSaaS\Dafer\Http\UsuarioController@eliminarbanco');
Route::get('dafer/editar-banco/{id}', 'DigitalsiteSaaS\Dafer\Http\UsuarioController@editarbanco');
Route::post('dafer/editarbanco/{id}', 'DigitalsiteSaaS\Dafer\Http\UsuarioController@editarbancos');

Route::get('dafer/crear-infobancaria/{id}', 'DigitalsiteSaaS\Dafer\Http\UsuarioController@infobancaria');
Route::post('dafer/crear-infobancaria', 'DigitalsiteSaaS\Dafer\Http\UsuarioController@crearinformacion');
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

Route::get('dafer/eliminar-cuenta/{id}', 'DigitalsiteSaaS\Dafer\Http\UsuarioController@eliminarcuenta');

Route::get('dafer/cproductos/{id}', 'DigitalsiteSaaS\Dafer\Http\UsuarioController@cproductos');

Route::get('dafer/productos/{id}', 'DigitalsiteSaaS\Dafer\Http\UsuarioController@detalle');

Route::get('dafer/detalle-empresa/{id}', 'DigitalsiteSaaS\Dafer\Http\UsuarioController@detalle');
});






