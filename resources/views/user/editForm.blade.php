@extends('template')

@section('title', 'Atualizar {{ $user->name }}')

@section('content')
    <h1>Atualizar usuário</h1>

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

    <form action="{{ route('user.update', ['user' => $user->id]) }}" enctype="multipart/form-data" method="post">
        @csrf
        @method('patch')
        <label for="name">Nome: </label>
        <input type="text" name="name" value="{{ $user->name }}" required>

        <label for="email">Email: </label>
        <input type="email" name="email" value="{{ $user->email }}" required>

        <label for="avatar">Avatar: </label>
        <input type="file" name="avatar">

        <input type="submit" value="atualizar">
    </form>

@endsection
