<?php
namespace Database\Seeders;
use App\Models\Education;use App\Models\Experience;use App\Models\Portfolio;use App\Models\Profile;use App\Models\Skill;use App\Models\SocialLink;use App\Models\User;
use Illuminate\Database\Seeder;use Illuminate\Support\Facades\Hash;
class DatabaseSeeder extends Seeder{
public function run():void{
$user=User::updateOrCreate(['email'=>'demo@example.com'],['username'=>'johndev','password'=>Hash::make('demo123')]);
$profile=Profile::updateOrCreate(['user_id'=>$user->id],['name'=>'John Developer','birth_date'=>'1995-03-15','phone'=>'+62 812-3456-7890','address'=>'Jakarta, Indonesia','bio'=>'Passionate full-stack web developer with 5+ years of experience building scalable and user-friendly web applications.','hobbies'=>['Coding','Photography','Hiking','Open Source']]);
$profile->skills()->delete();foreach([['React',90,'Frontend'],['TypeScript',85,'Language'],['Node.js',80,'Backend'],['PostgreSQL',75,'Database'],['TailwindCSS',95,'Frontend'],['Docker',70,'DevOps']] as [$n,$l,$c])Skill::create(['profile_id'=>$profile->id,'name'=>$n,'level'=>$l,'category'=>$c]);
$profile->education()->delete();Education::create(['profile_id'=>$profile->id,'institution'=>'Universitas Indonesia','degree'=>'Bachelor','field'=>'Computer Science','start_year'=>2013,'end_year'=>2017,'description'=>'Focused on software engineering and data structures.']);
$profile->experiences()->delete();foreach([['Tech Startup ABC','Senior Frontend Developer','2021-01-01',null,true,'Building and maintaining React-based web applications. Leading frontend architecture decisions.'],['Digital Agency XYZ','Full Stack Developer','2018-06-01','2021-01-01',false,'Developed full-stack web solutions for various clients using Node.js and React.']] as [$c,$p,$s,$e,$cur,$d])Experience::create(['profile_id'=>$profile->id,'company'=>$c,'position'=>$p,'start_date'=>$s,'end_date'=>$e,'current'=>$cur,'description'=>$d]);
$profile->socialLinks()->delete();foreach([['GitHub','https://github.com/johndev'],['LinkedIn','https://linkedin.com/in/johndev'],['Twitter','https://twitter.com/johndev']] as [$p,$u])SocialLink::create(['profile_id'=>$profile->id,'platform'=>$p,'url'=>$u]);
$user->portfolios()->delete();foreach([
['E-Commerce Platform','A full-featured e-commerce platform built with React, Node.js, and PostgreSQL. Includes real-time inventory management and payment processing.','https://images.unsplash.com/photo-1556742049-0cfed4f6a45d?w=800&q=80',['React','Node.js','PostgreSQL','Stripe']],
['Task Management App','A collaborative task management application with drag-and-drop boards, real-time updates, and team collaboration features.','https://images.unsplash.com/photo-1611224923853-80b023f02d71?w=800&q=80',['React','Socket.io','MongoDB','Redux']],
['Portfolio Website','A personal portfolio website showcasing projects and skills with smooth animations and dark mode support.','https://images.unsplash.com/photo-1467232004584-a241de8bcf5d?w=800&q=80',['React','TailwindCSS','Framer Motion']]
] as [$t,$d,$m,$tags])Portfolio::create(['user_id'=>$user->id,'title'=>$t,'description'=>$d,'type'=>'image','media_path'=>$m,'thumbnail_path'=>$m,'tags'=>$tags,'live_url'=>'https://example.com','repo_url'=>'https://github.com']);
}}
