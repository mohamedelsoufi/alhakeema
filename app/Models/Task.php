<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    protected $table = 'tasks';

    protected $guarded = [];

    protected $hidden = ['created_at','updated_at'];

    public $timestamps = true;

    // relations start
    public function user(){
        return $this->belongsTo(User::class);
    }
    // relations end

    // accessors & Mutator start
    public function getTitleAttribute($val){
        return $this->attributes['title'] = ucwords($val);
    }

    public function getDescriptionAttribute($val){
        return $this->attributes['description'] = ucwords($val);
    }
    // accessors & Mutator end
}
