<!-- why section -->
<section class="why_section layout_padding">
    <div class="container">

        <div class="row">
            <div class="col-lg-8 offset-lg-2">
                <div class="full">
                    <div class="comment">
                        <h3>Comments</h3>
                    </div>
                    <form action="{{route('add.comment')}}" method="POST">
                        @csrf
                        <fieldset>
                            <textarea placeholder="Comment something here." name="comment" required></textarea>
                            <input type="submit" value="Comment" />
                        </fieldset>
                    </form>
                </div>
                <div class="reply">
                    <h3>All Comments</h3>
                    @foreach($comments as $comment)
                    <div>
                        <b>{{$comment->name}}</b>
                        <p>{{$comment->comment}}</p>
                        <a class="text-indigo-500" href="javascript:void(0)" onclick="reply(this)"
                        data-commentId="{{$comment->id}}">Reply</a>

                        @foreach($replies as $reply)
                            @if($reply->comment_id==$comment->id)
                                <div class="reply-section">
                                    <b>{{$reply->name}}</b>
                                    <p>{{$reply->reply}}</p>
                                    <a class="text-indigo-500" href="javascript:void(0)" onclick="reply(this)"
                                       data-commentId="{{$comment->id}}">Reply</a>
                                </div>
                            @endif
                        @endforeach
                    </div>
                    @endforeach
                    <div class="replyDiv" style="display: none">
                        <form action="{{route('add.reply')}}" method="POST">
                            @csrf
                            <input type="text" id="commentId" name="commentId" hidden>
                            <textarea name="reply" class="comment-box" placeholder="Write comment something here." required></textarea>
                            <br>
                            <button type="submit" class="btn btn-outline-info">Reply</button>
                            <a href="javascript:void(0)" onclick="reply_close(this)">Close</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- end why section -->
<script type="text/javascript">
    function reply(caller){
        document.getElementById('commentId').value=$(caller).attr('data-commentId');
        $('.replyDiv').insertAfter($(caller));
        $('.replyDiv').show();
    }

    function reply_close(caller){
        $('.replyDiv').hide();
    }
</script>
