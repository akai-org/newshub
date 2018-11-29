

       
        
      
        
        
       



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
      
          <input class="input" type="text" value="{{ old('title') }}" placeholder="Nazwa Tematu" name="title">
         
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
      <label class="label">Kategoria</label>
    </div>
    <div class="field-body">
      <div class="field is-narrow">
        <div class="control">
  
          <div class="select is-fullwidth">
            <select>
              
              <option>Kraj</option>
              <option>Polityka</option>
              <option>Oszustwo</option>
            </select>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="field is-horizontal">
    <div class="field-label is-normal">
      <label class="label">wgraj obrazek</label>
    </div>
    <div class="field-body">
      <div class="field is-narrow">
  
  <div class="file has-name is-fullwidth">
    <label class="file-label">
      <input class="file-input" type="file" name="resume">
      <span class="file-cta">
        <span class="file-icon">
          <i class="fas fa-upload"></i>
        </span>
        <span class="file-label">
          Wybierz obrazek…
        </span>
      </span>
      <span class="file-name">
       nazwa_obrazka.png (musi obslugiwac kod w js)
      </span>
    </label>
  </div>
  
  </div>
  </div>
  </div>
  
  
  
  <div class="field is-horizontal">
    <div class="field-label is-normal">
      <label class="label">Podaj link</label>
    </div>
    <div class="field-body">
      <div class="field">
        <div class="control">
           <p class="control is-expanded has-icons-left">
         
            <input type="text" class="input" placeholder="link" name="url" value="{{ old('url') }}"><br/>
        
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
    <div class="field-label is-normal">
      <label class="label">Opis</label>
    </div>
    <div class="field-body">
      <div class="field">
        <div class="control">
          <textarea class="textarea" placeholder="Opisz co ci tam w duszy gra" name="description">{{ old('description') }}</textarea>
        
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