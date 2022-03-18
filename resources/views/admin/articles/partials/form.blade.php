<label for="published">Статус</label>
<select name="published" class="form-control" required>
  @if (isset($article->id))
    <option value="0" @if ($article->published == 0) selected="" @endif>Не опубликовано</option>
    <option value="1" @if ($article->published == 1) selected="" @endif>Опубликовано</option>
  @else
    <option value="0">Не опубликовано</option>
    <option value="1">Опубликовано</option>
  @endif
</select>

<label for="title">Заголовок</label>
<input type="text" class="form-control" name="title" placeholder="Заголовок статьи" value="{{$article->title ?? ""}}" required>

<label for="slug">Slug</label>
<input type="text" class="form-control" name="slug" placeholder="Автоматическая генерация" value="{{$article->slug ?? ""}}" readonly>

<label for="categories[]">Категория</label>
<select name="categories[]" class="form-control" multiple="">
  <option value="0">--- Без родительской категории ---</option>
  @include('admin.articles.partials.categories', ['categories' => $categories])
</select>

<label for="description_short">Краткое описание</label>
<textarea name="description_short" class="form-control" id="description_short" rows="8" cols="80">{{$article->description_short ?? ""}}</textarea>

<label for="description">Описание</label>
<textarea name="description" class="form-control" id="description" rows="8" cols="80">{{$article->description ?? ""}}</textarea>

<label for="meta_title">Мета-заголовок</label>
<input type="text" class="form-control" name="meta_title" value="{{$article->meta_title ?? ""}}">

<label for="meta_description">Мета-описание</label>
<input type="text" class="form-control" name="meta_description" value="{{$article->meta_description ?? ""}}">

<label for="meta_keywords">Ключевые слова</label>
<input type="text" class="form-control" name="meta_keywords" value="{{$article->meta_keywords ?? ""}}">

<input class="btn btn-primary" type="submit" value="Сохранить">
