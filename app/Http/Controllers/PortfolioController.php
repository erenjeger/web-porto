<?php
namespace App\Http\Controllers;
use App\Models\Portfolio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
class PortfolioController extends Controller
{
    public function index(Request $request){
        $portfolios=Auth::user()->portfolios()->latest()->get(); $search=trim((string)$request->string('q'));
        if($search!=='')$portfolios=$portfolios->filter(fn($p)=>str_contains(strtolower($p->title),strtolower($search))||collect($p->tags??[])->contains(fn($t)=>str_contains(strtolower($t),strtolower($search))));
        return view('dashboard.portfolio.index',compact('portfolios','search'));
    }
    public function store(Request $request){
        $data=$request->validate(['title'=>['required','string','max:150'],'description'=>['required','string','max:2000'],'media'=>['required','file','max:51200','mimetypes:image/jpeg,image/png,image/webp,image/gif,video/mp4,video/webm,video/quicktime'],'thumbnail'=>['nullable','image','max:10240'],'tags'=>['nullable','string','max:500'],'live_url'=>['nullable','url','max:500'],'repo_url'=>['nullable','url','max:500']]);
        $mediaPath=$request->file('media')->store('portfolio','public'); $type=str_starts_with($request->file('media')->getMimeType()??'','video/')?'video':'image'; $thumbnailPath=$request->file('thumbnail')?->store('portfolio/thumbnails','public');
        Portfolio::create(['user_id'=>Auth::id(),'title'=>$data['title'],'description'=>$data['description'],'type'=>$type,'media_path'=>$mediaPath,'thumbnail_path'=>$thumbnailPath,'tags'=>collect(explode(',',$data['tags']??''))->map(fn($t)=>trim($t))->filter()->unique()->values()->all(),'live_url'=>$data['live_url']??null,'repo_url'=>$data['repo_url']??null]);
        return back()->with('success','Portfolio berhasil diupload.');
    }
    public function destroy(Portfolio $portfolio){
        abort_unless($portfolio->user_id===Auth::id(),403);
        foreach([$portfolio->media_path,$portfolio->thumbnail_path] as $path)if($path&&!str_starts_with($path,'http'))Storage::disk('public')->delete($path);
        $portfolio->delete(); return back()->with('success','Portfolio dihapus.');
    }
}
