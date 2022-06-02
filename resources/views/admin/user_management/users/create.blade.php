@extends('admin.layouts.app_admin')

@section('content')
<div class="container">
  @component('admin.components.breadcrumb')
    @slot('title') Создание пользователя @endslot
    @slot('parent') Главная @endslot
    @slot('active') Пользователь @endslot
  @endcomponent

  <hr>

  <form action="{{route('admin.user_management.user.store')}}" method="POST" class="form-horizontal">
    {{ csrf_field() }}

    @include('admin.user_management.users.partials.form')

  </form>
</div>
@endsection
