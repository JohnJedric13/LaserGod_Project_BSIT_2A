
<!DOCTYPE html>
<html>
<head>
    <title>Student List</title>

    <!-- Bootstrap 5 CDN -->
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
<body>

<div class="container mt-5">

    <div class="card shadow">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h4 class="mb-0">📚 Student Management</h4>
            
            <a href="student/create" class="btn btn-primary">+ Add Student</a>
        </div>

        <div class="card-body">

            <table class="table table-hover table-bordered align-middle text-center">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Full Name</th>
                        <th>Email</th>
                        <th>School Year</th>
                        <th>Birthday</th>
                        <th>Address</th>
                        <th width="150">Action</th>
                    </tr>
                </thead>
                <tbody>

                <?php foreach ($student as $row): ?>
                    <tr>
                        <td><?= $row['id'] ?></td>
                        <td><?= $row['fullname'] ?></td>
                        <td><?= $row['email'] ?></td>
                        <td><?= $row['schoolyear'] ?></td>
                        <td><?= $row['birthday'] ?></td>
                        <td><?= $row['address'] ?></td>
                        <td>
                            <a href="/student/edit/<?= $row['id'] ?>" class="btn btn-warning btn-sm">Edit</a>
                            <a href="/student/delete/<?= $row['id'] ?>" 
                               class="btn btn-danger btn-sm"
                               onclick="return confirm('Are you sure you want to delete this student?')">
                               Delete
                            </a>
                            
                        </td>
                    </tr>
                <?php endforeach; ?>

                </tbody>
            </table>
            <div class="d-flex justify-content-end gap-2 mb-3">
    <a href="/login" class="btn btn-danger">
        Logout
    </a>

        </div>
    </div>

</div>

</body>
</html>