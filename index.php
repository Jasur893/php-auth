<!doctype html>
<html lang="кг">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <title>Форма Регистрации</title>
</head>
<body>
    <div class="container mt-4">
        <?php if(isset($_COOKIE['user'])): ?>
            <p>Привет <?=$_COOKIE['user'] ?? null ?>. Чтобы выйти нажмите <a href="/exit.php">Здесь.</a></p>
        <?php else: ?>
            <div class="row">
                <div class="col">
                    <h1>Форма Регистрации</h1>
                    <form action="validation-form/check.php" method="POST">
                        <input type="text" name="login" class="form-control" id="login" placeholder="Введите логин"><br>
                        <input type="text" name="name" class="form-control" id="name" placeholder="Введите имя"><br>
                        <input type="password" name="pass" class="form-control" id="pass" placeholder="Введите парол"><br>
                        <button type="submit" class="btn btn-success">Зарегистрировать</button>
                    </form>
                </div>

                <div class="col">
                    <h1>Форма Авторизации</h1>
                    <form action="validation-form/auth.php" method="POST">
                        <input type="text" name="login" class="form-control" id="login" placeholder="Введите логин"><br>
                        <input type="password" name="pass" class="form-control" id="pass" placeholder="Введите парол"><br>
                        <button type="submit" class="btn btn-success">Авторизоваться</button>
                    </form>
                </div>
            </div>
        <?php endif; ?>
    </div>
</body>
</html>
