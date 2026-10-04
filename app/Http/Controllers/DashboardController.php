<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
class DashboardController extends Controller
{
    public function index(){
        $user=Auth::user()->load('profile.skills');
        $portfolioCount=$user->portfolios()->count(); $skillCount=$user->profile?->skills()->count()??0;
        return view('dashboard.index',compact('user','portfolioCount','skillCount'));
    }
}
