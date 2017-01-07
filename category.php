<!-- Includes Header -->
<?php include "includes/header.php";

// User input
$category = isset($_GET['u']) ? $_GET['u'] : "";
$category = substr($category, 0, -5);
if (isset($_GET['c']) && isset($_GET['u'])) {
	$catId = $_GET['c'];
}
else{
	header('Location: index.php');
}

$page = isset($_GET['p']) ? (int)$_GET['p'] : 1;
$perPage = isset($_GET['per-page']) && $_GET['per-page'] <= 50 ? (int)$_GET['per-page'] : 20;
$next = $page + 1;
$prev = $page - 1;

//Positioning 
$start = ($page > 1) ? ($page * $perPage) - $perPage : 0;

$pagination = $db->getCategoryArticles($catId, $start, $perPage);

$total = $db->getTotalCategoryArticles($catId);

$pages = ceil($total / $perPage);

$firstPage = 1;

require 'views/category.view.php';

include "includes/sidebar.php";
include "includes/footer.php";