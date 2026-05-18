<?= $this->extend('theme/template') ?>

<?= $this->section('content') ?>

<div class="content-wrapper">
<div class="container mt-5">

    <div class="card shadow">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h4 class="mb-0">Suppliers</h4>
        </div>

        <div class="card-body">
            <table class="table table-hover table-bordered align-middle text-center">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Supply</th>
                        <th>Product</th>
                        <th>Amount</th>
                        <th width="150">Action</th>
                    </tr>
                </thead>
                <tbody>

                <?php foreach ($supply_items as $row): ?>
                    <tr>
                        <td><?= $row['id'] ?></td>
                        <td><?= $row['supply_id'] ?></td>
                        <td><?= $row['product_id'] ?></td>
                        <td><?= $row['quantity'] ?></td>
                        <td>
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