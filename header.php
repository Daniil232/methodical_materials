<?php
	session_start();

	require_once("include/dbconnect.php");
	require_once("include/functions.php");
?>
<!DOCTYPE html>
<html lang="ru">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<title>Методические материалы</title>

	<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">

	<!--Нормализация стилей-->
	<link rel="stylesheet" href="css/normalize.css">
	<link rel="stylesheet" type="text/css" href="css/styles.css">
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/font-awesome.min.css">

	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css">

	<link rel="shortcut icon" href="img/favicon/favicon.ico">
</head>

<body>
	<section class="main">
		<header>
			<div class="header">
				<div class="container">
					<nav class="navbar navbar-expand-lg navbar-dark">
						<a class="navbar-brand" href="index.php">Главная</a>
						<button class="navbar-toggler" type="button" data-toggle="collapse"
							data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
							aria-label="Toggle navigation">
							<span class="navbar-toggler-icon"></span>
						</button>

						<div class="collapse navbar-collapse" id="navbarSupportedContent">
							<ul class="navbar-nav mr-auto">
								<li class="nav-item">
									<a class="nav-link" href="instraction.php">Руководство</a>
								</li>
								<li class="nav-item">
									<a class="nav-link" href="year.php?year_id=1">Каталог</a>
								</li>
								<li class="nav-item">
									<form class="seach-form form-inline" method="get" action="seach.php">
										<input class="form-control" type="search" placeholder="Поиск.." name="search">
										<input type="submit" class="seach-form__button my-2 my-sm-0" value="Поиск">
									</form>
								</li>
							</ul>
							
							<ul class="block-icons ">
								<?php 
											//Проверяем, авторизован ли пользователь
											if(!isset($_SESSION['email']) && !isset($_SESSION['password'])){
												// если нет, то выводим блок со ссылками на страницу регистрации и авторизации
										?>
								<li>
									<a href="form_auth.php" class="block-icons__item">Войти <i class="fas fa-sign-in-alt"></i></a>
								</li>
								<?php
											}else{
												//Если пользователь авторизован, то выводим ссылку Выход
										?>
								<li id="link_logout">
									<p class="come-in block-icons__item color-white"> Привет 
										<?php echo $_SESSION['first_name'];
										if(!($_SESSION['img']) == NULL) {
										?>
										<img src="data:image/jpeg;base64, <?php echo $_SESSION['img'] ?>">
										<?php
										}
										?>
									</p>

								</li>
								<li id="link_logout">
									<a class="block-icons__item" href="logout.php">
										Выйти <i class="fas fa-times-circle"></i>
									</a>
								</li>
								<?php
											}
										?>
							</ul>
						</div>
					</nav>
				</div>
			</div>
		</header>

		<div class="bot-panel">
			<div class="container">
				<div class="row">
					<div class="col">
						<h1 class="bot-panel__title">
							Методическое пособие в помощь студенту
						</h1>
					</div>
				</div>
			</div>
		</div>
	</section>