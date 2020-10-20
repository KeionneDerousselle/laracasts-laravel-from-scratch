@extends ('layout')

@section ('content')
<div id="wrapper">
    <div id="page" class="container">
      <h2>New Article</h2>
      <form method="POST" action="/articles">
        @csrf
        <div class="field">
          <label 
            for="title" 
            class="label">
            Title
          </label>
          <div class="control">
          <input 
            type="text"
            name="title"
            id="title"
            class="@error('title') is-danger @enderror"
            value="{{ old('title') }}">
            @error('title')
              <p class="help is-danger">{{ $errors->first('title')}}</p>
            @enderror
          </div>
        </div>

        <div class="field">
          <label 
            for="excerpt"
            class="label">
            Excerpt
          </label>
          <div class="control">
            <textarea 
              name="excerpt" 
              id="excerpt" 
              cols="30" 
              rows="10"
              class="@error('excerpt') is-danger @enderror">
              {{ old('excerpt') }}
            </textarea>
            @error('excerpt')
              <p class="help is-danger">
                {{ $errors->first('excerpt')}}
              </p>
            @enderror
          </div>
        </div>

        <div class="field">
          <label
            for="body"
            class="label">
            Body
          </label>
          <div class="control">
            <textarea
              name="body"
              id="body"
              cols="30"
              rows="10"
              class="@error('body') is-danger @enderror">
              {{ old('body') }}
            </textarea>
            @error('body')
              <p class="help is-danger">
                {{ $errors->first('body')}}
              </p>
            @enderror
          </div>
        </div>

        <div class="field">
          <label
            for="body"
            class="label">
            Tags
          </label>
          <div class="control">
            <select
              name="tags[]"
              id="tags"
              multiple>
              @foreach ($tags as $tag)
                <option value="{{ $tag->id }}">{{ $tag->name }}</option>
              @endforeach
            </select>
            @error('tags')
              <p class="help is-danger">
                {{ $message }}
              </p>
            @enderror
          </div>
        </div>


        <div class="field is-grouped">
          <div class="control">
            <button class="button is-link" type="submit">Submit</button>
          </div>
        </div>
      </form>
    </div>
</div>
@endsection