<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class FuelType extends TenancyModel
{
    use HasFactory;
    use SoftDeletes;
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'fuel_types';    

    /**
     * The primary key associated with the table.
     *
     * @var string
     */

    protected $primaryKey = 'id';    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $fillable = ['name'];    
}
