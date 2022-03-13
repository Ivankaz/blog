@extends('admin.layouts.app_admin')

@section('content')

<div class="container">
  @component('admin.components.breadcrumb')
    @slot('title') Список статей @endslot
    @slot('parent') Главная @endslot
    @slot('active') Статьи @endslot
  @endcomponent

  <hr>

  <a href="{{route('admin.article.create')}}" class="btn btn-primary float-end">
    <i class="fa fa-plus"></i>
    Создать статью
  </a>

  <table class="table">
    <thead>
      <th>Наименование</th>
      <th>Публикация</th>
      <th class="text-right">Действие</th>
    </thead>
    <tbody>
      @forelse ($articles as $article)
        <tr>
          <td>{{$article->title}}</td>
          <td>{{$article->published}}</td>
          <td class="float-end">
            <form class="form-horizontal" onsubmit="return confirm('Удалить статью?')" action="{{route('admin.article.destroy', $article)}}" method="post">
              @method('DELETE')
              @csrf

              <a class="btn btn-outline-dark" href="{{route('admin.article.edit', $article)}}"><i class="fa fa-edit"></i></a>
              <button class="btn btn-outline-danger" type="submit" name="button"><i class="fa fa-trash"></i></button>
            </form>
          </td>
        </tr>
      @empty
        <tr>
          <td colspan="3" class="text-center"><h2>Данные отсутствуют</h2></td>
        </tr>
      @endforelse
    </tbody>
    <tfoot>
      <tr>
        <td colspan="3">
          <ul class="pagination float-end">
            {{$articles->links()}}
          </ul>
        </td>
      </tr>
    </tfoot>
  </table>
</div>

@endsection
