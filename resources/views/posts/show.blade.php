@extends('template')

@section('title - ', 'Artigo {{ $post->title }}')

@section('content')
    <h2>{{ $post->title }}</h2>
    <p>{{ $post->content }}</p>
    <sub>Criado por: {{ $post->user()->first()->name }} em {{ date('d/m/y H:i', strtotime($post->created_at)) }}</sub>
    @if (Auth::user() == $post->user()->first())
        <div class="grid">
            <div>
                <a class="contrast" href="{{ route('post.edit', ['post' => $post->id]) }}">Editar</a>
            </div>
            <div>
                <form action="{{ route('post.destroy', ['post' => $post->id]) }}" method="post">
                    @csrf
                    @method('delete')
                    <button class="outline secondary" type="submit">Apagar</button>
                </form>
            </div>
        </div>
    @endif
    <br>
    <a class="contrast" href="{{ route('post.index') }}">Voltar</a>
    <h4>Comentários: </h4>
    {{-- Depois fazer um botão que esconde a área de comentar --}}
    <details>
        <summary role="button">Adicionar comentário</summary>
        <form action="{{ route('comment.store', ['post' => $post->id, 'user' => Auth::user()->id]) }}" method="post">
            @csrf
            <textarea name="comment" cols="30" rows="2"></textarea>
            <input type="submit" value="Comentar">
        </form>
    </details>
    @if ($comments)
        @foreach ($comments as $comment)
            <article>
                @if ($comment->user()->first()->avatar)
                    <img src="{{ asset('/storage/images/'.$comment->user()->first()->avatar) }}" alt="Profile image"
                        style="width: 60px;height: 60px; padding: 10px; margin: 0px; ">
                @endif
                <kbd>{{ $comment->user()->first()->name }}</kbd>
                <p>{{ $comment->comment }}</p>
                <small>comentado em: {{ date('d/m/y H:i', strtotime($comment->created_at)) }}</small>
                @if (Auth::user() == $comment->user()->first())
                    <div class="grid">
                        <div>
                            <form action="{{ route('comment.destroy', ['comment' => $comment->id]) }}" method="post">
                                @csrf
                                @method('delete')
                                <input class="outline secondary" type="submit" value="Apagar">
                            </form>
                        </div>
                        <div></div>
                        <div></div>
                        <div></div>
                    </div>
                @endif
            </article>
        @endforeach
    @endif
@endsection
