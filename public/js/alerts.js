function deletePost(slug) {
    Swal({
        title: 'Czy na pewno chcesz usunąć wpis?',
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#d33',
        cancelButtonColor: '#b6a7a8',
        confirmButtonText: 'Tak, usuń wpis',
        cancelButtonText: 'Anuluj'
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

async function editPost(slug, is_admin) {
    var title = $('#'+slug).find('.post_title').html();
    var description = $('#'+slug).find('.post_descripion').html();
    var image = $('#'+slug).find('.post_image').attr('src');
    var url = $('#'+slug).find('.post_url').attr('href');
    if (url==undefined) {
        url = $('#'+slug).find('.post_title').attr('href');
    }
    let admin_inputs = '';
    if (is_admin) {
        admin_inputs = '<h2 id="swal2-title" style="display: flex;">Link</h2>' +
        `<input id="url" class="swal2-input" value='${url}'>` +
        '<h2 id="swal2-title" style="display: flex;">Obraz</h2>' +
        `<input id="image" class="swal2-input" value='${image}'>`;
    }
    const {value: formValues} = await Swal({
        title: 'Edytuj wpis',
        width: 800,
        showCancelButton: true,
        html:
          '<h2 id="title" style="display: flex;">Tytuł</h2>' +
          `<input id="swal-input1" class="swal2-input" value='${title}'>` +
          '<h2 id="description" style="display: flex;">Opis</h2>' +
          `<textarea aria-label="Tutaj wpisz opis" class="swal2-textarea" style="display: flex;" placeholder="Tutaj wpisz opis">${description}</textarea>` +
          admin_inputs,
        focusConfirm: false,
        preConfirm: () => {
          return [
            document.getElementById('swal-input1').value,
            document.getElementById('swal-input2').value
          ]
        }
      });
      
      if (formValues) {
        Swal(json.stringify(formValues))
      }
}