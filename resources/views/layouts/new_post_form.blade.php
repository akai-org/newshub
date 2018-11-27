<main class="nh-content">
<form method="POST" action="{{ route('store_post') }}">
        {{ csrf_field() }}
        <label for="title">Tytuł</label>
        <input type="text" value="{{ old('title') }}" name="title"><br/>
        @if ($errors->has('title'))
            <p class="help is-danger">{{ $errors->first('title') }}</p>
        @endif
        <label for="description">Opis</label>
        <textarea name="description" cols="30" rows="4">{{ old('description') }}</textarea><br/>
        @if ($errors->has('description'))
            <p class="help is-danger">{{ $errors->first('description') }}</p>
        @endif
        <label for="url">URL</label>
        <input type="text" name="url" value="{{ old('url') }}"><br/>
        @if ($errors->has('title'))
            <p class="help is-danger">{{ $errors->first('title') }}</p>
        @endif
        <input type="submit" value="Wyślij">
    </form>
</main>