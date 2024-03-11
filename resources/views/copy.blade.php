@foreach ($oldPosts as $oldPost)
    <!-- Existing post content -->

    <!-- Comment section -->
    <div id="comment_section">
        @if ($oldPost->comments)
            @foreach ($oldPost->comments as $comment)
                <div class="comment">
                    <strong>{{ $comment->sender }}</strong>: {{ $comment->comment }}
                    
                    <!-- Reply Form -->
                    <form method="POST" action="{{ route('post_comment', ['post_id' => $oldPost->postid]) }}">
                        @csrf
                        <input type="hidden" name="commentId" value="{{ $comment->id }}">
                        <input type="text" name="comment" placeholder="Write a reply...">
                        <input type="submit" value="Reply">
                    </form>

                    <!-- Display replies -->
                    @foreach ($comment->replies as $reply)
                        <div class="reply">
                            <strong>{{ $reply->sender }}</strong>: {{ $reply->comment }}
                        </div>
                    @endforeach
                </div>
            @endforeach
        @endif

        <!-- Comment Form -->
        <form method="POST" action="{{ route('post_comment', ['post_id' => $oldPost->postid]) }}">
            @csrf
            <input type="hidden" name="commentId" value="0">
            <input type="text" name="comment" placeholder="Write a comment...">
            <input type="submit" value="Post">
        </form>
    </div>

    <!-- Existing post content -->
@endforeach
