@extends('layouts.app')

@section('content')
  <div class="container">
    <h1>My Site</h1>
    <ul>
      @can('edit_forum')
        <li>
          <a href="#">Edit Forum</a>
        </li>
      @endcan
    </ul>
  </div>
@endsection