<?= $this->extend('theme/template') ?>

<?= $this->section('content') ?>

<div class="content-wrapper">
<div class="container mt-5">

    <div class="card shadow">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h4 class="mb-0">Sales</h4>
        </div>

        <div class="card-body">

            <table class="table table-hover table-bordered align-middle text-center">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Total</th>
                        <th>Created</th>
                        <th width="150">Action</th>
                    </tr>
                </thead>
                <tbody>

                <?php foreach ($sales as $row): ?>
                    <tr>
                        <td><?= $row['id'] ?></td>
                        <td>₱<?= $row['total'] ?></td>
                        <td><?= $row['created_at'] ?></td>
                        <td>
                            <a href="/sale/delete/<?= $row['id'] ?>" 
                               class="btn btn-danger btn-sm"
                               onclick="return confirm('Delete this transaction?')">
                               Delete
                            </a>
                            
                        </td>
                    </tr>
                <?php endforeach; ?>

                </tbody>
            </table>

        </div>
    </div>

</div>

<?= $this->endSection() ?>