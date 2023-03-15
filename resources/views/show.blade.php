@foreach ($comments as $comment)
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">{{ $comment->name }}</h5>
            <h6 class="card-subtitle mb-2 text-muted">{{ $comment->email }}</h6>
            <p class="card-text">{{ $comment->comment }}</p>
        </div>
    </div>
@endforeach
