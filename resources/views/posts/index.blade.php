@extends('template')

@section('content')
    <div>
        <h1>Artigos</h1>

        <ul>
            @foreach ($posts as $post)
                <li>
                    <div class="grid">
                        <div>
                            <a class="contrast" href="{{ route('post.show', ['post' => $post->id]) }}">
                                {{ $post->title }}
                            </a>

                        </div>
                        @if (Auth::user() == $post->user()->first())
                            <div>
                                <mark>
                                    <a class="secondary" href="{{ route('post.edit', ['post' => $post->id]) }}">
                                        Editar
                                    </a>
                                </mark> |
                            </div>
                            <div>
                                <form action="{{ route('post.destroy', ['post' => $post->id]) }}" method="post">
                                    @csrf
                                    @method('delete')
                                    <button class="outline secondary" type="submit">Apagar</button>
                                </form>
                            </div>
                        @endif
                    </div>

                </li>
            @endforeach
        </ul>
    </div>

    <a class="contrast" href="{{ route('post.create') }}">Criar novo artigo</a>
@endsection
