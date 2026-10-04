<?php
namespace App\Http\Controllers;
use App\Models\Education;
use App\Models\Experience;
use App\Models\Skill;
use App\Models\SocialLink;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
class ProfileController extends Controller
{
    public function edit(){ $profile=Auth::user()->profile()->firstOrCreate(['user_id'=>Auth::id()]); $profile->load(['skills','education','experiences','socialLinks']); return view('dashboard.profile',compact('profile')); }
    public function update(Request $request){
        $data=$request->validate([
            'name'=>['required','string','max:150'],'birth_date'=>['nullable','date'],'phone'=>['nullable','string','max:50'],'address'=>['nullable','string','max:255'],'bio'=>['nullable','string','max:2000'],'avatar'=>['nullable','image','max:5120'],'hobbies'=>['nullable','string','max:500'],
            'skills'=>['nullable','array'],'skills.*.name'=>['nullable','string','max:100'],'skills.*.level'=>['nullable','integer','min:0','max:100'],'skills.*.category'=>['nullable','string','max:100'],
            'education'=>['nullable','array'],'education.*.institution'=>['nullable','string','max:150'],'education.*.degree'=>['nullable','string','max:100'],'education.*.field'=>['nullable','string','max:150'],'education.*.start_year'=>['nullable','integer','min:1950','max:2100'],'education.*.end_year'=>['nullable','integer','min:1950','max:2100'],'education.*.description'=>['nullable','string','max:1000'],
            'experiences'=>['nullable','array'],'experiences.*.company'=>['nullable','string','max:150'],'experiences.*.position'=>['nullable','string','max:150'],'experiences.*.start_date'=>['nullable','date_format:Y-m'],'experiences.*.end_date'=>['nullable','date_format:Y-m'],'experiences.*.current'=>['nullable','boolean'],'experiences.*.description'=>['nullable','string','max:1000'],
            'social_links'=>['nullable','array'],'social_links.*.platform'=>['nullable','string','max:50'],'social_links.*.url'=>['nullable','url','max:500'],
        ]);
        $profile=Auth::user()->profile()->firstOrCreate(['user_id'=>Auth::id()]);
        DB::transaction(function()use($request,$data,$profile){
            if($request->hasFile('avatar')){if($profile->avatar_path)Storage::disk('public')->delete($profile->avatar_path);$data['avatar_path']=$request->file('avatar')->store('avatars','public');}
            $data['hobbies']=collect(explode(',',$data['hobbies']??''))->map(fn($v)=>trim($v))->filter()->values()->all();
            $profile->update(collect($data)->only(['user_id','name','birth_date','phone','address','bio','avatar_path','hobbies'])->all());
            $profile->skills()->delete(); foreach($data['skills']??[] as $s){if(blank($s['name']??null))continue;Skill::create(['profile_id'=>$profile->id,'name'=>$s['name'],'level'=>(int)($s['level']??0),'category'=>$s['category']??'General']);}
            $profile->education()->delete(); foreach($data['education']??[] as $e){if(blank($e['institution']??null)&&blank($e['field']??null))continue;Education::create(['profile_id'=>$profile->id,'institution'=>$e['institution']??'','degree'=>$e['degree']??'','field'=>$e['field']??'','start_year'=>$e['start_year']??null,'end_year'=>$e['end_year']??null,'description'=>$e['description']??null]);}
            $profile->experiences()->delete(); foreach($data['experiences']??[] as $e){if(blank($e['company']??null)&&blank($e['position']??null))continue;Experience::create(['profile_id'=>$profile->id,'company'=>$e['company']??'','position'=>$e['position']??'','start_date'=>!empty($e['start_date'])?$e['start_date'].'-01':null,'end_date'=>!empty($e['current'])?null:(!empty($e['end_date'])?$e['end_date'].'-01':null),'current'=>!empty($e['current']),'description'=>$e['description']??null]);}
            $profile->socialLinks()->delete(); foreach($data['social_links']??[] as $s){if(blank($s['url']??null))continue;SocialLink::create(['profile_id'=>$profile->id,'platform'=>$s['platform']??'Website','url'=>$s['url']]);}
        });
        return back()->with('success','Profil berhasil disimpan.');
    }
}
