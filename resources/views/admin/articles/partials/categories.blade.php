@foreach ($categories as $category)
<option value="{{$category->id ?? ""}}"
  @isset ($article->id)
    @foreach ($article->categories as $articleCategory)
      @if ($articleCategory->id == $category->id)
        selected=""
      @endif
    @endforeach
  @endisset
  >
  {!! $delimiter ?? "" !!}{{$category->title ?? ""}}

  @if (count($category->children) > 0)
    @include('admin.articles.partials.categories', [
      'categories' => $category->children,
      'delimiter' => ' - '.$delimiter
    ])
  @endif
</option>
@endforeach
