<?php
require_once('model/database.php');
require_once('model/item_db.php');
require_once('model/category_db.php');

// Filter input to prevent XSS and SQL Injection
$item_id = filter_input(INPUT_POST, 'item_id', FILTER_VALIDATE_INT);
$title = filter_input(INPUT_POST, 'title', FILTER_SANITIZE_SPECIAL_CHARS);
$description = filter_input(INPUT_POST, 'description', FILTER_SANITIZE_SPECIAL_CHARS);
$category_name = filter_input(INPUT_POST, 'category_name', FILTER_SANITIZE_SPECIAL_CHARS);

// Attempt to get $category_id from POST, fallback to GET if not available
$category_id = filter_input(INPUT_POST, 'category_id', FILTER_VALIDATE_INT) ?: filter_input(INPUT_GET, 'category_id', FILTER_VALIDATE_INT);

// Determine the action to take, defaulting to 'list_items' if none specified
$action = filter_input(INPUT_POST, 'action', FILTER_SANITIZE_STRING) ?: filter_input(INPUT_GET, 'action', FILTER_SANITIZE_STRING) ?: 'list_items';

?>
