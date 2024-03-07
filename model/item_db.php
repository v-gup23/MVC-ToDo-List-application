<?php
function get_items_by_category($categoryID = null) {
    global $db;
    $query = 'SELECT * FROM todoitems WHERE categoryID = :categoryID';
    $statement = $db->prepare($query);
    $statement->bindValue(':categoryID', $categoryID);
    $statement->execute();
    $items = $statement->fetchAll();
    $statement->closeCursor();
    return $items;
}

function add_item($title, $description, $categoryID) {
    global $db;
    $query = 'INSERT INTO todoitems (title, description, categoryID) VALUES (:title, :description, :categoryID)';
    $statement = $db->prepare($query);
    $statement->bindValue(':title', $title);
    $statement->bindValue(':description', $description);
    $statement->bindValue(':categoryID', $categoryID);
    $statement->execute();
    $statement->closeCursor();
}

function get_items() {
    global $db;
    $query = 'SELECT * FROM todoitems 
              LEFT JOIN categories ON todoitems.categoryID = categories.categoryID
              ORDER BY todoitems.itemNum';
    $statement = $db->prepare($query);
    $statement->execute();
    $items = $statement->fetchAll();
    $statement->closeCursor();
    return $items;
}


function delete_item($itemNum) {
    global $db;
    $query = 'DELETE FROM todoitems WHERE itemNum = :itemNum';
    $statement = $db->prepare($query);
    $statement->bindValue(':itemNum', $itemNum);
    $statement->execute();
    $statement->closeCursor();
}

?>

