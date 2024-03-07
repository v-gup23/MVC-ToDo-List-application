<?php include 'header.php'; ?>
<main>
    <h1>My To-Do List</h1>
    <form action="index.php" method="get">
        <label for="categoryID">Category:</label>
        <select name="categoryID" id="categoryID">
            <option value="">View All Categories</option>
        </select>
        <input type="submit" value="Submit">
    </form>

    <table>
        <thead>
            <tr>
                <th>Title</th>
                <th>Description</th>
                <th>Category</th>
                <th>Remove</th>
            </tr>
        </thead>
        <tbody>
            <!-- Loop through items and display in table rows -->
            <?php foreach ($items as $item) : ?>
                <tr>
                    <td><?php echo htmlspecialchars($item['title']); ?></td>
                    <td><?php echo htmlspecialchars($item['description']); ?></td>
                    <td><?php echo htmlspecialchars($item['categoryName']); ?></td>
                    <td>
                        <form action="index.php" method="post">
                            <input type="hidden" name="action" value="delete_item">
                            <input type="hidden" name="itemNum" value="<?php echo $item['itemNum']; ?>">
                            <input type="submit" value="Remove">
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <a href="index.php?action=add_item_form">Add Item</a>
    <a href="index.php?action=list_categories">View/Edit Categories</a>
</main>
<?php include 'footer.php'; ?>
