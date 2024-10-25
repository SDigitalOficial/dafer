<?php

namespace DigitalsiteSaaS\Dafer\Tenant;

use Hyn\Tenancy\Traits\UsesTenantConnection;
use Illuminate\Database\Eloquent\Model;


class Tarjeta extends Model{

use UsesTenantConnection;

protected $table = 'dafer_tarjetas';
public $timestamps = true;

}