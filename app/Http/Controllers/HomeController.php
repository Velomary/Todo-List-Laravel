<?php

namespace App\Http\Controllers;
// use App\Models\User;
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
        // $user_id = Auth::user()->id;
        $listTodo = DB::table('tache')->where('creator_id',$user_id)->get();
        return view('home', compact('listTodo'));
        
    }
    
}
