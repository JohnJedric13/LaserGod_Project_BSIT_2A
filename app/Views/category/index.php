<?= $this->extend('theme/template') ?>

<?= $this->section('content') ?>

<div class="content-wrapper">
<div class="container mt-5">

    <div class="card shadow">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h4 class="mb-0">📑Categories</h4>
            
            <a href="category/create" class="btn btn-primary">+ Add Category</a>
        </div>

        <div class="card-body">

            <table class="table table-hover table-bordered align-middle text-center">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Category Name</th>
                        <th width="150">Action</th>
                    </tr>
                </thead>
                <tbody>

                <?php foreach ($categories as $row): ?>
                    <tr>
                        <td><?= $row['category_id'] ?></td>
                        <td><?= $row['name'] ?></td>
                        <td>
                            <a href="/stock/delete/<?= $row['category_id'] ?>" 
                               class="btn btn-danger btn-sm"
                               onclick="return confirm('Are you sure you want to remove this category?')">
                               Delete
                            </a>
                            
                        </td>
                    </tr>
                <?php endforeach; ?>

                </tbody>
            </table>
    </div>

</div>

<?= $this->endSection() ?>