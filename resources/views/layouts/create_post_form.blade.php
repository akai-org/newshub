<section id="post-add">

  <form method="POST" action="{{ route('store_post') }}">
    {{ csrf_field() }}
    <div class="field is-horizontal">
      <div class="field-label is-normal">
        <label class="label">Nazwa tematu</label>
      </div>
      <div class="field-body">
        <div class="field">
          <p class="control is-expanded has-icons-left">

            <input class="input" type="text" value="{{ $new_post['title'] }}" placeholder="Nazwa Tematu" name="title">

            <span class="icon is-small is-left">
              <i class="fas fa-chalkboard"></i>
            </span>
          </p>
          @if ($errors->has('title'))
          <p class="help is-danger">{{ $errors->first('title') }}</p>
          @endif
        </div>

      </div>
    </div>
    <div class="field is-horizontal">
      <div class="field-label is-normal">
        <label class="label">Wybierz obraz</label>
      </div>
      <div class="field-body">
        <div class="field is-narrow">
          <select name="image" class="image-picker show-html">
            @foreach ($new_post['images'] as $key => $image)
              <option data-img-src='{{ $image['url'] }}' data-img-class="image-resize" value='{{ $key }}'>
            @endforeach
          </select>
        </div>
      </div>
    </div>

    <div class="field is-horizontal">
      <div class="field-label is-normal">
        <label class="label">Opis</label>
      </div>
      <div class="field-body">
        <div class="field">
          <div class="control">
            <textarea class="textarea" placeholder="Opisz co ci tam w duszy gra" name="description">{{ $new_post['description'] }}</textarea>
          </div>
          @if ($errors->has('description'))
          <p class="help is-danger">{{ $errors->first('description') }}</p>
          @endif
        </div>
      </div>
    </div>

    <div class="field is-horizontal">
      <div class="field-label">

      </div>
      <div class="field-body">
        <div class="field">
          <div class="control">
            <button type="submit" class="button is-primary">
              Dodaj
            </button>
          </div>
        </div>
      </div>
    </div>
  </form>
</section>
<script>
  $("select").imagepicker();
</script>