function upVotePost(slug) {
    $.ajax({
        type: 'post',
        url: '/post/' + slug + '/vote',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        data: {
            'type': 'plus'
        },
        success: function(comment) {
            var count = $('#up' + slug).html('hahaha');
            $('#up' + slug).html(count+1);
        },
        error: function() {
            console.log('error');
        }
    });
}