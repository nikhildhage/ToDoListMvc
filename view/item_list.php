<?php 
include('view/header.php'); // Include the header part of the HTML page
?>

<!-- Section to Display Items -->
<section>
    <h1>Items</h1>
    <!-- Form for Filtering Items by Category -->
    <form action="." method="get">
        <select name="category_id">
            <option value="0">View All</option>
            <?php foreach ($categories as $category) : ?>
                <!-- Dynamically generate options for categories, mark selected based on current filter -->
                <option value="<?= $category['categoryID'] ?>" <?= $category_id == $category['categoryID'] ? 'selected' : '' ?>>
                    <?= htmlspecialchars($category['categoryName']) ?>
                </option>
            <?php endforeach; ?>
        </select>
        <button type="submit">Go</button> <!-- Submit button for the filter form -->
    </form>

    <!-- Check if there are items to display -->
    <?php if (!empty($items)) : ?>
        <!-- Loop through each item and display it -->
        <?php foreach ($items as $item) : ?>
            <div>
                <p><strong><?= htmlspecialchars($item['categoryName']) ?></strong></p> <!-- Display the category name -->
                <p><?= htmlspecialchars($item['Description']) ?></p> <!-- Display the item description -->
                <!-- Form to delete the item, with hidden inputs for passing data -->
                <form action="." method="post">
                    <input type="hidden" name="action" value="delete_item">
                    <input type="hidden" name="item_id" value="<?= $item['ItemNum'] ?>">
                    <button type="submit">X</button> <!-- Button to delete the item -->
                </form>
            </div>
        <?php endforeach; ?>
    <?php else : ?>
        <!-- Message displayed if no items exist -->
        <p>No items exist<?= $category_id ? ' for this category' : '' ?> yet.</p>
    <?php endif; ?>
</section>

<!-- Section to Add a New Item -->
<section>
    <h2>Add Item</h2>
    <!-- Form for Adding a New Item -->
    <form action="." method="post">
        <select name="category_id" required>
            <option value="">Please select</option>
            <?php foreach ($categories as $category) : ?>
                <!-- Options for selecting category, populated dynamically -->
                <option value="<?= $category['categoryID'] ?>">
                    <?= htmlspecialchars($category['categoryName']); ?>
                </option>
            <?php endforeach; ?>
        </select>   
        <!-- Input field for the item description -->
        <input type="text" name="description" maxlength="120" placeholder="Description" required>
        <button type="submit" name="action" value="add_item">Add</button> <!-- Submit button for adding the item -->
    </form>
</section>

<!-- Link to View/Edit Categories Page -->
<p><a href=".?action=list_categories">View/Edit Categories</a></p>


<?php 
include('view/footer.php'); // Include the footer part of the HTML page
?>
