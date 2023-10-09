<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sidebar с Footer</title>
    <!-- Подключите Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar -->
            <nav id="sidebar" class="col-md-3 col-lg-2 d-md-block bg-light sidebar">
                <!-- Лого и заголовок -->
                <div class="position-sticky">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link active" href="#">
                                Лого и Заголовок
                            </a>
                        </li>
                    </ul>
                </div>
                <!-- Ссылки внутри боковой панели -->
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            Ссылка 1
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            Ссылка 2
                        </a>
                    </li>
                    <!-- Добавьте другие ссылки здесь -->
                </ul>
                <!-- Подвал боковой панели -->
                <div class="footer">
                    <p>&copy; 2023 Ваша компания</p>
                </div>
            </nav>
            <!-- Основное содержимое страницы -->
            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                <!-- Ваше основное содержимое страницы здесь -->
            </main>
        </div>
    </div>

    <!-- Подключите Bootstrap JavaScript и jQuery (если необходимо) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
</body>
</html>
