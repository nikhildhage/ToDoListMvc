<?php 
include('view/header.php'); // Include the header part of the HTML page
?>

<!-- Section to Display Items -->
<section>
    <h1>Todo List Items</h1>
    <!-- Form for Filtering Items by Category -->
    <form action="." method="get" class="mb-3">
        <select name="category_id" class="form-control w-auto d-inline-block">
            <option value="0">View All Categories</option>
            <?php foreach ($categories as $category) : ?>
                <option value="<?= $category['categoryID'] ?>" <?= $category_id == $category['categoryID'] ? 'selected' : '' ?>>
                    <?= htmlspecialchars($category['categoryName']) ?>
                </option>
            <?php endforeach; ?>
        </select>
        <button type="submit" class="btn btn-primary">Go</button>
    </form>

    <!-- Responsive table -->
    <div class="table-responsive">
        <table class="table table-bordered text-center">
            <thead class="thead-dark">
                <tr>
                    <th>Category</th>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($items)) : ?>
                    <?php foreach ($items as $item) : ?>
                    <tr>
                        <td><?= htmlspecialchars($item['categoryName']) ?></td>
                        <td><?= htmlspecialchars($item['Title']) ?></td>
                        <td><?= htmlspecialchars($item['Description']) ?></td>
                        <td>
                            <form action="." method="post">
                                <input type="hidden" name="action" value="delete_item">
                                <input type="hidden" name="item_id" value="<?= $item['ItemNum'] ?>">
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                <?php else : ?>
                    <tr>
                        <td colspan="4">No items exist<?= $category_id ? ' for this category' : '' ?> yet.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</section>

<!-- Section to Add a New Item -->
<section>
    <h2>Add Item</h2>
    <form action="." method="post" class="form-inline">
        <select name="category_id" class="form-control mb-2 mr-sm-2" required>
            <option value="">Please select category</option>
            <?php foreach ($categories as $category) : ?>
                <option value="<?= $category['categoryID'] ?>">
                    <?= htmlspecialchars($category['categoryName']); ?>
                </option>
            <?php endforeach; ?>
        </select>
        <input type="text" name="title" class="form-control mb-2 mr-sm-2" maxlength="50" placeholder="Title" required>
        <input type="text" name="description" class="form-control mb-2 mr-sm-2" maxlength="120" placeholder="Description" required>
        <button type="submit" name="action" value="add_item" class="btn btn-primary mb-2">Add</button>
    </form>
</section>

<!-- Link to View/Edit Categories Page -->
<p><a href=".?action=list_categories" class="btn btn-link">View/Edit Categories</a></p>

<?php 
include('view/footer.php'); // Include the footer part of the HTML page
?>
