<?php
    require_once("header.php");
?>

<section>
    <div class="content bg" style="height: 65vh;">
        <div class="container">
            <div class="row">
					<div class="col">
						<?php 
						$words = get_search($_GET['search']);
						$i = 1;
						?>
						<div class="books-block">
						<h3 class="content__title">Поиск по слову <?php echo $_GET['search']?>:</h3>
								<ul class="books-block__list">
									
									<?php foreach($words as $word) : ?>
										
									<li class="books-block__item">
											<span class="books-block__item_count"><?php echo $i++;?></span>
											<a href="book.php?book_id=<?=$word['book_id']?>">
											<?=$word['author'].' '?><?=$word['name'].' '?><?=$word['additional_information']?>
											</a>
									</li>
									<?php endforeach; ?>
								</ul>
						</div>
					</div>
            </div>
        </div>
    </div>
</section>
<?php
    require_once("footer.php");
?>