@extends('layout')

@section('content')
<main class="nh-content">
    <form method="POST" action="/posts">
        {{ csrf_field() }}
        <label for="title">Tytuł</label>
        <input type="text" name="title"><br/>
        <label for="description">Opis</label>
        <textarea name="description" cols="30" rows="4"></textarea><br/>
        <label for="url">URL</label>
        <input type="text" name="url"><br/>
        <input type="submit" value="Wyślij">
    </form>
</main>
@endsection