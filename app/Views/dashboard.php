<?= include('db.php'); ?>

<?= $this->extend('theme/template') ?>

<?= $this->section('content') ?>
<div class="content-wrapper dashboard-bg">
    
    <!-- Dashboard Header -->
    <div class="content-header py-3">
        <div class="container-fluid">
            <div class="d-flex justify-content-between align-items-center flex-wrap">
                
                <div>
                    <h1 class="dashboard-title">
                        <i class="fas fa-chart-line mr-2"></i> Dashboard
                    </h1>
                    <p class="dashboard-subtitle">
                        Welcome to your Inventory Management System
                    </p>
                </div>

                <div class="dashboard-date">
                    <i class="far fa-calendar-alt"></i>
                    <?= date('F d, Y') ?>
                </div>

            </div>
        </div>
    </div>

    <!-- Main Content -->
    <section class="content">
        <div class="container-fluid">

            <div class="row">

                <!-- Products -->
                <div class="col-lg-3 col-md-6 col-12">
                    <div class="small-box custom-card bg-gradient-info">
                        <div class="inner">
                            <h3 class="count-numbers"><?= $stocks ?></h3>
                            <p>Products</p>
                        </div>

                        <div class="icon">
                            <i class="ion ion-bag"></i>
                        </div>

                        <a href="/stock" class="small-box-footer">
                            View Products
                            <i class="fas fa-arrow-circle-right ml-1"></i>
                        </a>
                    </div>
                </div>

                <!-- Categories -->
                <div class="col-lg-3 col-md-6 col-12">
                    <div class="small-box custom-card bg-gradient-primary">
                        <div class="inner">
                            <h3 class="count-numbers"><?= $categories ?></h3>
                            <p>Categories</p>
                        </div>

                        <div class="icon">
                            <i class="ion ion-grid"></i>
                        </div>

                        <a href="/category" class="small-box-footer">
                            View Categories
                            <i class="fas fa-arrow-circle-right ml-1"></i>
                        </a>
                    </div>
                </div>

                <!-- Users -->
                <div class="col-lg-3 col-md-6 col-12">
                    <div class="small-box custom-card bg-gradient-warning">
                        <div class="inner">
                            <h3 class="count-numbers"><?= $users ?></h3>
                            <p>Users</p>
                        </div>

                        <div class="icon">
                            <i class="ion ion-person"></i>
                        </div>

                        <a href="/user" class="small-box-footer">
                            View Users
                            <i class="fas fa-arrow-circle-right ml-1"></i>
                        </a>
                    </div>
                </div>

                <!-- Sales -->
                <div class="col-lg-3 col-md-6 col-12">
                    <div class="small-box custom-card bg-gradient-danger">
                        <div class="inner">
                            <h3 class="count-numbers"><?= $sales ?></h3>
                            <p>Sales</p>
                        </div>

                        <div class="icon">
                            <i class="ion ion-cash"></i>
                        </div>

                        <a href="/sale" class="small-box-footer">
                            View Sales
                            <i class="fas fa-arrow-circle-right ml-1"></i>
                        </a>
                    </div>
                </div>

            </div>

        </div>
    </section>
</div>

<!-- ADVANCED CSS -->
<style>

.dashboard-bg{
    background: #d7eddc;
    min-height: 100vh;
}

/* Header */
.dashboard-title{
    font-size: 34px;
    font-weight: 700;
    color: #343a40;
    margin-bottom: 5px;
}

.dashboard-subtitle{
    color: #6c757d;
    font-size: 15px;
}

.dashboard-date{
    background: white;
    padding: 10px 18px;
    border-radius: 10px;
    box-shadow: 0 3px 10px rgba(0,0,0,0.08);
    font-weight: 600;
    color: #444;
}

/* Dashboard Cards */
.custom-card{
    border-radius: 18px;
    overflow: hidden;
    box-shadow: 0 8px 20px rgba(0,0,0,0.12);
    transition: 0.3s ease;
    position: relative;
}

.custom-card:hover{
    transform: translateY(-6px);
    box-shadow: 0 12px 25px rgba(0,0,0,0.18);
}

/* Inner */
.custom-card .inner{
    padding: 25px;
}

.custom-card h3{
    font-size: 42px;
    font-weight: bold;
    margin-bottom: 10px;
}

.custom-card p{
    font-size: 18px;
    font-weight: 500;
}

/* Icons */
.custom-card .icon{
    position: absolute;
    right: 20px;
    top: 15px;
    opacity: 0.2;
}

.custom-card .icon i{
    font-size: 80px;
}

/* Footer */
.small-box-footer{
    display: block;
    text-align: center;
    padding: 12px;
    color: white !important;
    font-weight: 600;
    background: rgba(0,0,0,0.15);
    transition: 0.3s;
}

.small-box-footer:hover{
    background: rgba(0,0,0,0.25);
    text-decoration: none;
}

/* Gradient Colors */
.bg-gradient-info{
    background: linear-gradient(135deg, #17a2b8, #00c6ff);
    color: white;
}

.bg-gradient-primary{
    background: linear-gradient(135deg, #007bff, #4e73df);
    color: white;
}

.bg-gradient-warning{
    background: linear-gradient(135deg, #f6c23e, #ffb300);
    color: #222;
}

.bg-gradient-danger{
    background: linear-gradient(135deg, #e83e8c, #ff416c);
    color: white;
}

/* Responsive */
@media(max-width:768px){

    .dashboard-title{
        font-size: 26px;
    }

    .custom-card h3{
        font-size: 34px;
    }

    .custom-card .icon i{
        font-size: 60px;
    }

}

</style>

<!-- <div class="col-lg-3 col-6">
        <div class="small-box bg-danger">
          <div class="inner">
            <h3>65</h3>
            <p>Unique Visitors</p>
          </div>
          <div class="icon">
            <i class="ion ion-pie-graph"></i>
          </div>
          <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
      </div> -->

<?= $this->endSection() ?>