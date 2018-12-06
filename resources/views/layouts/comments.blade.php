<section id="post-comments">
</section>
<script>
moment.locale('pl');
$('#post-comments').comments({
    @if (Auth::check())
        profilePictureURL: '{{ Auth::user()->image }}',
        @if (Auth::user()->is_admin)
            currentUserIsAdmin: true,
        @endif
    @else 
        readOnly: true,
    @endif
    enableHashtags: true,
    enablePinging: true,
    textareaPlaceholderText: 'Napisz komentarz',
    newestText: 'Najnowsze',
    oldestText: 'Najstarsze',
    popularText: 'Najlepsze', 
    attachmentsText: 'Pokaż załączniki',
    sendText: 'Zatwierdź',
    replyText: 'Odpowiedź',
    editText: 'Edytuj',
    editedText: 'Zmodyfikowany',
    youText: 'Ty',
    saveText: 'Zapisz',
    deleteText: 'Kasuj',
    viewAllRepliesText: 'Pokaż wszystkie odpowiedzi (__replyCount__)',
    hideRepliesText: 'Ukryj',
    noCommentsText: 'Brak komentarzy',
    noAttachmentsText: 'Brak załączników',
    attachmentDropText: 'Upuść tutaj',
    timeFormatter: function(time) {
        return moment(time).fromNow();
    },
    getComments: function(success, error) {
        $.ajax({
            type: 'get',
            url: '{{ route("post_comments", ['post' => $post->slug]) }}',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function(commentsArray) {
                success(commentsArray)
            },
            error: error
        });
    },
    getUsers: function(success, error) {
        $.ajax({
            type: 'get',
            url: '{{ route("users") }}',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function(userArray) {
                success(userArray)
            },
            error: error
        });
    },
    postComment: function(commentJSON, success, error) {
        $.ajax({
            type: 'post',
            url: '{{ route("new_comment", ['post' => $post->slug]) }}',
            data: commentJSON,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function(comment) {
                success(comment)
            },
            error: error
        });
    },
    putComment: function(commentJSON, success, error) {
        $.ajax({
            type: 'put',
            url: '/comment/' + commentJSON.id,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: commentJSON,
            success: function(comment) {
                success(comment)
            },
            error: error
        });
    },
    deleteComment: function(commentJSON, success, error) {
        $.ajax({
            type: 'delete',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: '/comment/' + commentJSON.id,
            success: success,
            error: error
        });
    }
});

</script>