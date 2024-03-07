<?php include 'header.php'; ?>
<main>
    <h1>Add New Item</h1>
    <form action="index.php?action=add_item" method="post">
        <label for="title">Title:</label>
        <input type="text" name="title" required>
        <label for="description">Description:</label>
        <input type="text" name="description" required>
        <label for="categoryID">Category:</label>
        <select name="categoryID" required>
            <?php foreach ($categories as $category) : ?>
                <option value="<?php echo $category['categoryID']; ?>">
                    <?php echo htmlspecialchars($category['categoryName']); ?>
                </option>
            <?php endforeach; ?>
        </select>

        <input type="submit" value="Add Item">
    </form>
</main>
<?php include 'footer.php'; ?>
