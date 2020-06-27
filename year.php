<?php 

require_once("header.php");

?>
<section class="year bg">
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
					<?php 
					$year_id = htmlspecialchars($_GET['year_id']);
					$books = get_books_by_year($year_id);
					$i = 1;
					?>
				<div class="books-block">
						<h3 class="books-block__title">В <?=get_year_title($year_id)?> году были изданы:</h3>
						<ul class="books-block__list">
							
							<?php foreach($books as $book) : ?>
								
							<li class="books-block__item">
									<span class="books-block__item_count"><?php echo $i++;?>.</span>
									<a href="book.php?book_id=<?=$book['book_id']?>">
									<?=$book['author'].' '?><?=$book['name'].' '?><?=$book['additional_information']?>
									</a>
							</li>
							<?php endforeach; ?>
						</ul>
				</div>
			</div>	
		</div>
	</div>
</section>
<?php
require_once("footer.php");
?>