@extends('template')

@section('title', 'Págine de login')

@section('li-1')
    <button class="secondary">
        <a href="{{route('register')}}">Cadastre-se</a>
    </button>
@endsection

@section('content')
    <h1>Login</h1>

    @if ($errors->any())
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    <form action="{{ route('authenticate') }}" method="post">
        @csrf
        <label for="email">Email:</label>
        <input type="email" name="email" required>

        <label for="password">Senha: </label>
        <input type="password" name="password" required>

        <input type="submit" value="Entrar">
    </form>

@endsection
