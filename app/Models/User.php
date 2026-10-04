<?php
namespace App\Models;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class User extends Authenticatable
{
    use HasFactory, Notifiable;
    protected $fillable=['email','username','password'];
    protected $hidden=['password','remember_token'];
    protected function casts():array{return ['email_verified_at'=>'datetime','password'=>'hashed'];}
    public function profile(){return $this->hasOne(Profile::class);}
    public function portfolios(){return $this->hasMany(Portfolio::class);}
    public function getDisplayNameAttribute():string{return $this->profile?->name?:$this->username;}
}
