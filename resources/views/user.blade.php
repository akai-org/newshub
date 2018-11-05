@extends('layout')

@section('content')
<div class="nh-user">
        <div class="user-background">
        </div>
        <div class="user-avatar">
          <img src="https://ivegotaproblemblog.files.wordpress.com/2012/07/386px-tux-g2-svg1.png">
        </div>
        <div class="user-description">
          <h2>Paweł Wiczyński</h2>
          <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
          <div class="nh-navbar-list">
            <div class="nh-navbar-item-extra">Wpisy (7)</div>
            <div class="nh-navbar-item-extra">Komentarze (42)</div>
            <div class="nh-navbar-item-extra">Plusy (328)</div>
          </div>
        </div>
        <div class="user-options">
          <a href="#">
            <div class="button"><i class="button-icon fas fa-user-plus"></i>Dodaj</div>
          </a>
          <a href="#">
            <div class="button"><i class="button-icon fas fa-user-tag"></i>Zgłoś</div>
          </a>
        </div>
      </div>
      <div class="nh-content">
        <!-- Articles -->
      </div>
@endsection