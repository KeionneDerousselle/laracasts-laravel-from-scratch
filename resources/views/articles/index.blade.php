@extends ('layout')

@section ('content')
<div id="wrapper">
    <div id="page" class="container">
      @forelse ($articles as $article)
          <div class="content">
            <div class="title">
              <h2>
                <a href="{{ route('articles.show', $article) }}">
                  {{ $article->title}}
                </a>
              </h2>
            </div>
            <p>
              <img src="/images/banner.jpg" alt=" "  class="image image-full">
            </p>
            {!! $article->excerpt !!}
          </div>
      @empty
          <p>No articles found!</p>
      @endforelse
    </div>
</div>
@endsection