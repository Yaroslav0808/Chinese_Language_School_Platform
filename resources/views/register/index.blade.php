<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="{{url('/css/style.css')}}">
    <title>Document</title>
</head>
<body>
  <header class="col-12 d-flex justify-content-between">
    <a class="header-title-auth--link" href="">Платформа для изучения <span style="font-weight:500">Китайского Языка</span></a>
</header>

<div class="container">
    <div class="card-register">
<div class="card mt-4 " >
    <div class="card-body p-0">
    <div class="card-register-header border-bottom  p-2">
      <h3 class="card-register-title text-center mb-0">Регистрация</h3>
    </div>

    <ul class="mb-0">
      @foreach($errors->all() as $message)
          <li>
              {{$message}}
          </li>
      @endforeach
  </ul>

    <div class="register-input p-2">
        <form method="POST" action="{{route('register.store')}}">
          @csrf
            <div class="mb-1">
                <label class="form-label-register mb-1">Имя</label>
                <input name="name" class="form-control" >
              </div>
            <div class="mb-1">
              <label class="form-label-register mb-1">Адрес эл. почты</label>
              <input type="email" name="email" class="form-control"  aria-describedby="emailHelp">
            </div>
            <div class="mb-1">
              <label class="form-label-register mb-1">Пароль</label>
              <input type="password" name="password" class="form-control" >
            </div>
            <div>
                <label class="form-label-register mb-1">Повторите пароль</label>
                <input type="password" class="form-control" name="password_confirmation">
              </div>
              <p class="open_link"><a href="{{route('login')}}">Войти</a></p>
            <button type="submit" class="btn btn-outline-primary w-100">Зарегистрироваться</button>
          </form>
    </div>
    
    </div>
  </div>
</div>
</div>
</body>
</html>