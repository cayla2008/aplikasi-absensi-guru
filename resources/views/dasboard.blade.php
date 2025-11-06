@extends("layouts.app")

@section('content')
    <h1>ini dasboard</h1>
    <div>
        namaku : {{ Auth::user()->name }}
        emailku : {{ Auth::user()->email }}
        roleku : {{ Auth::user()->role }}
    </div>
    

    

@endsection