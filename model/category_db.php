<?php

// Function to get the categories
function get_category()
{
    global $db;
    $query = 'SELECT * FROM categories';
    $statement = $db->prepare($query);
    $statement->execute();
    $categories = $statement->fetchAll();
    $statement->closeCursor();
    return $categories;
}

// Function to get all the category names by categoryID
function get_category_name($categoryID)
{
    if (!$categoryID) {
        return "All Categories";
    }
    global $db;
    $query = 'SELECT * FROM categories WHERE categoryID = :categoryID';
    $statement = $db->prepare($query);
    $statement->bindValue(':categoryID', categoryID);
    $statement->execute();
    $category = $statement->fetch();
    $statement->closeCursor();
    $course_name = $course['categoryName'];
    return $categoryName;
}

// Function to delete a category
function delete_category($categoryID)
{
    global $db;
    $query = 'DELETE FROM categories WHERE categoryID = :categoryID';
    $statement = $db->prepare($query);
    $statement->bindValue(':categoryID', categoryID);
    $statement->execute();
    $statement->closeCursor();
}

// Function to add a category
function add_category($categoryName)
{
    global $db;
    $query = 'INSERT INTO categories (categoryName) VALUES (:categoryName)';
    $statement = $db->prepare($query);
    $statement->bindValue(':categoryName', categoryName);
    $statement->execute();
    $statement->closeCursor();
}

