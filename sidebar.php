<!-- sidebar_view.php -->
<div class="d-flex flex-column flex-shrink-0 p-3 bg-light" style="width: 250px; height: 100vh; position: fixed; box-shadow: 2px 0 5px rgba(0, 0, 0, 0.1);">
    <div class="text-center mb-4">
        <h5 class="mt-2">Rental Motor</h5>
    </div>
    <hr>
    <ul class="nav flex-column mb-auto">
        <li class="nav-item">
            <a href="index.php" class="nav-link text-dark">
                <i class="fas fa-home me-2"></i> Home
            </a>
        </li>
        <li class="nav-item">
            <a href="motor.php" class="nav-link text-dark">
                <i class="fas fa-motorcycle me-2"></i> Data Motor
            </a>
        </li>
        <li class="nav-item">
            <a href="penyewa_view.php" class="nav-link text-dark">
                <i class="fas fa-user me-2"></i> Data Penyewa
            </a>
        </li>
    </ul>
</div>

<style>
    body {
        font-family: Arial, sans-serif;
    }
    .nav-link {
        padding: 10px 15px;
        border-radius: 0.25rem;
        transition: background-color 0.2s;
        text-decoration: none;
    }
    .nav-link:hover {
        background-color: rgba(0, 123, 255, 0.1);
        color: #007bff;
    }
    .nav-link.active {
        font-weight: bold;
        color: #007bff;
    }
</style>

<!-- Include Font Awesome -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">