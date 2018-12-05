<section id="post-comments">
</section>
<script>
moment.locale('pl');
$('#post-comments').comments({
    @if (Auth::check())
        profilePictureURL: '{{ Auth::user()->image }}',
    @else 
        readOnly: true,
    @endif
    enableHashtags: true,
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
        var commentsArray = [
            {!! $post->jquery_comments() !!}
        ];
        success(commentsArray);
    }
});

</script>