function deletePost(slug) {
    Swal({
        title: 'Czy na pewno chcesz usunąć wpis?',
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Tak, usuń post'
    }).then((result) => {
        if (result.value) {
            $.ajax({
                type: 'delete',
                url: '/post/' + slug,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(data) {
                    Swal(
                        'Usunięto!',
                        'Wpis został usunięty.',
                        'success'
                    );
                    $('#'+slug).hide();
                },
                error: function(error) {
                    console.log(error);
                    Swal(
                        'Błąd!',
                        'Nie udało się usunąć wpisu.',
                        'error'
                    )
                }
            });
        }
    });
}