<?= $this->extend('theme/template') ?>

<?= $this->section('content') ?>

    <style>
        /* body {
            font-family: Arial, sans-serif;
            background: #f4f6f9;
            padding: 30px;
        } */

        .pos-card{
            background:white;
            padding:20px;
            border-radius:15px;
            box-shadow:0 2px 10px rgba(0,0,0,0.1);
        }

        .total-box{
            font-size:30px;
            font-weight:bold;
            color:green;
        }
    </style>

<div class="content-wrapper">
<div class="container mt-5">

    <div class="pos-card">

        <h2 class="mb-4">
            🛒 Point of Sale
        </h2>

            <?php if(session()->getFlashdata('success')): ?>
                <div class="alert alert-success">
                    <?= session()->getFlashdata('success') ?>
                </div>
            <?php endif; ?>

        <form method="post" action="/pos/checkout">

            <table class="table table-bordered" id="posTable">

                <thead class="table-dark">

                    <tr>
                        <th>Product</th>
                        <th width="120">Price</th>
                        <th width="120">Qty</th>
                        <th width="150">Subtotal</th>
                        <th width="100">Action</th>
                    </tr>

                </thead>

                <tbody id="items">

                    <tr>

                        <td>

                            <select name="stocks[]" class="form-select product">

                                <?php foreach($stocks as $p): ?>

                                    <option 
                                        value="<?= $p['id'] ?>"
                                        data-price="<?= $p['price'] ?>">

                                        <?= $p['product'] ?>
                                        (Stock: <?= $p['quantity'] ?>)

                                    </option>

                                <?php endforeach; ?>

                            </select>

                        </td>

                        <td>
                            ₱<span class="price">0.00</span>
                        </td>

                        <td>
                            <input type="number"
                                   name="quantities[]"
                                   class="form-control qty"
                                   value="1"
                                   min="1">
                        </td>

                        <td>
                            ₱<span class="subtotal">0.00</span>
                        </td>

                        <td>
                            <button type="button"
                                    class="btn btn-danger removeBtn">
                                X
                            </button>
                        </td>

                    </tr>

                </tbody>

            </table>

            <button type="button"
                    class="btn btn-primary"
                    id="addItemBtn">

                + Add Item

            </button>

            <hr>

            <div class="text-end">

                <h3>
                    Total:
                    <span class="total-box">
                        ₱<span id="grandTotal">0.00</span>
                    </span>
                </h3>

            </div>

            <div class="row">

    <div class="col-md-4">

        <label class="form-label">
            Cash Payment
        </label>

        <input type="number"
               step="0.01"
               id="cash"
               name="cash"
               class="form-control"
               placeholder="Enter cash">

    </div>

    <div class="col-md-4">

        <label class="form-label">
            Change
        </label>

        <input type="text"
               id="change"
               class="form-control"
               readonly>

    </div>

</div>

            <div class="text-end mt-3">

                <button type="submit"
                         id="checkoutBtn"
                        class="btn btn-success btn-lg">

                    <hr>



                    Checkout

                </button>

            </div>

        </form>

    </div>

</div>

<script>

function calculateTotals() {

    let grandTotal = 0;

    document.querySelectorAll('#items tr').forEach(function(row){

        let product = row.querySelector('.product');

        let price = parseFloat(
            product.options[product.selectedIndex]
            .getAttribute('data-price')
        );

        let qty = parseInt(
            row.querySelector('.qty').value
        );

        let subtotal = price * qty;

        row.querySelector('.price').innerText =
            price.toFixed(2);

        row.querySelector('.subtotal').innerText =
            subtotal.toFixed(2);

        grandTotal += subtotal;
    });

    document.getElementById('grandTotal').innerText =
        grandTotal.toFixed(2);
}

calculateTotals();

document.addEventListener('change', function(e){

    if(
        e.target.classList.contains('product') ||
        e.target.classList.contains('qty')
    ){
        calculateTotals();
    }

});

document.getElementById('addItemBtn')
.addEventListener('click', function(){

    let firstRow =
        document.querySelector('#items tr');

    let newRow = firstRow.cloneNode(true);

    newRow.querySelector('.qty').value = 1;

    document.getElementById('items')
        .appendChild(newRow);

    calculateTotals();
});

document.addEventListener('click', function(e){

    if(e.target.classList.contains('removeBtn')){

        let rows =
            document.querySelectorAll('#items tr');

        if(rows.length > 1){

            e.target.closest('tr').remove();

            calculateTotals();
        }
    }

});

function calculateChange(){

    let total = parseFloat(
        document.getElementById('grandTotal')
        .innerText
    );

    let cash = parseFloat(
        document.getElementById('cash').value
    );

    if(!isNaN(cash)){

        let change = cash - total;

        document.getElementById('change')
            .value = '₱' + change.toFixed(2);

    }
}

document.getElementById('cash')
.addEventListener('input', calculateChange);

document.querySelector('form')
.addEventListener('submit', function(e){

    let total = parseFloat(
        document.getElementById('grandTotal')
        .innerText
    );

    let cash = parseFloat(
        document.getElementById('cash').value
    );

    if(isNaN(cash) || cash < total){

        e.preventDefault();

        alert('Insufficient cash payment!');
    }

});
</script>

<?= $this->endSection() ?>