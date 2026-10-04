<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
class Portfolio extends Model
{
    protected $fillable=['user_id','title','description','type','media_path','thumbnail_path','live_url','repo_url','tags','is_featured'];
    protected function casts():array{return ['tags'=>'array','is_featured'=>'boolean'];}
    public function user(){return $this->belongsTo(User::class);}
    public function getMediaUrlAttribute():?string{return $this->media_path?(Str::startsWith($this->media_path,['http://','https://'])?$this->media_path:asset('storage/'.$this->media_path)):null;}
    public function getThumbnailUrlAttribute():?string{return $this->thumbnail_path?(Str::startsWith($this->thumbnail_path,['http://','https://'])?$this->thumbnail_path:asset('storage/'.$this->thumbnail_path)):$this->media_url;}
}
