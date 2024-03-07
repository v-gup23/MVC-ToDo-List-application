<?php
include('model/database.php');
include('model/item_db.php');
include('model/category_db.php');

$action = filter_input(INPUT_POST, 'action');
if ($action == NULL) {
    $action = filter_input(INPUT_GET, 'action');
    if ($action == NULL) {
        $action = 'list_items';
    }
}

if ($action == 'list_items') {
    // Handle displaying ToDo List items
    $items = get_items(); 
    include('view/item_list.php');
} elseif ($action == 'delete_item') {
    // Handle deleting ToDo List item
    // Get itemNum from the form
    $itemNum = filter_input(INPUT_POST, 'itemNum', FILTER_VALIDATE_INT);
    if ($itemNum !== false) {
        delete_item($itemNum);
    }
    header("Location: index.php");
} elseif ($action == 'list_categories') {
    // Handle displaying categories
    $categories = get_categories();
    include('view/category_list.php');
} elseif ($action == 'delete_category') {
    // Handle deleting category
    // Get categoryID from the form
    $categoryID = filter_input(INPUT_POST, 'categoryID', FILTER_VALIDATE_INT);
    if ($categoryID !== false) {
        delete_category($categoryID);
    }
    header("Location: index.php?action=list_categories");
} elseif ($action == 'add_item_form') {
    // Handle displaying add item form
    $categories = get_categories();
    include('view/add_item_form.php');
} elseif ($action == 'add_item') {
    // Handle adding new ToDo List item
    $title = filter_input(INPUT_POST, 'title');
    $description = filter_input(INPUT_POST, 'description');
    $categoryID = filter_input(INPUT_POST, 'categoryID', FILTER_VALIDATE_INT);

    if ($title && $description && $categoryID !== false) {
        add_item($title, $description, $categoryID);
    }
    header("Location: index.php");
} elseif ($action == 'add_category_form') {
    // Handle displaying add category form
    include('view/add_category_form.php');
} elseif ($action == 'add_category') {
    // Handle adding new category
    $categoryName = filter_input(INPUT_POST, 'categoryName');

    if ($categoryName) {
        add_category($categoryName);
    }
    header("Location: index.php?action=list_categories");
}
?>
