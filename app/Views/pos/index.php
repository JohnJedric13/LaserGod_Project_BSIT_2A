<?= $this->extend('theme/template') ?>

<?= $this->section('content') ?>

    <style>
        /* body {
            font-family: Arial, sans-serif;
            background: #f4f6f9;
            padding: 30px;
        } */

        h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        form {
            max-width: 600px;
            margin: auto;
            background: #fff;
            padding: 25px;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0,0,0,0.1);
        }

        #items div {
            display: flex;
            gap: 10px;
            margin-bottom: 10px;
        }

        select, input {
            padding: 8px;
            border-radius: 5px;
            border: 1px solid #ccc;
            width: 100%;
        }

        input[type="number"] {
            max-width: 100px;
        }

        button {
            padding: 10px 15px;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            font-weight: bold;
        }

        button[type="button"] {
            background-color: #3498db;
            color: white;
        }

        button[type="button"]:hover {
            background-color: #2980b9;
        }

        button[type="submit"] {
            background-color: #2ecc71;
            color: white;
            width: 100%;
        }

        button[type="submit"]:hover {
            background-color: #27ae60;
        }
    </style>

<div class="content-wrapper">
<div class="container mt-5">

  <h2 class="mb-0">Point of Sale</h2>

  <form method="post" action="/pos/checkout">

  <div id="items">
      <div>
          <select name="stocks[]">
              <?php foreach ($stocks as $p): ?>
                  <option value="<?= $p['id'] ?>">
                      <?= $p['product'] ?> (₱<?= $p['price'] ?>)
                  </option>
              <?php endforeach; ?>
          </select>

          <input type="number" name="quantities[]" value="1" min="1">
      </div>
  </div>

  <br>

  <button type="button" onclick="addItem()">Add Item</button>

  <br><br>

  <button type="submit">Checkout</button>

  </form>

</div>

<script>
function addItem() {
    let div = document.createElement('div');

    div.innerHTML = `
        <select name="stocks[]">
            <?php foreach ($stocks as $p): ?>
                <option value="<?= $p['id'] ?>">
                    <?= $p['product'] ?> (₱<?= $p['price'] ?>)
                </option>
            <?php endforeach; ?>
        </select>

        <input type="number" name="quantities[]" value="1" min="1">
    `;

    document.getElementById('items').appendChild(div);
}
</script>

<?= $this->endSection() ?>