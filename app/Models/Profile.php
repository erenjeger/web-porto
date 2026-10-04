<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class Profile extends Model
{
    protected $fillable=['user_id','name','birth_date','phone','address','bio','avatar_path','hobbies'];
    protected function casts():array{return ['birth_date'=>'date','hobbies'=>'array'];}
    public function user(){return $this->belongsTo(User::class);}
    public function skills(){return $this->hasMany(Skill::class)->orderBy('category')->orderBy('name');}
    public function education(){return $this->hasMany(Education::class)->orderByDesc('start_year');}
    public function experiences(){return $this->hasMany(Experience::class)->orderByDesc('start_date');}
    public function socialLinks(){return $this->hasMany(SocialLink::class);}
    public function getAvatarUrlAttribute():?string{return $this->avatar_path?asset('storage/'.$this->avatar_path):null;}
}
