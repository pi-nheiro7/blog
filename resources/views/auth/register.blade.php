@extends('template')

@section('title', 'Cadastro')

@section('li-2')
    <button class="secondary">
        <a href="{{ route('login') }}">Login</a>
    </button>
@endsection

@section('content')
    <h1>Cadastro</h1>

    @if ($errors->any())
    <h4>Ops... Houve algum erro.</h4>
        <div>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('store') }}" enctype="multipart/form-data" method="post">
        @csrf
        <label for="name">Nome: </label>
        <input type="text" name="name" required>

        <label for="email">Email: </label>
        <input type="email" name="email" required>

        <label for="password">Senha: </label>
        <input type="password" name="password" required>

        <label for="password_confirmation">Confirmar Senha:</label>
        <input type="password" name="password_confirmation" required>

        <label for="avatar">Avatar: </label>
        <input type="file" name="avatar">

        <input type="submit" value="Cadastrar">
    </form>

@endsection
