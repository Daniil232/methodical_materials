<?php
    require_once("header.php");
?>

<section>
    <div class="content bg">
        <div class="container">
            <h3 class="content__title">Только что из печати</h3>
            <div class="row">
                <div class="col-md-7">
                    <ul class="thumnails">
                        <?php
                        $page = isset($_GET['page']) ? $_GET['page']: 1;
                        $limit = 6;
                        $offset = $limit * ($page - 1);
                        $books = get_books($limit, $offset);
                        ?>
                        <?php foreach($books as $book) : ?>
                        <li class="thumnails-block">
                            <a href="book.php?book_id=<?=$book['book_id']?>">
                                <img class="thumnails-block__img" src="img/nophoto.png" alt="Книга">
                                
                                <h5 class="thumnails-block__author"><?=$book['author']?></h5>

                                <p class="thumnails-block__title"><?=mb_substr($book['name'], 0 , 128, 'UTF-8').'...'?>
                                </p>
                                <p class="thumnails-block__additional-information"><?=$book['additional_information']?></p>
                            </a>
                        </li>
                        <hr>
                        <?php endforeach; ?>
                        <li class="thumnails-link">
                            <a href="year.php?year_id=1">Все издания</a>
                        </li>
                    </ul>
                </div>
                <div class="col-md-5">
                    <div class="right-sidebar">
                        <ul class="homelinks">
                            <li class="homelinks-block">
                                <a href="instraction.php">
                                    <img class="homelinks-block__img" src="img/icon-strategy.png" alt="">
                                    <p class="homelinks-block__title">
                                        Инструкция
                                    </p>
                                    <p class="homelinks-block__additional-information">руководство для авторов по
                                        созданию методического пособия
                                    </p>
                                </a>
                            </li>
                            <hr>
                            <li class="homelinks-block">
                                <a href="year.php?year_id=1">
                                    <img class="homelinks-block__img" src="img/icon-archive.png" alt="">
                                    <p class="homelinks-block__title">
                                        Каталог
                                    </p>
                                    <p class="homelinks-block__additional-information">
                                        методическое
                                        пособие</p>
                                </a>
                            </li>
                        </ul>
                        <div class="journals">
                            <h3 class="journals__title">Научные журналы</h3>
                            <hr>
                            <?php
                            $journals = get_journals();
                            ?>
                            <div class="row">
                                 <?php foreach($journals as $journal) : ?>
                                <div class="col">
                                    <div class="journal-block">
                                        <a href="<?=$journal['web']?>" target="_blank">
                                            <div class="journal-block__img">
                                                <img src="files/img_journals/<?=$journal['image']?>" alt="">
                                            </div>
                                            
                                            <div class="journal-block__text">
                                            <?=$journal['name']?>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                                 <?php endforeach; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php
    require_once("footer.php");
?>