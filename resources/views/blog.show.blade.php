<div>
    <h1>{{ $post->title }}</h1>
    <p>{{ $post->body }}</p>
</div>

<div>
    <h2>Comentarios:</h2>
    <ul>
        @foreach ($post->comments as $comment)
            <li>{{ $comment->body }}</li>
        @endforeach
    </ul>
</div>

<div>
    <h2>Añadir comentario:</h2>
    <form method="POST" action="{{ route('comments.store') }}">
        @csrf
        <input type="hidden" name="post_id" value="{{ $post->id }}">
        <textarea name="body"></textarea>
        <button type="submit">Enviar</button>
    </form>
</div>
