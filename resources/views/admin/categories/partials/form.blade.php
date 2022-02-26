<label for="published">Статус</label>
<select name="published" class="form-control" required>
  @if (isset($category->id))
    <option value="0" @if ($category->published == 0) selected="" @endif>Не опубликовано</option>
    <option value="1" @if ($category->published == 1) selected="" @endif>Опубликовано</option>
  @else
    <option value="0">Не опубликовано</option>
    <option value="1">Опубликовано</option>
  @endif
</select>

<label for="title">Заголовок</label>
<input type="text" class="form-control" name="title" placeholder="Заголовок категории" value="{{$category->title ?? ""}}" required>

<label for="slug">Slug</label>
<input type="text" class="form-control" name="slug" placeholder="Автоматическая генерация" value="{{$category->slug ?? ""}}" readonly>

<label for="parent_id">Родительская категория</label>
<select name="parent_id" class="form-control">
  <option value="0">--- Без родительской категории ---</option>
  @include('admin.categories.partials.categories', ['categories' => $categories])
</select>

<input class="btn btn-primary" type="submit" value="Сохранить">
