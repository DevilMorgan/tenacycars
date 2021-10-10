<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CarModel extends TenancyModel
{
    use HasFactory;
    use SoftDeletes;
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'car_models';    

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

    protected $fillable = ['name', 'make_id'];

    public function make()
    {
        return $this->belongsTo(Make::class);
    }
        
}
