@extends('template')

@section('content')
    <form action="{{ route('post.store') }}" method="post">
        @csrf
        <label for="title">Título: </label>
        <input type="text" name="title" required>

        <label for="content">Contéudo: </label>
        <textarea name="content" cols="30" rows="10" required></textarea>

        <input type="submit" value="Enviar">
    </form>
@endsection
