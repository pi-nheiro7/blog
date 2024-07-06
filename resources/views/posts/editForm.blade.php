@extends('template')

@section('title - ', 'Editção de artigo')

@section('content')
    @if ($errors->any())
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif
    <form action="{{ route('post.update', ['post' => $post->id]) }}" method="post">
        @csrf
        @method('patch')
        <label for="title">Título: </label>
        <input type="text" name="title" value="{{ $post->title }}" required>

        <label for="content">Conteúdo: </label>
        <textarea name="content" cols="30" rows="10" required>{{ $post->content }}</textarea>

        <div class="grid">
            <div>
                <input type="submit" value="Atualizar">
            </div>
            <div>
                <button class="outlined secondary">
                    <a class="contrast" href="{{ route('post.index') }}">Voltar</a>
                </button>
            </div>
        </div>
    </form>
@endsection
