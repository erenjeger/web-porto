<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class Experience extends Model{protected $fillable=['profile_id','company','position','start_date','end_date','current','description'];protected function casts():array{return ['start_date'=>'date:Y-m','end_date'=>'date:Y-m','current'=>'boolean'];}public function profile(){return $this->belongsTo(Profile::class);}}
