<!DOCTYPE html>
<html>
<head>
    <title>Edit Student</title>

    <!-- Bootstrap -->
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
        
        <div class="card-header bg-warning text-dark">
            <h4 class="mb-0">✏️ Edit Student</h4>
        </div>

        <div class="card-body">

            <form method="post" action="<?= base_url('student/update/'.$student['id']) ?>">

                <div class="mb-3">
                    <label class="form-label">Full Name</label>
                    <input type="text" name="fullname" class="form-control" value="<?= $student['fullname'] ?>" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Email</label>
                    <input type="email" name="email" class="form-control" value="<?= $student['email'] ?>" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">School Year</label>
                    <select class="form-select" name="schoolyear">
                        <?php 
                        $years = ["Grade 7","Grade 8","Grade 9","Grade 10","Grade 11","Grade 12"];
                        foreach($years as $year): ?>
                            <option value="<?= $year ?>" <?= ($student['schoolyear'] == $year) ? 'selected' : '' ?>>
                                <?= $year ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label">Birthday</label>
                    <input type="date" name="birthday" class="form-control" value="<?= $student['birthday'] ?>">
                </div>

                <div class="mb-3">
                    <label class="form-label">Address</label>
                    <input type="text" name="address" class="form-control" value="<?= $student['address'] ?>">
                </div>

                <div class="d-flex justify-content-between">
                    <a href="<?= base_url('student') ?>" class="btn btn-secondary">⬅ Back</a>
                    <button type="submit" class="btn btn-success">💾 Update</button>
                </div>

            </form>

        </div>
    </div>

</div>

</body>
</html>