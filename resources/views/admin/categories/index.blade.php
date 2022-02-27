@extends('admin.layouts.app_admin')

@section('content')

<div class="container">
  @component('admin.components.breadcrumb')
    @slot('title') Список категорий @endslot
    @slot('parent') Главная @endslot
    @slot('active') Категория @endslot
  @endcomponent

  <hr>

  <a href="{{route('admin.category.create')}}" class="btn btn-primary float-end">
    <i class="fa fa-plus"></i>
    Создать категорию
  </a>

  <table class="table">
    <thead>
      <th>Наименование</th>
      <th>Публикация</th>
      <th class="text-right">Действие</th>
    </thead>
    <tbody>
      @forelse ($categories as $category)
        <tr>
          <td>{{$category->title}}</td>
          <td>{{$category->published}}</td>
          <td class="float-end">
            <form class="form-horizontal" onsubmit="return confirm('Удалить категорию?')" action="{{route('admin.category.destroy', $category)}}" method="post">
              @method('DELETE')
              @csrf

              <a class="btn btn-outline-dark" href="{{route('admin.category.edit', $category)}}"><i class="fa fa-edit"></i></a>
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
            {{$categories->links()}}
          </ul>
        </td>
      </tr>
    </tfoot>
  </table>
</div>

@endsection
