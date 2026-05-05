<!DOCTYPE html>
<html>
<head>
    <title>Add Product</title>

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background-color: #f5f7fa;
        }
        .card {
            border-radius: 12px;
        }
    </style>
</head>
<body>

<div class="container mt-5">

    <div class="card shadow mx-auto" style="max-width: 600px;">

        <div class="card-header bg-primary text-white">
            <h4 class="mb-0">➕ Add New Category</h4>
        </div>

        <div class="card-body">

            <form method="post" action="<?= base_url('category/store') ?>">

                <div class="mb-3">
                    <label class="form-label">Category Name</label>
                    <input type="text" name="name" class="form-control" placeholder="Enter" required>
                </div>

                <div class="d-flex justify-content-between">
                    <a href="<?= base_url('category') ?>" class="btn btn-secondary">⬅ Back</a>
                    <button type="submit" class="btn btn-success">💾 Save</button>
                </div>

            </form>

        </div>
    </div>

</div>

</body>
</html>