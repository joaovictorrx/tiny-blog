<div class="form-group {{ $errors->has('title')?'has-error':'' }}">
  <label class="control-label" for="title">
    Título
  </label>
  <input id="title" name="title" type="text" class="form-control"
    value="{{ isset($post->title)?$post->title : old('title') }}" placeholder="Título" required>
  @if ($errors->has('title'))
  <span class="help-block">
    <strong>{{ $errors->first('title') }}</strong>
  </span>
  @endif
</div>

<div class="form-group {{ $errors->has('body')?'has-error':'' }}">
  <label class="control-label" for="body">
    Conteúdo
  </label>
  <textarea class="form-control" name="body" rows="3" placeholder=""
    spellcheck="false">{{ isset($post->body)?$post->body : old('name') }}</textarea>
  @if ($errors->has('nabodyme'))
  <span class="help-block">
    <strong>{{ $errors->first('body') }}</strong>
  </span>
  @endif
</div>

<div class="form-group {{ $errors->has('image')?'has-error':'' }}">
  <label class="control-label" for="image">
    URL da Imagem
  </label>
  <input id="image" name="image" type="url" class="form-control"
    value="{{ isset($post->image)?$post->image : old('image') }}" placeholder="URL da Imagem">
  @if ($errors->has('image'))
  <span class="help-block">
    <strong>{{ $errors->first('image') }}</strong>
  </span>
  @endif
</div>

<div class="form-group {{ $errors->has('author_id')?'has-error':'' }}">
  <label class="control-label" for="author_id">
    Autor
  </label>
  <select id="author_id" name="author_id" class="form-control select2" style="width: 100%;">
    <option value="">Selecione</option>
    @foreach($authors as $author)
    <option
      {{ isset($post)?$post->author->id == $author->id?'selected':'':( old('author_id') == $author->id )?'selected':'' }}
      value="{{ $author->id }}">{{ $author->name }}</option>
    @endforeach
  </select>
  @if ($errors->has('author_id'))
  <span class="help-block">
    <strong>{{ $errors->first('author_id') }}</strong>
  </span>
  @endif
</div>

<div class="form-group {{ $errors->has('tags')?'has-error':'' }}">
  <label class="control-label" for="tags">
    Tags
  </label>
  <select id="tags" name="tags[]" multiple="multiple" class="form-control select2" style="width: 100%;">
    <option value="">Selecione</option>
    @foreach($tags as $tag)
    <option
      {{ isset($post)?$post->tags->contains($tag)?'selected':'':( old('tags') == $tag->id )?'selected':'' }}
      value="{{ $tag->id }}">{{ $tag->name }}</option>
    @endforeach
  </select>
  @if ($errors->has('tags'))
  <span class="help-block">
    <strong>{{ $errors->first('tags') }}</strong>
  </span>
  @endif
</div>

<div class="form-group {{ $errors->has('published')?'has-error':'' }}">
  <label class="control-label" for="published">
    Status
  </label>
  <select id="published" name="published" class="form-control" style="width: 100%;" required>
    <option value="0" selected>Não Publicado</option>
    <option value="1">Publicado</option>
  </select>
  @if ($errors->has('published'))
  <span class="help-block">
    <strong>{{ $errors->first('published') }}</strong>
  </span>
  @endif
</div>

@section('js')
<script>
  $(document).ready(function() {
      $('.select2').select2();
    });
</script>
@endsection