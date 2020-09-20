<div class="container">
    <div class="col-lg-8 col-md-10 mx-auto">
        <hr>
        <form action="/comments" method="POST" id="comment-form">
            @csrf
            @honeypot
            <div class="form-group">
                <label for="body" class="text-uppercase font-weight-bold">Leave a comment</label>
                <textarea class="form-control" id="body" name="body" rows="3"></textarea>
                @error('body')
                <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <input type="hidden" name="article_id" id="article_id" value="{{ $article->id }}">
            <button type="submit" class="btn btn-primary" id="comment-submit">Post Comment</button>
        </form>
    </div>
</div>
