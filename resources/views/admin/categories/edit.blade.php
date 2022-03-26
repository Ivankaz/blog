@extends('admin.layouts.app_admin')

@section('content')
<div class="container">
  @component('admin.components.breadcrumb')
    @slot('title') Редактирование категории @endslot
    @slot('parent') Главная @endslot
    @slot('active') Категории @endslot
  @endcomponent

  <hr>

  <form action="{{route('admin.category.update', $category)}}" method="POST" class="form-horizontal">
    @method('PUT')
    {{ csrf_field() }}

    @include('admin.categories.partials.form')

    <input type="hidden" name="modified_by" value="{{Auth::id()}}">
  </form>
</div>
@endsection
