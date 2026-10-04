<?php
namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
class PublicPortfolioController extends Controller
{
    public function show(Request $request,User $user){
        $user->load(['profile.skills','profile.education','profile.experiences','profile.socialLinks']);
        $portfolios=$user->portfolios()->latest()->get(); $tag=trim((string)$request->string('tag')); $query=trim((string)$request->string('q'));
        if($tag!=='')$portfolios=$portfolios->filter(fn($p)=>in_array($tag,$p->tags??[],true));
        if($query!=='')$portfolios=$portfolios->filter(fn($p)=>str_contains(strtolower($p->title.' '.$p->description),strtolower($query)));
        $allTags=$user->portfolios()->get()->flatMap(fn($p)=>$p->tags??[])->filter()->unique()->sort()->values();
        return view('portfolio.show',compact('user','portfolios','allTags','tag','query'));
    }
}
