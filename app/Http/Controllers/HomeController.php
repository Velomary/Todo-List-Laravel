<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
// Récupérer l'ID de l'utilisateur actuellement authentifié
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user_id = Auth::id();
        $listTodo = DB::table('tache')->where('creator_id',$user_id)->orderby('id','desc')->get();
        return view('home', compact('listTodo'));
        
    }
    //change to dark mode
    public function dark(){
        $user_id = Auth::id();
        $update = DB::table('users')->where('id',$user_id)->update(['theme'=>1]);

        return redirect()->route('home');
        }
    //change to light mode
    public function light(){
        $user_id = Auth::id();
        $update = DB::table('users')->where('id',$user_id)->update(['theme'=>0]);

        return redirect()->route('home');
        }
    
}
