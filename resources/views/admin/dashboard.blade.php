@extends('admin.layouts.app_admin')

@section('content')
  <div class="container">
    <div class="row lead">
      <div class="col-sm-3">
        Категорий <span class="text-primary">0</span>
      </div>
      <div class="col-sm-3">
        Материалов <span class="text-danger">0</span>
      </div>
      <div class="col-sm-3">
        Посетителей за все время <span class="text-warning">0</span>
      </div>
      <div class="col-sm-3">
        Посетителей за сегодня <span class="text-info">0</span>
      </div>
    </div>

    <div class="row">
      <div class="col-sm-6 d-grid gap-2">
        <a class="btn btn-info" href="{{route('admin.category.create')}}">Создать категорию</a>
        <a class="list-group-item" href="#">
          <h4 class="list-group-item-heading">Категория первая</h4>
          <p class="list-group-item-text">
            Кол-во материалов
          </p>
        </a>
      </div>
      <div class="col-sm-6 d-grid gap-2">
        <a class="btn btn-info" href="#">Создать материал</a>
        <a class="list-group-item" href="#">
          <h4 class="list-group-item-heading">Материал первый</h4>
          <p class="list-group-item-text">
            Категория
          </p>
        </a>
      </div>
    </div>
  </div>
@endsection
