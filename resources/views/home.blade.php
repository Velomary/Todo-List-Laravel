@extends('layouts.app')

@section('content')
<body class="body">
    <div class="container">
        <div class="row justify-content-center">
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
                        <h1>To do <span> List</span></h1>
                    </div>
                    <div class="input_div" >
                        {{-- <input type="text" class="input" placeholder="Write what you want here..." required> --}}
                        
                        <form method="POST" action="{{ route('insert-todo') }}">
                            @csrf
                            {{-- <a href="#" class="add_button" >add</a> --}}
                            
                            <input type="text" name="nom_du_champ" class="input"placeholder="Write what you want here..." required>
                            <button class="add_button" type="submit">Envoyer</button>
                        </form>
                    </div>
                    <div class="content">
                        <div class="item">

                            @foreach($listTodo as $valeur)
                            <form action="{{ route('update-todo', ['id' => $valeur->id]) }}" method="post">
                                @csrf
                                @method('PUT')
                                <li>  
                                    <input type="text" value="{{ $valeur->name }}" name="item" class="item_input"> 
                                    <button type="submit" class="Edit_button">Edit</button>
                                </li>
                            </form>
                            
                            <form action="{{ route('delete-todo', ['id' => $valeur->id]) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="remove_button">Supprimer</button>
                            </form>
        
        
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
                    <div class="mode" id="icon">
                        <i class="fas fa-adjust" ></i>
                    </div>
                
            </div>
        </div>
    </div>
     
</body>
@endsection
