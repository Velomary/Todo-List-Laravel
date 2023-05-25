<?php

namespace App\Http\Controllers;


// use Illuminate\Http\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class todocontroller extends Controller
{
    //store User
    public $users;

    public function _construct(){
        $this->users = User::getAllUsers();
    }

    public function index()
    {
        // $users = this->users;
        $user_id = request('user_id');
        $valeur = request('input');
        DB::table('tache')->insert([
            'name' => $valeur,
            'statu' => 0,
            'creator_id' => $user_id,
        ]);
        $listTodo = DB::table('tache')->where('creator_id',$user_id)->get();

        return view('home', compact('listTodo'));
        
    }
    
    public function delete($id)
    {
        $deleted = DB::table('tache')->where('id',$id)->delete();
        $listTodo = DB::table('tache')->get();
        return redirect()->route('home');
        // return view('home',compact('listTodo'));
    }


    public function update($id){
        $name = request('item');
        $statu = request('statu');
        $update = DB::table('tache')->where('id',$id)->update(['name'=>$name, 'statu'=>$statu]);        
        return redirect()->route('home');

    }

    public function makedone(listTodo $todo){
        $todo->statu = 1;
        $todo->update();
        return back();
    }

    public function makeundone(listTodo $todo){
        $todo->statu = 0;
        $todo->update();
        return back();
    }
}
