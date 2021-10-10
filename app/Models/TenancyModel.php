<?php
namespace App\Models;

use Hyn\Tenancy\Traits\UsesTenantConnection;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class TenancyModel extends Authenticatable
{
    use UsesTenantConnection;

}
