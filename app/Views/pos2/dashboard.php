<?= $this->extend('theme/template') ?>

<?= $this->section('content') ?>

<div class="content-wrapper">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        .card-box{
            border-radius:15px;
            padding:20px;
            color:white;
        }

        .earnings{
            background:#198754;
        }

        .today{
            background:#0d6efd;
        }

        .transactions{
            background:#dc3545;
        }

        .todaytrans{
            background:#6f42c1;
        }
    </style>
</head>
<body>

<div class="container mt-5">

    <h2 class="mb-4">
        📊 POS Sales Dashboard
    </h2>

    <div class="row g-4">

        <div class="col-md-3">
            <div class="card-box earnings">
                <h5>Total Earnings</h5>

                <h2>
                    ₱<?= number_format($totalEarnings,2) ?>
                </h2>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card-box today">
                <h5>Today's Earnings</h5>

                <h2>
                    ₱<?= number_format($todayEarnings,2) ?>
                </h2>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card-box transactions">
                <h5>Total Transactions</h5>

                <h2>
                    <?= $totalTransactions ?>
                </h2>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card-box todaytrans">
                <h5>Today's Transactions</h5>

                <h2>
                    <?= $todayTransactions ?>
                </h2>
            </div>
        </div>

    </div>

    <div class="mt-4">

        <a href="/pos" class="btn btn-primary">
            Open POS
        </a>

    </div>

</div>

<?= $this->endSection() ?>