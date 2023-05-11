<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class todocontroller extends Controller
{
    //
    public function index()
    {
        $valeur = request('input');
        DB::table('tache')->insert([
            'name' => $valeur,
            'statu' => 0
        ]);
        $listTodo = DB::table('tache')->get();
        return view('home', compact('listTodo'));

        // return view('home');
    }

    public function delete($id)
    {
        $deleted = DB::table('tache')->where('id',$id)->delete();

        $listTodo = DB::table('tache')->get();
        
        return redirect()->route('home');
    }


    public function update($id){
        $valeur = request('item');
        $update = DB::table('tache')->where('id',$id)->update(['name'=>$valeur]);
        
        return redirect()->route('home');

    }
}
