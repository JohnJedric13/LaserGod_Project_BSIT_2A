<!DOCTYPE html>
<html>
<head>
    <title>Student Dashboard</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }

        body {
            background-color: #f4f6f9;
        }

        /* 🔷 Top Navbar */
        .navbar {
            width: 100%;
            background-color: #2c3e50;
            color: white;
            padding: 15px 20px;
            font-size: 20px;
            font-weight: bold;
        }

        /* 🔷 Layout */
        .container {
            display: flex;
        }

        /* 🔷 Sidebar */
        .sidebar {
            width: 220px;
            height: 100vh;
            background-color: #34495e;
            padding-top: 20px;
        }

        .sidebar a {
            display: block;
            color: #ecf0f1;
            padding: 12px 20px;
            text-decoration: none;
            transition: 0.3s;
        }

        .sidebar a:hover {
            background-color: #1abc9c;
            color: white;
        }

        /* 🔷 Content */
        .content {
            flex: 1;
            padding: 20px;
        }

        /* 🔷 Card */
        .card {
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.1);
        }

        .card-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 15px;
        }

        .card-header h2 {
            font-size: 20px;
        }

        /* 🔷 Button */
        .btn {
            padding: 8px 12px;
            text-decoration: none;
            border-radius: 5px;
            color: white;
            font-size: 14px;
        }

        .btn-add {
            background-color: #3498db;
        }

        .btn-edit {
            background-color: #f39c12;
        }

        .btn-delete {
            background-color: #e74c3c;
        }

        .btn:hover {
            opacity: 0.8;
        }

        /* 🔷 Table */
        table {
            width: 100%;
            border-collapse: collapse;
        }

        table thead {
            background-color: #2c3e50;
            color: white;
        }

        table th, table td {
            padding: 10px;
            text-align: center;
            border: 1px solid #ddd;
        }

        table tr:hover {
            background-color: #f2f2f2;
        }

    </style>

</head>
<body>

<!-- 🔷 Navbar -->
<div class="navbar">
    📊 Student Dashboard
</div>

<div class="container">

    <!-- 🔷 Sidebar -->
    <div class="sidebar">
        <a href="<?= base_url('student') ?>">🏠 Home</a>
        <a href="<?= base_url('student/create') ?>">➕ Add Student</a>
    </div>

    <!-- 🔷 Content -->
    <div class="content">

        <div class="card">

            <div class="card-header">
                <h2>📚 Student List</h2>
                <a href="<?= base_url('student/create') ?>" class="btn btn-add">+ Add</a>
            </div>

            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Full Name</th>
                        <th>Email</th>
                        <th>School Year</th>
                        <th>Birthday</th>
                        <th>Address</th>
                        <th>Action</th>
                    </tr>
                </thead>

                <tbody>

                <?php if (!empty($student)): ?>
                    <?php foreach ($student as $row): ?>
                        <tr>
                            <td><?= $row['id'] ?></td>
                            <td><?= $row['fullname'] ?></td>
                            <td><?= $row['email'] ?></td>
                            <td><?= $row['schoolyear'] ?></td>
                            <td><?= $row['birthday'] ?></td>
                            <td><?= $row['address'] ?></td>
                            <td>
                                <a href="<?= base_url('student/edit/'.$row['id']) ?>" class="btn btn-edit">Edit</a>
                                <a href="<?= base_url('student/delete/'.$row['id']) ?>" 
                                   class="btn btn-delete"
                                   onclick="return confirm('Delete this student?')">
                                   Delete
                                </a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="7">No students found</td>
                    </tr>
                <?php endif; ?>

                </tbody>
            </table>

        </div>

    </div>
</div>

</body>
</html>