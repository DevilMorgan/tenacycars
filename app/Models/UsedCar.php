<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

// use Spatie\MediaLibrary\HasMedia\HasMedia;
// use Spatie\MediaLibrary\HasMedia\HasMediaTrait;

use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class UsedCar extends TenancyModel implements HasMedia
{
    use HasFactory;
    use SoftDeletes;
    use InteractsWithMedia;
    
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'usedcars';    

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

    protected $fillable = ['title', 'user_id', 'make_id', 'car_model_id', 'color_id', 'fuel_type_id', 'body_type_id', 'transmission_id', 'registration_year', 'km_driven', 'number_of_owner', 'car_location', 'about_car', 'cover_photo'];

    public function make()
    {
        return $this->belongsTo(Make::class);
    }

    public function car_model()
    {
        return $this->belongsTo(CarModel::class);
    }

    public function color()
    {
        return $this->belongsTo(Color::class);
    }

    public function fuel_type()
    {
        return $this->belongsTo(FuelType::class);
    }

    public function body_type()
    {
        return $this->belongsTo(BodyType::class);
    }

    public function transmission()
    {
        return $this->belongsTo("App\Models\Transmission");
    }
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
