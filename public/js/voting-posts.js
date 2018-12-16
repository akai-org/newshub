function votePost(slug, type) {
    $.ajax({
        type: 'post',
        url: '/post/' + slug + '/vote',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        data: {
            'type': type
        },
        success: function(response) {
            var plus_icon = $('#plus-' + slug + ' i');
            var minus_icon = $('#minus-' + slug + ' i');
            var plus_count = $('#plus-' + slug + ' .plus');
            var minus_count = $('#minus-' + slug + ' .minus');
            if (response.selected == 'plus') {
                plus_icon.css('color', 'black');
                minus_icon.css('color', '#b6a7a8');
            } else if (response.selected == 'minus') {
                minus_icon.css('color', 'black');
                plus_icon.css('color', '#b6a7a8');
            } else {
                minus_icon.css('color', '#b6a7a8');
                plus_icon.css('color', '#b6a7a8');
            }
            plus_count.html(response.plus);
            minus_count.html(response.minus);
        },
        error: function() {
            console.log('error');
        }
    });
}