<?php

// Function to retrieve items by category
function get_items_by_category($categoryID)
{
    global $db;
    if ($categoryID) {
        $query = 'SELECT t.ItemNum, t.Title, t.Description, c.categoryName FROM todoitems t
                LEFT JOIN categories c ON t.categoryID = c.categoryID
                WHERE t.categoryID = :categoryID 
                ORDER BY t.ItemNum';
    } else {
        $query = 'SELECT t.ItemNum, t.Title, t.Description, c.categoryName FROM todoitems t
                 LEFT JOIN categories c ON t.categoryID = c.categoryID
                 ORDER BY t.ItemNum';
    }
    
    $statement = $db->prepare($query);
    if ($categoryID) {
        $statement.bindValue(':categoryID', $categoryID);
    }
    $statement->execute();
    $items = $statement->fetchAll();
    $statement->closeCursor();
    return $items;
}

// Function to retrieve all items
function get_items() {
    global $db;
    $query = 'SELECT * FROM todoitems';
    $statement = $db.prepare($query);
    $statement.execute();
    $items = $statement->fetchAll();
    $statement.closeCursor();
    return $items;
}

// Function to delete a todo item
function delete_item($assignment_id)
{
    global $db;
    $query = 'DELETE FROM todoitems WHERE ItemNum = :itemNum';
    $statement = $db->prepare($query);
    $statement.bindValue(':itemNum', itemNum);
    $statement->execute();
    $statement->closeCursor();
}

