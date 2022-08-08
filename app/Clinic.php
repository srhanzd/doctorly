<?php

namespace App;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Clinic extends Model
{
    use HasFactory;
    protected $table = 'clinics';
    protected $fillable = [
        'id','name','description','created_at','updated_at'];
    protected $hidden =[
    ];

    public function doctor(){
        return $this->hasMany(Doctor::class,'clinic_id','id');
 }

//    public function services(){
//        return $this->hasMany(Service::class,'clinic_id','id');
//    }
//
//    public function review(){
//        return $this->hasMany(Review::class,'clinic_id','id');
//    }
//
//    public function reservation(){
//        return $this->hasMany(Reservation::class,'clinic_id','id');
//    }
//
//    public function offer(){
//        return $this->hasMany(Offer::class,'clinic_id','id');
//    }
}
