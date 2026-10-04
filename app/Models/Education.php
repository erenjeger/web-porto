<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class Education extends Model{protected $fillable=['profile_id','institution','degree','field','start_year','end_year','description'];public function profile(){return $this->belongsTo(Profile::class);}}
