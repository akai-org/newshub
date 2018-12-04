<section id="post-comments">
</section>
<script>
$('#post-comments').comments({
    @if (Auth::check())
        profilePictureURL: '{{ Auth::user()->image }}',
    @else 
        readOnly: true,
    @endif
    getComments: function(success, error) {
        var commentsArray = [
            {!! $post->jquery_comments() !!}
        ];
        success(commentsArray);
    }
});

</script>