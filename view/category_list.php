<?php include 'header.php'; ?>

<main>
    <h1>Categories</h1>
    
    <!-- Display categories -->
    <ul>
        <?php foreach ($categories as $category) : ?>
            <li>
                <?php echo htmlspecialchars($category['categoryName']); ?>
                
                <!-- Delete Category button -->
                <form action="index.php?action=delete_category" method="post" style="display: inline;">
    <input type="hidden" name="categoryID" value="<?php echo $category['categoryID']; ?>">
    <input type="submit" value="Delete" onclick="return confirm('Are you sure you want to delete this category?');">
</form>
            </li>
        <?php endforeach; ?>
    </ul>
    
    <!-- Add Category form -->
    <h2>Add Category</h2>
    <form action="index.php?action=add_category" method="post">
        <label for="categoryName">Category Name:</label>
        <input type="text" name="categoryName" required>
        <input type="submit" value="Add Category">
    </form>
</main>

<?php include 'footer.php'; ?>
