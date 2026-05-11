<!DOCTYPE html>
<html>
<head>
    <title>Edit Product</title>

    <!-- Bootstrap -->
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
        
        <div class="card-header bg-warning text-dark">
            <h4 class="mb-0">✏️ Edit Product</h4>
        </div>

        <div class="card-body">

            <form method="post" action="<?= base_url('stock/update/'.$stocks['id']) ?>">

                <div class="mb-3">
                    <label class="form-label">Product Name</label>
                    <input type="text" name="product" class="form-control" value="<?= $stocks['product'] ?>" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Quantity</label>
                    <input type="number" name="quantity" class="form-control" value="<?= $stocks['quantity'] ?>" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Price</label>
                    <input type="number" name="price" class="form-control" value="<?= $stocks['price'] ?>" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Expiration</label>
                    <input type="date" name="expire" class="form-control" value="<?= $stocks['expire'] ?>">
                </div>

                <div class="mb-3">
                <label class="form-label">Category</label>
                        <select name="category_id">
                               <?php foreach ($categories as $c): ?>
                                   <option value="<?= $c['category_id'] ?>"
                                    <?= ($c['category_id'] == $stocks['category_id']) ? 'selected' : '' ?>>
                                    <?= $c['name'] ?>
                                   </option>
                                <?php endforeach; ?>
                         </select>
                </div>

                <div class="d-flex justify-content-between">
                    <a href="<?= base_url('stock') ?>" class="btn btn-secondary">⬅ Back</a>
                    <button type="submit" class="btn btn-success">💾 Update</button>
                </div>

            </form>

        </div>
    </div>

</div>

</body>
</html>