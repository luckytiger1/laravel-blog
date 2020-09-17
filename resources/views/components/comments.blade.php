<div class="container">
    <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
            @forelse($comments as $comment)
                <div class="card mb-3">
                    <div class="card-body">
                        <h5 class="card-title font-weight-bold">{{ $comment->author->name }}</h5>
                        <p class="card-text">
                            {{ $comment->body }}
                        </p>
                    </div>
                </div>
            @empty
                <p>No comments yet!</p>
            @endforelse
        </div>
    </div>
</div>

