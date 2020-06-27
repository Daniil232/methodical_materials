<?php 

$book_id = htmlspecialchars($_GET['book_id']);
$year_id = htmlspecialchars($_GET['year_id']);

//Если в book_id не число
if (!is_numeric($book_id)) {
	exit();
}

require_once("header.php");

//Получаем массив книги
$book = get_book_by_id($book_id);

?>
<section class="book bg">
	<div class="container">
		<div class="row">
			<div class="col-md-3">
				<div class="years-block">
					<p class="years-block__title">Издания по годам</p>
					<hr>
					<ul class="years-block__list">
							<?php
						$years = get_years();
						?>
						<?php foreach($years as $year) : ?>
							<a href="year.php?year_id=<?=$year['year_id']?>" class="years-block__item"><?=$year['year']?><li></li></a>
							<?php endforeach; ?>
					</ul>
				</div>
			</div>
			<div class="col-md-9">
				<div class="book-block">
					<h2 class="book-block__title"><?=$book['name']?></h2>
					<p class="book-block__info"><?=$book['author'].' '?><?=$book['name'].' '?><?=$book['additional_information']?></p>
					<p><b>Аннотация :</b></p>
					<p class="book-block__annotation"><?=$book['annotation']?></p>
					<p><b>Описание :</b></p>	
					<p class="book-block__description"><?=$book['description']?></p>
					<p><b>PDF:</b></p>
					<p class="book-block__PDF">
						Название: <?=$book['name'].' '?>
						<?php 
						//Проверяем, авторизован ли пользователь
						if(!isset($_SESSION['email']) && !isset($_SESSION['password'])){
							// если нет, то выводим блок со ссылками на страницу регистрации и авторизации
						?>
							<a href="files/<?=$book['PDF']?> " target="_blank" onclick="return false;">
									Скачать PDF
							</a>
							<b>(Вы не можете скачать, пока вы не авторизировались на сайте)</b>
						<?php
						}else{
						//Если пользователь авторизован, то выводим ссылку Выход
						?>
							<a href="files/<?=$book['PDF']?>" target="_blank">
									Скачать PDF
							</a>
						<?php
									} 
						?>
					</p>
				</div>
			</div>	
		</div>
	</div>
</section>
<?php
require_once("footer.php");
?>