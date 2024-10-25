<?php

namespace DigitalsiteSaaS\Dafer;

use Illuminate\Support\ServiceProvider;

class DaferServiceProvider extends ServiceProvider{
	
 public function register(){
 $this->app->bind('dafer', function($app){
 return new Dafer;
 });
 }

 public function boot(){
 require __DIR__ . '/Http/routes.php';
 $this->loadViewsFrom(__DIR__ . '/../views', 'dafer');
 $this->publishes([
 __DIR__ . '/migrations/2015_07_25_000000_create_usuario_table.php' => base_path('database/migrations/2015_07_25_000000_create_usuario_table.php'),
 ]);
 }

}