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
        <article>
          <div class="thumbnail"><a href="#"><img src="https://www.wykop.pl/cdn/c3397993/link_UWK5HvcfB5AHW0K6ZxQybcPiyuwrlvEe,w207h139.jpg"></a></div>
          <div class="content">
            <h2><a href="#">Title of the content</a></h2>
            <span>Autor: Pawel - 43 komentarze - opublikowano 40 min temu</span>
            <p>Alias sit dicta animi ipsa quis eum quaerat. Tempore vel voluptatem fuga porro exercitationem inventore
              omnis doloribus.</p>
          </div>
          <div class="feedback">
            <a href="#"><i class="fas fa-plus-circle fa-2x"></i></a>72
            <a href="#"><i class="fas fa-minus-circle fa-2x"></i></a>14
          </div>
        </article>

        <article>
          <div class="thumbnail"><a href="#"><img src="https://www.wykop.pl/cdn/c3397993/link_UWK5HvcfB5AHW0K6ZxQybcPiyuwrlvEe,w207h139.jpg"></a></div>
          <div class="content">
            <h2><a href="#">Title of the content</a></h2>
            <span>Autor: Pawel - 43 komentarze - opublikowano 40 min temu</span>
            <p>Alias sit dicta animi ipsa quis eum quaerat. Tempore vel voluptatem fuga porro exercitationem inventore
              omnis doloribus.</p>
          </div>
          <div class="feedback">
            <a href="#"><i class="fas fa-plus-circle fa-2x"></i></a>72
            <a href="#"><i class="fas fa-minus-circle fa-2x"></i></a>14
          </div>
        </article>

        <article>
          <div class="thumbnail"><a href="#"><img src="https://www.wykop.pl/cdn/c3397993/link_UWK5HvcfB5AHW0K6ZxQybcPiyuwrlvEe,w207h139.jpg"></a></div>
          <div class="content">
            <h2><a href="#">Title of the content</a></h2>
            <span>Autor: Pawel - 43 komentarze - opublikowano 40 min temu</span>
            <p>Alias sit dicta animi ipsa quis eum quaerat. Tempore vel voluptatem fuga porro exercitationem inventore
              omnis doloribus.</p>
          </div>
          <div class="feedback">
            <a href="#"><i class="fas fa-plus-circle fa-2x"></i></a>72
            <a href="#"><i class="fas fa-minus-circle fa-2x"></i></a>14
          </div>
        </article>

      </div>
@endsection