<?php
require 'db_connection.php';
$result = $conn->query("SELECT * FROM Medicines");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MediCare</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background-color: #f0f2f5;
        }
        .card_medicine {
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
            transition: transform 0.3s ease;
            text-align: center;
        }
        .card_medicine:hover {
            transform: scale(1.05);
        }
        .medicine-price {
            color: #28a745;
            font-weight: bold;
        }
        .medicine-availability {
            color: #ff6f61;
        }
    </style>
</head>
<body>

<nav class="navbar navbar-expand-sm navbar-light nav_menu">
    <div class="container-fluid">
        <a class="navbar-brand" href="index.php">MediCare</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mynavbar">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="mynavbar">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item"><a class="nav-link" href="#">Home</a></li>
                <li class="nav-item"><a class="nav-link" href="about.php">About</a></li>
                <li class="nav-item"><a class="nav-link" href="medicines_list.php">Medicines</a></li>
                <li class="nav-item"><a class="nav-link" href="dispensary_list.php">Dispensary</a></li>
                <li class="nav-item"><a class="nav-link" href="home_delivery.php">Home Delivery</a></li>
                <li class="nav-item"><a class="nav-link btn btn-outline-info" href="javascript:void(0)">Donate</a></li>
            </ul>
        </div>
    </div>
</nav>

<div class="container">
    <h2 class="text-center my-4">Available Medicines</h2>
    <div class="row">
        <?php while ($row = $result->fetch_assoc()): ?>
            <div class="col-md-4 mb-4">
                <div class="card border-0 bg-transparent mx-auto" style="width: 20rem;">
                    <div class="card-body card_medicine py-5">
                        <!-- Replace with dynamic image if available, or set a default image -->
                        <img src="image/<?php echo htmlspecialchars($row['name']); ?>.jpg" class="card-img-top" alt="<?php echo htmlspecialchars($row['name']); ?>">
                        
                        <!-- Medicine Information -->
                        <h2 class="card-title text-capitalize pt-4">Name: <?php echo htmlspecialchars($row['name']); ?></h2>
                        <h5 class="card-title medicine-price">Price: ৳<?php echo htmlspecialchars($row['price']); ?></h5>
                        <p class="text-muted medicine-availability"><b>Available:</b> <?php echo htmlspecialchars($row['available_quantity']); ?></p>
                        
                        <a href="#" class="stretched-link"></a>
                    </div>
                </div>
            </div>
        <?php endwhile; ?>
    </div>
</div>

<!-- pre footer section -->

<section id="six_section" class="pre_footer py-5">
    <div class="container">
        <div class="row">
            <div class="col-3">
                <img src="image/medicare-logo.png" class="img-thumbnail border-0 bg-transparent" alt="">
            </div>

            <div class="col-7 six_section_text">
                <h1 class="text-center display-1">
                    MediCare
                </h1>
                <h6 class="text-center text-capitalize ps-5 ms-5">a place to get rid of medicine problem</h6>
            </div>

            <div class="col-2">
                <ul class="list-group list-group-flush bg-transparent six_section_list">
                    <li class="list-group-item bg-transparent text-light border-info text-center"><b>Menu</b></li>
                    <li class="list-group-item bg-transparent text-light border-info text-center"> Home</li>
                    <li class="list-group-item bg-transparent text-light border-info text-center"> About</li>
                    <li class="list-group-item bg-transparent text-light border-info text-center"> Medicine</li>
                    <li class="list-group-item bg-transparent text-light border-info text-center"> Local Store</li>
                </ul>
            </div>
        </div>
    </div>
</section>

<footer class="p-4 bg-dark">
    <h6 class="text-center text-capitalize text-muted">© 2022 MediCare All rights reserved.</h6>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
