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
                        <h1>Welcome <span> {{ Auth::user()->name }}</span>!</h1>
                    </div>
                    <div class="input_div" >
                        {{-- <input type="text" class="input" placeholder="Write what you want here..." required> --}}
                        
                        <form method="POST" action="{{ route('insert-todo') }}">
                            @csrf
                            {{-- <a href="#" class="add_button" >add</a> --}}
                            
                            <input type="text" name="input" class="input"placeholder="Write what you want here..." required>
                            <button class="add_button" type="submit">Add</button>
                            <input type="text" style="display: none" value="{{ Auth::user()->id }}" name="user_id">
                        </form>
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
        </div>
    </div>
     
</body>
@endsection
