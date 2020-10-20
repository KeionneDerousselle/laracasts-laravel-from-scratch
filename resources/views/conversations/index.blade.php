@extends('layouts.app')

@section('content')
<div class="container">
  @foreach($conversations as $conversation)
    <h3>
      <a href="{{ route('conversations.show', $conversation) }}">{{ $conversation->title }}</a>
    </h3>
    @continue($loop->last)
    <hr>
  @endforeach
</div>
@endsection