<?php
function get_categories() {
    global $db;
    $query = 'SELECT * FROM categories ORDER BY categoryName';
    $statement = $db->prepare($query);
    $statement->execute();
    $categories = $statement->fetchAll();
    $statement->closeCursor();
    return $categories;
}

function add_category($categoryName) {
    global $db;
    $query = 'INSERT INTO categories (categoryName) VALUES (:categoryName)';
    $statement = $db->prepare($query);
    $statement->bindValue(':categoryName', $categoryName);
    $statement->execute();
    $statement->closeCursor();
}

function delete_category($categoryID) {
    global $db;
    
    // Check if there are any items associated with the category
    $itemsExist = check_items_exist_for_category($categoryID);

    if (!$itemsExist) {
        // No associated items, proceed with deletion
        $query = 'DELETE FROM categories WHERE categoryID = :categoryID';
        $statement = $db->prepare($query);
        $statement->bindValue(':categoryID', $categoryID);
        $statement->execute();
        $statement->closeCursor();
    }
}

function check_items_exist_for_category($categoryID) {
    global $db;
    $query = 'SELECT COUNT(*) FROM todoitems WHERE categoryID = :categoryID';
    $statement = $db->prepare($query);
    $statement->bindValue(':categoryID', $categoryID);
    $statement->execute();
    $count = $statement->fetchColumn();
    $statement->closeCursor();
    return ($count > 0);

}
?>
