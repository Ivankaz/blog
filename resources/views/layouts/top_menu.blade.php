@foreach ($categories as $category)
  @if ($category->children->where('published', 1)->count())
    <li class="nav-item dropdown">
        <a href="{{url("/blog/category/$category->slug")}}" class="nav-link dropdown-toggle" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            {{$category->title}}
        </a>

        <ul class="dropdown-menu dropdown-menu-end">
            @include('layouts.top_menu', ['categories' => $category->children])
        </ul>
    </li>
  @else
    <li class="nav-item">
      <a href="{{url("/blog/category/$category->slug")}}" class="nav-link">
          {{$category->title}}
      </a>
    </li>
  @endif
@endforeach
