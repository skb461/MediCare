<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MediCare</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom Styles -->
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

<?php
require 'db_connection.php';

// Fetch most ordered medicines
$result = $conn->query("SELECT * FROM Medicines WHERE is_most_ordered = TRUE LIMIT 8");
?>

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

<section id="first_section">
    <div class="row">
        <div class="col-8">
            <img src="image/medicine.jpg" class="img-thumbnail border-0" alt="">
        </div>
        <div class="col-4 first_section_text">
            <h1 class="text-center text-dark display-1">MediCare</h1>
            <h6 class="text-center text-capitalize text-muted ps-5 ms-5">a place to get rid of medicine problem</h6>
            <a href="#second_section" title=""><img src="image/down.png" alt="" class="mx-auto d-block my-5 down p-5" style="width:200px;"></a>
        </div>
    </div>
</section>

<section id="second_section" class="py-5 my-5">
    <h1 class="text-center second_section_text">The Services We Provided</h1>
    <hr class="mx-auto d-block w-25 hr_color">
    <div class="container pt-5">
        <div class="row">
            <div class="card border-0 bg-transparent" style="width: 20rem;">
                <div class="card-body card_facality py-5">
                    <h2 class="card-title text-center">Home Delivery</h2>
                    <a href="home_delivery.php" class="stretched-link"></a>
                </div>
            </div>
            <div class="card border-0 bg-transparent" style="width: 20rem;">
                <div class="card-body card_facality py-5">
                    <h2 class="card-title text-center">Medicines List</h2>
                    <a href="medicines_list.php" class="stretched-link"></a>
                </div>
            </div>
            <div class="card border-0 bg-transparent" style="width: 20rem;">
                <div class="card-body card_facality py-5">
                    <h2 class="card-title text-center">Dispensary List</h2>
                    <a href="dispensary_list.php" class="stretched-link"></a>
                </div>
            </div>
            <div class="card border-0 bg-transparent" style="width: 20rem;">
                <div class="card-body card_facality py-5">
                    <h2 class="card-title text-center">Call For Order</h2>
                    <a href="tel:+8801757569074" class="stretched-link"></a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Third Section: Most Ordered Medicines -->
<section id="third_section" class="my-5 py-5">
    <h1 class="text-center second_section_text">Most Ordered Medicines</h1>
    <hr class="mx-auto d-block w-25 hr_color" style="height: 8px;">
    <div class="container pt-5">
        <div class="row my-4">
            <?php while ($medicine = $result->fetch_assoc()): ?>
                <div class="col-md-4 mb-4">
                    <div class="card border-0 bg-transparent mx-auto" style="width: 20rem;">
                        <div class="card-body card_medicine py-5">
                            <img src="image/<?php echo strtolower(str_replace(' ', '_', $medicine['name'])); ?>.jpg" class="card-img-top" alt="<?php echo htmlspecialchars($medicine['name']); ?>">
                            <h2 class="card-title text-capitalize pt-4">Name: <?php echo htmlspecialchars($medicine['name']); ?></h2>
                            <h5 class="card-title medicine-price">Price: ৳<?php echo htmlspecialchars($medicine['price']); ?></h5>
                            <p class="text-muted medicine-availability"><b>Available:</b> <?php echo htmlspecialchars($medicine['available_quantity']); ?></p>
                            <a href="#" class="stretched-link"></a>
                        </div>
                    </div>
                </div>
            <?php endwhile; ?>
        </div>
    </div>
</section>

<!-- Fifth section -->
<section id="fifth_section" class=" py-5 my-5">
    <h1 class="text-center second_section_text">Place We Served</h1>
    <hr class="mx-auto d-block w-25 hr_color" style="height: 8px;">

    <!-- friture card -->
    <div class="container pt-5">
        <div class="row">

            <div class="card border-0 bg-transparent" style="width: 20rem;">
              <div class="card-body card_facality py-5">
                <h2 class="card-title text-capitalize text-center">Dhaka</h2>
                <a href="#" class="stretched-link"></a>
              </div>
            </div>

            <div class="card border-0 bg-transparent" style="width: 20rem;">
              <div class="card-body card_facality py-5">
                <h2 class="card-title text-capitalize text-center">Rajshahi</h2>
                <a href="#" class="stretched-link"></a>
              </div>
            </div>

            <div class="card border-0 bg-transparent" style="width: 20rem;">
              <div class="card-body card_facality py-5">
                <h2 class="card-title text-capitalize text-center">Chattogram</h2>
                <a href="#" class="stretched-link"></a>
              </div>
            </div>

            <div class="card border-0 bg-transparent" style="width: 20rem;">
              <div class="card-body card_facality py-5">
                <h2 class="card-title text-capitalize text-center">Sylhet</h2>
                <a href="#" class="stretched-link"></a>
              </div>
            </div>

        </div>
    </div>
    
</section>
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
<!-- Footer and Scripts -->
<footer class="p-4 bg-dark">
    <h6 class="text-center text-capitalize text-muted">© 2022 MediCare All rights reserved.</h6>
</footer>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
