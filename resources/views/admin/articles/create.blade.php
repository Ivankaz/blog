@extends('admin.layouts.app_admin')

@section('content')
<div class="container">
  @component('admin.components.breadcrumb')
    @slot('title') Создание статьи @endslot
    @slot('parent') Главная @endslot
    @slot('active') Статьи @endslot
  @endcomponent

  <hr>

  <form action="{{route('admin.article.store')}}" method="POST" class="form-horizontal">
    {{ csrf_field() }}

    @include('admin.articles.partials.form')

    <input type="hidden" name="created_by" value="{{Auth::id()}}">
  </form>
</div>
@endsection
