<?php

function get_books($limit, $offset) {

	global $link;

	$sql = "SELECT * FROM books LIMIT $limit OFFSET $offset";

	$result = mysqli_query($link, $sql);

	$books = mysqli_fetch_all($result, MYSQLI_ASSOC);

	return $books;
}

function get_years() {

	global $link;

	$sql = "SELECT * FROM years";

	$result = mysqli_query($link, $sql);

	$years = mysqli_fetch_all($result, MYSQLI_ASSOC);

	return $years;
}

function get_book_by_id($book_id) {

	global $link;

	$sql = "SELECT * FROM books WHERE book_id = ".$book_id;

	$result = mysqli_query($link, $sql);
	
	$book = mysqli_fetch_assoc($result);
	
	return $book;
}


function get_books_by_year($year_id) {
	
	global $link;

	$year_id = mysqli_real_escape_string($link, $year_id);

	$sql = 'SELECT * FROM books WHERE year_id = "'.$year_id.'"';

	$result = mysqli_query($link, $sql);

	$book = mysqli_fetch_all($result, MYSQLI_ASSOC);
	
	return $book;
}

function get_year_title($year_id) {

	global $link;

	$year_id = mysqli_real_escape_string($link, $year_id);

	$sql = 'SELECT year FROM years WHERE year_id = "'.$year_id.'"';

	$result = mysqli_query($link, $sql);

	$year = mysqli_fetch_assoc($result);
	
	return $year['year'];
}

function get_journals() {

	global $link;

	$sql = "SELECT * FROM journals";

	$result = mysqli_query($link, $sql);

	$journals = mysqli_fetch_all($result, MYSQLI_ASSOC);

	return $journals;
}

function get_search($search) {
	$sql_seacrh = "";

	$arraywords = explode(" ", $search);

	foreach($arraywords as $key => $value) {
		if(isset($arraywords[$key - 1])) $sql_search .= " OR ";
		$sql_search .= "(name LIKE '%$value%' OR `author` LIKE '%$value%')";
	}
	global $link;

	$sql = "SELECT * FROM `books` WHERE $sql_search";
	$result = mysqli_query($link, $sql);

	$search = mysqli_fetch_all($result, MYSQLI_ASSOC);

	return $search;
}


?>