@extends ('layout')

@section ('content')
<div id="wrapper">
    <div id="page" class="container">
      @include('articles.form', [
        'title' => 'Edit Article',
        'method' => 'PUT', 
        'action' => route('articles.show', $article)
      ])
    </div>
</div>
@endsection