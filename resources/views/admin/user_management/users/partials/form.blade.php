@if($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
        </ul>
    </div>
@endif

<label for="name">Имя</label>
<input type="text" class="form-control" name="name" placeholder="Имя" value="@if(old('name')) {{old('name')}} @else {{$user->name ?? ""}} @endif" required>

<label for="email">Email</label>
<input type="text" class="form-control" name="email" placeholder="Email" value="@if(old('email')) {{old('email')}} @else {{$user->email ?? ""}} @endif" required>

<label for="password">Пароль</label>
<input type="password" class="form-control" name="password" placeholder="Пароль" @if(Route::is('admin.user_management.user.create')) required @endif>

<label for="password_confirmation">Подтверждение пароля</label>
<input type="password" class="form-control" name="password_confirmation" placeholder="Подтверждение пароля" @if(Route::is('admin.user_management.user.create')) required @endif>

<input class="btn btn-primary" type="submit" value="Сохранить">
