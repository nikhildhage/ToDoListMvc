<?php
function get_categories()
{
    global $db;
    $query = 'SELECT * FROM categories';
    $statement = $db->prepare($query);
    $statement->execute();
    $categories = $statement->fetchAll();
    $statement->closeCursor();
    return $categories;
}
