<?php

namespace App\Models;

use Database\Factories\CarFactory;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Car extends Model
{
    use HasFactory;

    protected $table='cars';
    
    protected $primaryKey='id';

    protected $fillable=['name','founded','description' ,'image_path','user_id'];

    // protected $hidden=['updated_at'];

    // protected $visible=['name','founded','description','created_at'];

    public function carModels()
    {
         
        return $this->hasMany(CarModel::class);

    }
    public function headquarter()
    {
        return $this->hasOne(Headquarter::class);
    }
    //Define a has many through relationship
     public function engines()
     {
        return $this->hasManyThrough(
            Engine::class,
            CarModel::class,
            'car_id',//Foreign key on CarModel table 
            'model_id' //Foreign key on Engine table
        
        );
    }
    //Define a has one through relationship 
    public function productionDate()
    {
        return $this->hasOneThrough(
            CarProductionDate::class,
            CarModel::class,
            'car_id',
            'model_id'
        );
    }
    
    public function products()
    {
        return $this->belongsToMany(Product::class);
    }
    //Accessors
    protected function name():Attribute
    {
      return Attribute::make(
        get: fn ($value)=>ucfirst($value),
      );
    }
    //Mutators
    protected function description(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => ucfirst($value),
            set: fn ($value) => strtolower($value),
        );
    }
    //Scopes
    public function scopeFounded($query)
    {
        return $query->where('founded','>',1914);
    }
    //Factories
        /**
     * Create a new factory instance for the model.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    protected static function newFactory()
    {
        return CarFactory::new();
    }
}
