<!-- index.php -->
<!DOCTYPE html>
<html lang="id">
<head>
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        .content {
            padding: 20px;
        }
        .combined-box {
            border-radius: 8px;
            margin-bottom: 20px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }
        .welcome-box {
            background-color: #007bff; 
            color: white;
            padding: 15px;
            text-align: center;
        }
        .rental-box {
            background-color: #f8f9fa; 
            padding: 20px;
            color: #343a40; 
        }
        .address {
            font-size: 0.9rem; 
            color: #6c757d; 
        }
    </style>
</head>
<body>

<?php require 'sidebar.php'; ?>

<div class="container-fluid">
    <div class="row">
        <div class="col-md-3">
            <!-- Sidebar will take this space -->
        </div>
        <div class="col-md-9 content">
            <!-- Combined Box Layout -->
            <div class="combined-box">
                <div class="welcome-box">
                    <p>Selamat Datang di Rental Motor Iksan</p>
                </div>
                <div class="rental-box">
                    <h4>Rental Motor Iksan</h4>
                    <p class="address">Alamat: Jl. Ninaja no. 9 Sokaraja - Banyumas</p>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

</body>
</html>