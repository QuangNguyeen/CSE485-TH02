<?php
session_start();
require_once(__DIR__ . '/../../models/News.php');

$news = new News();
$allNews = $news->getAll();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
            font-family: Arial, sans-serif;
        }
        .navbar-brand {
            font-size: 1.5rem;
            font-weight: bold;
        }
        .table img {
            border-radius: 5px;
            object-fit: cover;
        }
        .btn-success {
            font-size: 1rem;
            font-weight: 500;
        }
        .table th, .table td {
            vertical-align: middle;
        }
        .icon-action {
            font-size: 1.2rem;
            color: #6c757d;
            transition: color 0.3s;
        }
        .icon-action:hover {
            color: #007bff;
        }
        .footer {
            background-color: #343a40;
            color: #fff;
            text-align: center;
            padding: 10px 0;
            margin-top: 30px;
        }
    </style>
</head>
<body>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
        <a class="navbar-brand" href="dashboard.php">Admin Dashboard</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <?php if (isset($_SESSION['username'])): ?>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="userMenu" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Hello, <strong><?= $_SESSION['username'] ?></strong>
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="userMenu">
                            <li><a class="dropdown-item" href="../admin/logout.php">Logout</a></li>
                        </ul>
                    </li>
                <?php else: ?>
                    <li class="nav-item">
                        <a class="nav-link" href="../admin/login.php">Login</a>
                    </li>
                <?php endif; ?>
            </ul>
        </div>
    </div>
</nav>

<!-- Main Content -->
<div class="container mt-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1 class="h3">Manage News</h1>
        <a href="news/add.php" class="btn btn-success">Add New News</a>
    </div>

    <table class="table table-striped table-hover">
        <thead class="table-dark">
        <tr>
            <th scope="col">Title</th>
            <th scope="col">Content</th>
            <th scope="col">Image</th>
            <th scope="col">Created At</th>
            <th scope="col">Category</th>
            <th scope="col">Edit</th>
            <th scope="col">Delete</th>
        </tr>
        </thead>
        <tbody>
        <?php if (!empty($allNews)): ?>
            <?php foreach ($allNews as $news): ?>
                <tr>
                    <td><?= $news['title']; ?></td>
                    <td><?= substr($news['content'], 0, 50) . '...'; ?></td>
                    <td><img src="../../<?= $news['image']; ?>" alt="<?= $news['title']; ?>" width="100"></td>
                    <td><?= $news['created_at']; ?></td>
                    <td><?= $news['category_id']; ?></td>
                    <td>
                        <a href="news/edit.php?id=<?= $news['id'] ?>" class="icon-action">
                            <i class="bi bi-pencil-square"></i>
                        </a>
                    </td>
                    <td>
                        <a href="../../index.php?controller=news&action=delete&id=<?= $news['id']; ?>"
                           class="icon-action" onclick="return confirm('Are you sure you want to delete this news?')">
                            <i class="bi bi-trash3"></i>
                        </a>
                    </td>
                </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <tr>
                <td colspan="7" class="text-center text-muted">No news available at the moment.</td>
            </tr>
        <?php endif; ?>
        </tbody>
    </table>
</div>

<!-- Footer -->
<footer class="footer">
    <p>&copy; 2024 News Management | Admin Panel</p>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
