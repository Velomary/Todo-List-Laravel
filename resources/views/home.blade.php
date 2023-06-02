@extends('layouts.app')

@section('content')
<body class="body ">
    <div class="all {{Auth::user()->theme ? 'dark_theme':''}}">
        <div class="container">
            < class="row justify-content-center">
                <div class="col-md-8">
                        <!-- <div class="card-header">{{ __('Dashboard') }}</div>
        
                        <div class="card-body">
                            @if (session('status'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('status') }}
                                </div>
                            @endif
        
                            {{ __('You are logged in!') }}
                        </div> -->
    
                        <div class="titre">
                            <h1>Welcome <span> {{ Auth::user()->name }}</span> !</h1>
                        </div>
                        <div class="input_div" >
                                                       
                            <form method="POST" action="{{ route('insert-todo') }}">
                                @csrf                                
                                <input type="text" name="input" class="input"placeholder="Write what you want here..." required>
                                <button class="add_button" type="submit">Add</button>
                            </form>
                            <div class="clear_div">
                                @foreach($listTodo as $tache)
                                    <form action="{{route('delete-All', ['creator_id' => $tache->creator_id])}}" method="POST" >
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="clear"> Clear All</button>
                                    </form>
                                @endforeach
                            </div>
                        </div>
                        <div class="content">
                            <div class="item">
                                @foreach($listTodo as $valeur)
                                
                                    <div class="task">
                                        <form action="{{ route('update-todo', ['id' => $valeur->id]) }}" method="post">
                                            @csrf
                                            @method('PUT')
                                            <li class="list-item">
                                                 
                                                <input class="form-check-input" type="checkbox" name="statu" id="check" {{$valeur->statu ? 'checked':''}} value=1>
    
                                                <input type="text" value="{{ $valeur->name }}" name="item" class="item_input" style={{$valeur->statu ? "text-decoration:line-through":''}}>
    
                                                <button type="submit" class="Edit_button">Save</button>
                                            </li>
                                        </form>
                                        
                                        <form action="{{ route('delete-todo', ['id' => $valeur->id]) }}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="remove_button">Delete</button>
                                        </form>
                                    </div>
            
                                @endforeach
                            </div>
                           
        
                         <!--
                        <div class="item">
                            <input type="text" class="item_input">
                            <a href="#" class="Edit_button">Edit</a>
                            <a href="#" class="remove_button">Delete</a>
                        </div> 
            -->      
                        </div>
                                        
                </div>
                
                    <form method="POST" action="{{route('dark-mode')}}">
                        @csrf
                        @method('PUT')
                        <div id="icon" class="mode" >
                            <button type="submit" >
                                <svg xmlns="http://www.w3.org/2000/svg" width="512" height="512" viewBox="0 0 512 512"><title>ionicons-v5-j</title><path d="M160,136c0-30.62,4.51-61.61,16-88C99.57,81.27,48,159.32,48,248c0,119.29,96.71,216,216,216,88.68,0,166.73-51.57,200-128-26.39,11.49-57.38,16-88,16C256.71,352,160,255.29,160,136Z" style="fill:none;stroke:#000;stroke-linecap:round;stroke-linejoin:round;stroke-width:32px"/></svg>
                            </button>
                        </div>
                    </form>
    
                    <form method="POST" action="{{route('light-mode')}}">
                        @csrf
                        @method('PUT')
                        <div id="icon" class="mode" {{ Auth::user()->theme ? '':'style= display:none'}} >
                            <button type="submit" >
                                <svg xmlns="http://www.w3.org/2000/svg" width="512" height="512" viewBox="0 0 512 512"><title>ionicons-v5-q</title><path d="M256,118a22,22,0,0,1-22-22V48a22,22,0,0,1,44,0V96A22,22,0,0,1,256,118Z"/><path d="M256,486a22,22,0,0,1-22-22V416a22,22,0,0,1,44,0v48A22,22,0,0,1,256,486Z"/><path d="M369.14,164.86a22,22,0,0,1-15.56-37.55l33.94-33.94a22,22,0,0,1,31.11,31.11l-33.94,33.94A21.93,21.93,0,0,1,369.14,164.86Z"/><path d="M108.92,425.08a22,22,0,0,1-15.55-37.56l33.94-33.94a22,22,0,1,1,31.11,31.11l-33.94,33.94A21.94,21.94,0,0,1,108.92,425.08Z"/><path d="M464,278H416a22,22,0,0,1,0-44h48a22,22,0,0,1,0,44Z"/><path d="M96,278H48a22,22,0,0,1,0-44H96a22,22,0,0,1,0,44Z"/><path d="M403.08,425.08a21.94,21.94,0,0,1-15.56-6.45l-33.94-33.94a22,22,0,0,1,31.11-31.11l33.94,33.94a22,22,0,0,1-15.55,37.56Z"/><path d="M142.86,164.86a21.89,21.89,0,0,1-15.55-6.44L93.37,124.48a22,22,0,0,1,31.11-31.11l33.94,33.94a22,22,0,0,1-15.56,37.55Z"/><path d="M256,358A102,102,0,1,1,358,256,102.12,102.12,0,0,1,256,358Z"/></svg>
                            </button>
                        </div>
                    </form>
                
            </div>
        </div> 
    </div>
       
</body>
@endsection
