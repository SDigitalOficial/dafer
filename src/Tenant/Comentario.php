<?php

namespace DigitalsiteSaaS\Dafer\Tenant;

use Hyn\Tenancy\Traits\UsesTenantConnection;
use Illuminate\Database\Eloquent\Model;


class Comentario extends Model{

use UsesTenantConnection;

protected $table = 'dafer_comentario';
public $timestamps = true;

}