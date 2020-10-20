@foreach ($conversation->replies as $reply)
    <div>
      <header class="d-flex justify-content-between">
        <p>
          <strong class="{{ $reply->isBest() ? 'text-info' : 'text-body'}}">{{ $reply->user->name }} said...</strong>
        </p>
        {{-- This might have an N+1 database problem since the isBest function references the conversation which will ultimately make a call to the database. I wouldn't use this in production. i'd make a helper function that compared the conversation and the reply --}}
        @if($reply->isBest())
          <span class="text-info">Best Reply</span>
        @endif
      </header>
      {{ $reply->body }}
      @can ('update', $conversation)
        <form method="POST" action="{{ route('conversations.update', $conversation) }}">
          @csrf
          @method('PATCH')
          <input type="hidden" name="replyId" value="{{$reply->id}}">
          <button type="submit" class="btn p-0 text-info">Set as Best Reply</button>
        </form>
      @endcan
    </div>
    @continue($loop->last)
    <hr>
@endforeach
