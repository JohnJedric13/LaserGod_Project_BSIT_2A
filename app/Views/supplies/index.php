<?= $this->extend('theme/template') ?>

<?= $this->section('content') ?>

<div class="content-wrapper">
<div class="container mt-5">

    <div class="card shadow">

        <div class="card-header bg-dark text-white">
            <h3>Restock Products</h3>
        </div>

        <div class="card-body">

            <?php if(session()->getFlashdata('success')): ?>
                <div class="alert alert-success">
                    <?= session()->getFlashdata('success') ?>
                </div>
            <?php endif; ?>

            <form method="post" action="/supplies/save">

                <div class="mb-3">
                    <label>Supplier Name</label>
                    <input type="text" name="supplier_name" class="form-control" required>
                </div>

                <table class="table table-bordered" id="supplyTable">

                    <thead class="table-dark">
                        <tr>
                            <th>Product</th>
                            <th>Quantity</th>
                            <!-- <th>Cost</th> -->
                            <th width="180">Action</th>
                        </tr>
                    </thead>

                    <tbody>

                        <tr>
                            <td>
                                <select name="product_id[]" class="form-select" required>
                                    <option value="">Select Product</option>

                                    <?php foreach($stocks as $stock): ?>
                                        <option value="<?= $stock['id'] ?>">
                                            <?= $stock['product'] ?>
                                        </option>
                                    <?php endforeach; ?>

                                </select>
                            </td>

                            <td>
                                <input type="number" name="quantity[]" class="form-control"
                                value="1" min="1" required>
                            </td>

                            <!-- <td>
                                <input type="number" step="1" name="cost[]" class="form-control" required>
                            </td> -->

                            <td>
                                <button type="button" class="btn btn-danger removeRow">
                                    X
                                </button>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <button type="submit" class="btn btn-primary">
                    Save Supply
                </button>
                <button type="button" class="btn btn-success addRow">
                                    +Add
                </button>
            </form>    
        </div>
    </div>
</div>

<script>

document.addEventListener('click', function(e) {

    if(e.target.classList.contains('addRow')) {

        let table = document.querySelector('#supplyTable tbody');

        let row = `

        <tr>
            <td>
                <select name="product_id[]" class="form-select" required>
                    <option value="">Select Product</option>

                    <?php foreach($stocks as $stock): ?>
                        <option value="<?= $stock['id'] ?>">
                            <?= $stock['product'] ?>
                        </option>
                    <?php endforeach; ?>

                </select>
            </td>

            <td>
                <input type="number" name="quantity[]" class="form-control" 
                value="1" min="1" required>
            </td>

            <td>
                <button type="button" class="btn btn-danger removeRow">
                    X
                </button>
            </td>
        </tr>

        `;

        table.insertAdjacentHTML('beforeend', row);
    }

    if(e.target.classList.contains('removeRow')) {
        e.target.closest('tr').remove();
    }

});

</script>

<?= $this->endSection() ?>