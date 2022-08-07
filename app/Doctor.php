<?php

namespace App;

use App\Models\Clinic;
use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    protected $table = 'doctors';

    protected $fillable = [
        'user_id',
        'title',
        'degree',
        'experience',
        'is_deleted',
        'clinic_id'
    ];
//    public function clinic(){
//        return $this->belongsTo(Clinic::class,'clinic_id');
//    }
}
