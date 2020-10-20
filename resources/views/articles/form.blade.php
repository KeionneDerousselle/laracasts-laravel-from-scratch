<h2>{{$title}}</h2>
<form method="POST" action="{{$action}}">
  @csrf
  @method($method)

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
      value="{{$errors->first('title') ? old('title') : $article->title}}">
      @error('title')
        <p class="help is-danger">{{$errors->first('title')}}</p>
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
        class="@error('excerpt') is-danger @enderror"
      >{{$errors->first('excerpt') ? old('excerpt') : $article->excerpt}}</textarea>
      @error('excerpt')
        <p class="help is-danger">
          {{$errors->first('excerpt')}}
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
        class="@error('body') is-danger @enderror"
      >{{$errors->first('body') ? old('body') : $article->body}}</textarea>
      @error('body')
        <p class="help is-danger">
          {{$errors->first('body')}}
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