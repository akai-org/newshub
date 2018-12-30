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
            var plus_icon = $('#'+slug).find('.plus');
            var minus_icon = $('#'+slug).find('.minus');
            var plus_count = $('#'+slug).find('.plus_count');
            var minus_count = $('#'+slug).find('.minus_count');
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