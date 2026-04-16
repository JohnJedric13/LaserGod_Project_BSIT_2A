<!DOCTYPE html>
<html>
<head>
    <title>Add Student</title>

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background-color: #f5f7fa;
        }
        .card {
            border-radius: 12px;
        }
    </style>
</head>
<body>

<div class="container mt-5">

    <div class="card shadow mx-auto" style="max-width: 600px;">

        <div class="card-header bg-primary text-white">
            <h4 class="mb-0">➕ Add New Student</h4>
        </div>

        <div class="card-body">

            <form method="post" action="<?= base_url('student/store') ?>">

                <div class="mb-3">
                    <label class="form-label">Full Name</label>
                    <input type="text" name="fullname" class="form-control" placeholder="Enter full name" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Email</label>
                    <input type="text" name="email" class="form-control" placeholder="Enter email" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">School Year</label>
                    <select class="form-select" name="schoolyear">
                        <option value="Unknown">Select Year</option>
                        <option value="Grade 7">Grade 7</option>
                        <option value="Grade 8">Grade 8</option>
                        <option value="Grade 9">Grade 9</option>
                        <option value="Grade 10">Grade 10</option>
                        <option value="Grade 11">Grade 11</option>
                        <option value="Grade 12">Grade 12</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label">Birthday</label>
                    <input type="date" name="birthday" class="form-control">
                </div>

                <div class="mb-3">
                    <label class="form-label">Address</label>
                    <input type="text" name="address" class="form-control" placeholder="Enter address">
                </div>

                <div class="d-flex justify-content-between">
                    <a href="<?= base_url('student') ?>" class="btn btn-secondary">⬅ Back</a>
                    <button type="submit" class="btn btn-success">💾 Save</button>
                </div>

            </form>

        </div>
    </div>

</div>

</body>
</html>
