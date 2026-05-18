<style type="text/css">
.nav-sidebar .nav-link {
    position: relative;
    transition: background 0.2s ease;
}

/* Orange left bar */
.nav-sidebar .nav-link::before {
    content: "";
    position: absolute;
    left: 0;
    top: 0;
    height: 100%;
    width: 4px;
    background: blue;
    border-radius: 0 3px 3px 0;

    transform: scaleY(0);
    transform-origin: top;
    transition: transform 0.25s ease;
}

/* Show orange bar on hover & active */
.nav-sidebar .nav-link.active::before,
.nav-sidebar .nav-link:hover::before {
    transform: scaleY(1);
}

/* SUPER LIGHT GRADIENT */
.nav-sidebar .nav-link:hover,
.nav-sidebar .nav-link.active {
    background: linear-gradient(
        to right,
        rgba(255, 165, 0, 0.01),   /* extremely light orange */
        rgba(255, 165, 0, 0.01)    /* almost invisible */
    ) !important;
    box-shadow: none !important;
}

/* Submenu items same gradient */
.nav-treeview .nav-link:hover,
.nav-treeview .nav-link.active {
    background: linear-gradient(
        to right,
        rgba(255, 165, 0, 0.01),
        rgba(255, 165, 0, 0.01)
    ) !important;
    box-shadow: none !important;
}

/* Sidebar links text and icons in dark mode */
body.dark-mode .main-sidebar .nav-link {
    color: #fff !important;
}

body.dark-mode .main-sidebar .nav-link p {
    color: #fff !important;
}

body.dark-mode .main-sidebar .nav-icon {
    color: #fff !important;
}

/* Active or hovered link */
body.dark-mode .main-sidebar .nav-link.active,
body.dark-mode .main-sidebar .nav-link:hover {
    background-color: rgba(255, 255, 255, 0) !important; /* slightly lighter bg on hover/active */
}

.table th { background-color: #343a40; color: white; }


/* Pos 
body {
            font-family: Arial, sans-serif;
            background: #f4f6f9;
            padding: 30px;
        }

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
            box-shadow: 0 4px 10px rgb(74, 202, 45);
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
        } */

</style>


<aside class="main-sidebar sidebar-light-light sidebar-light elevation-5" id="mainSidebar">
<div class="brand-link bg-warning" id="brandLink" style="cursor: default; border-bottom: 1px rgba(255, ,255, 255);">
    <img src="<?= base_url('assets/adminlte/dist/img/MainStore.png') ?>" 
         alt="Main Store" 
         class="brand-image img-circle elevation-3" 
         style="opacity: .8">
    <span class="brand-text font-weight-light" style="color: white">Jane Ny Sari Sari Store</span>
</div>
  <div class="sidebar">
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
       <li class="nav-item">
        <a href="<?= base_url('dashboard') ?>" class="nav-link <?= is_active(1, 'dashboard') ?>">
         <i class="nav-icon fas fa-tachometer-alt"></i>
         <p>Dashboard</p>
       </a>
     </li>
      <li class="nav-item"> 
      <a href="<?= base_url('stock') ?>" class="nav-link <?= is_active(1, 'stock') ?>">
        <i class="nav-icon fas fa-store"></i>
        <p>Products</p>
      </a>
    </li> 
    <li class="nav-item">
      <a href="<?= base_url('supplies') ?>" class="nav-link <?= is_active(1, 'supplies') ?>">
        <i class="nav-icon fas fa-box"></i>
        <p>Supply Items</p>
      </a>
    </li>
    <li class="nav-item">
      <a href="<?= base_url('category') ?>" class="nav-link <?= is_active(1, 'category') ?>">
        <i class="nav-icon fas fa-book"></i>
        <p>Categories</p>
      </a>
    </li>
    <li class="nav-item"> 
      <a href="<?= base_url('pos') ?>" class="nav-link <?= is_active(1, 'pos') ?>">
        <i class="nav-icon fas fa-users"></i>
        <p>Add Sale</p>
      </a>
    </li> 
       <li class="nav-item">
      <a href="<?= base_url('sale') ?>" class="nav-link <?= is_active(1, 'sale') ?>">
        <i class="nav-icon fas fa-dollar"></i>
        <p>Sales</p>
      </a>
    </li>
       <li class="nav-item">
      <a href="<?= base_url('user') ?>" class="nav-link <?= is_active(1, 'user') ?>">
        <i class="nav-icon fas fa-user-lock"></i>
        <p>User Accounts</p>
      </a>
    </li>
    <li class="nav-item">
      <a href="<?= base_url('/pos2/dashboard') ?>" class="nav-link <?= is_active(1, '/pos2/dashboard') ?>">
        <i class="nav-icon fas fa-tachometer-alt"></i>
        <p>POS Sales DashBoard</p>
      </a>
    </li>
    <li class="nav-item">
      <a href="<?= base_url('/suppliers') ?>" class="nav-link <?= is_active(1, 'suppliers') ?>">
        <i class="nav-icon fas fa-user"></i>
        <p>Suppliers</p>
      </a>
    </li>
    <!-- <li class="nav-item">
      <a href="<?= base_url('/supplyitems') ?>" class="nav-link <?= is_active(1, 'supplyitems') ?>">
        <i class="nav-icon fas fa-user"></i>
        <p>Suppliers</p> 
      </a>
    </li> -->
  </ul>
</nav>
</div> 
</aside>