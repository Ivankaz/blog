@extends('admin.layouts.app_admin')

@section('content')

<div class="container">
  @component('admin.components.breadcrumb')
    @slot('title') Список пользователей @endslot
    @slot('parent') Главная @endslot
    @slot('active') Пользователи @endslot
  @endcomponent

  <hr>

  <a href="{{route('admin.user_management.user.create')}}" class="btn btn-primary float-end">
    <i class="fa fa-plus"></i>
    Создать пользователя
  </a>

  <table class="table">
    <thead>
      <th>Имя</th>
      <th>Email</th>
      <th class="text-right">Действие</th>
    </thead>
    <tbody>
      @forelse ($users as $user)
        <tr>
          <td>{{$user->name}}</td>
          <td>{{$user->email}}</td>
          <td class="float-end">
            <form class="form-horizontal" onsubmit="return confirm('Удалить пользователя?')" action="{{route('admin.user_management.user.destroy', $user)}}" method="post">
              @method('DELETE')
              @csrf

              <a class="btn btn-outline-dark" href="{{route('admin.user_management.user.edit', $user)}}"><i class="fa fa-edit"></i></a>
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
            {{$users->links()}}
          </ul>
        </td>
      </tr>
    </tfoot>
  </table>
</div>

@endsection
