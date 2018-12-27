<section id="post-add">

  <form method="POST" action="{{ route('new_post') }}">
    {{ csrf_field() }}
    <div class="field is-horizontal">
      <div class="field-label is-normal">
        <label class="label">Podaj link</label>
      </div>
      <div class="field-body">
        <div class="field">
          <div class="control">
            <p class="control is-expanded has-icons-left">

              <input type="text" class="input" placeholder="link" name="url" value="{{ old('url') }}"><br />

              <span class="icon is-small is-left">
                <i class="fas fa-link"></i>
              </span>
            </p>
            @if ($errors->has('url'))
            <p class="help is-danger">{{ $errors->first('url') }}</p>
            @endif
          </div>

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