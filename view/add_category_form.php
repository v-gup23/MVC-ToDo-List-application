<?php include 'header.php'; ?>
<main>
    <h1>Add New Category</h1>
    <form action="index.php?action=add_category" method="post">
        <label for="categoryName">Category Name:</label>
        <input type="text" name="categoryName" required>
        <input type="submit" value="Add Category">
    </form>
</main>
<?php include 'footer.php'; ?>
