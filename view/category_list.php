<?php 
include("view/header.php"); 
?>

<!-- Display Categories -->
<section>
    <h1>Category List</h1>
    <div class="table-responsive">
        <table class="table table-bordered text-center">
            <thead class="thead-dark">
                <tr>
                    <th>Category Name</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($categories)) : ?>
                    <?php foreach ($categories as $category) : ?>
                    <tr>
                        <td><?= htmlspecialchars($category['categoryName']) ?></td>
                        <td>
                            <form action="." method="post">
                                <input type="hidden" name="action" value="delete_category">
                                <input type="hidden" name="category_id" value="<?= $category['categoryID'] ?>">
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                <?php else : ?>
                    <tr>
                        <td colspan="2">No Categories exist yet</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</section>

<!-- Add Category Form -->
<section>
    <h2>Add Category</h2>
    <form action="index.php" method="post" class="form-inline">
        <input type="hidden" name="action" value="add_category">
        <input type="text" name="category_name" class="form-control mb-2 mr-sm-2" maxlength="30" placeholder="Name" autofocus required>
        <button type="submit" class="btn btn-primary mb-2">Add</button>
    </form>
</section>

<!-- Link to View/Edit Items -->
<p><a href=".?action=list_items" class="btn btn-link">View/Edit Items</a></p>

<?php 
include("view/footer.php"); 
?>
