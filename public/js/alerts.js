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

function editPost(slug, is_admin) {
    var steps = ['1', '2', '3'];
    var admin_array = [];
    if (is_admin) {
        steps = ['1', '2', '3', '4', '5'];
        admin_array = [
        {
            title: 'Adres URL',
            text: 'Podaj adres URL wpisu',
            inputValue: $('#'+slug).find('.post_url').attr('href'),
        },
        {
            title: 'Adres obrazka',
            text: 'Podaj adres obrazka',
            inputValue: $('#'+slug).find('.post_image').attr('src'),
        }];
    }
    Swal.mixin({
        input: 'text',
        confirmButtonText: 'Dalej &rarr;',
        showCancelButton: true,
        progressSteps: steps
      }).queue([
        {
            title: 'Tytuł',
            text: 'Podaj tytuł wpisu',
            inputValue: $('#'+slug).find('.post_title').html(),
        },
        {
            title: 'Opis',
            text: 'Podaj opis wpisu',
            inputValue: $('#'+slug).find('.post_descripion').html(),
        },
      ].concat(admin_array)).then((result) => {
        console.log(result);
        if (result.value) {
            var input_url = null;
            var input_image = null;
            if (is_admin) {
                input_url = result.value[2];
                input_image = result.value[3];
            }
            console.log(result.value);
            $.ajax({
                type: 'put',
                url: '/post/' + slug,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: {
                    title: result.value[0], 
                    description: result.value[1], 
                    url: result.value[2], 
                    image: result.value[3], 
                },
                success: function(data) {
                    Swal(
                        'Zaktualizowano!',
                        'Wpis został zaktualizowany.',
                        'success'
                    );
                    //$('#'+slug).hide();
                    console.log(data);
                },
                error: function(error) {
                    console.log(error);
                    Swal(
                        'Błąd!',
                        'Nie udało się zaktualizować wpisu.',
                        'error'
                    )
                }
            });
        }
      })
}

/*
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
    } else {
        admin_inputs = `<input type="hidden" id="url" value='${url}'>` +
        `<input type="hidden" id="image" value='${image}'>`;
    }
    const {value: formValues} = await Swal({
        title: 'Edytuj wpis',
        width: 800,
        showCancelButton: true,
        html:
          '<h2 style="display: flex;">Tytuł</h2>' +
          `<input id="title" class="swal2-input" value='${title}'>` +
          '<h2 style="display: flex;">Opis</h2>' +
          `<textarea aria-label="Tutaj wpisz opis" id="description" class="swal2-textarea" style="display: flex;" placeholder="Tutaj wpisz opis">${description}</textarea>` +
          admin_inputs,
        focusConfirm: false,
        preConfirm: () => {
          return [
            document.getElementById('title').value,
            document.getElementById('description').value,
            document.getElementById('url').value,
            document.getElementById('image').value,
          ];
        }
      });
      
      if (formValues) {
        Swal(JSON.stringify(formValues)).then((result) => {
            console.log(result);
        });
      }
}
*/