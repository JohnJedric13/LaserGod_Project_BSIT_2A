<!-- <!DOCTYPE html>
<html>
<head>
    <title>Inventory List</title> -->

    <!-- Bootstrap 5 CDN 
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background-color: #f5f7fa;
        }
        .card {
            border-radius: 12px;
        }
        .table th {
            background-color: #343a40;
            color: white;
        }
        .btn-sm {
            margin-right: 5px;
        }
    </style>
</head>
<body> -->

<?= $this->extend('theme/template') ?>

<?= $this->section('content') ?>

<div class="content-wrapper">
<div class="container mt-5">

    <div class="card shadow">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h4 class="mb-0">🏪Jane Ny Sari-Sari Store Inventory</h4>
            
            <a href="stock/create" class="btn btn-primary">+ New Product</a>
        </div>

        <div class="card-body">
            
            <?php
                $lowStockCount = 0;

                foreach ($stocks as $row) {
                if ($row['quantity'] <= 10) {
                $lowStockCount++;
                }
                }
                ?>

                <?php if ($lowStockCount > 0): ?>
                <div class="alert alert-warning">
                ⚠️ <?= $lowStockCount ?> product(s) are low on stock!
                </div>
            <?php endif; ?>

            <table class="table table-hover table-bordered align-middle text-center">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Product</th>
                        <th>Stocks</th>
                        <th>Price</th>
                        <th>Expiration</th>
                        <th>Purchased</th>
                        <th>Category</th>
                        <th width="150">Action</th>
                    </tr>
                </thead>
                <tbody>

                <?php foreach ($stocks as $row): ?>
                    <tr>
                        <td><?= $row['id'] ?></td>
                        <td><?= $row['product'] ?></td>
                        <td><?= $row['quantity'] ?>
                        
                        <?php if ($row['quantity'] <= 10): ?>
                          <span class="badge bg-danger">
                            Low Stock
                          </span>
                        <?php endif; ?>
                        </td>
                        <td>₱<?= $row['price'] ?></td>
                        <td><?= $row['expire'] ?></td>
                        <td><?= $row['created_at'] ?></td>
                        <td><?= $row['category_name'] ?></td>
                        <td>
                            <a href="/stock/edit/<?= $row['id'] ?>" class="btn btn-warning btn-sm">Edit</a>
                            <a href="/stock/delete/<?= $row['id'] ?>" 
                               class="btn btn-danger btn-sm"
                               onclick="return confirm('Are you sure you want to remove this product?')">
                               Delete
                            </a>
                            
                        </td>
                    </tr>
                <?php endforeach; ?>

                </tbody>
            </table>
            <!-- <div class="d-flex justify-content-end gap-2 mb-3">
               <a href="/login" class="btn btn-danger">
                 Logout
                 </a> -->

        </div> 
    </div>

</div>

<?= $this->endSection() ?>