<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MediCare</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f0f2f5;
        }
        .delivery-card {
            border-radius: 15px;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.2);
        }
        .delivery-card-header {
            background-color: #5596FF;
            color: #fff;
            padding: 20px;
            border-top-left-radius: 15px;
            border-top-right-radius: 15px;
        }
        .form-label {
            font-weight: bold;
            color: #5596FF;
        }
        .btn-submit {
            background-color: #5596FF;
            border: none;
        }
        .btn-submit:hover {
            background-color: #4177cc;
        }
    </style>
    <script>
        let medicineCount = 1;

        function addMedicineField() {
            if (medicineCount < 10) {
                medicineCount++;
                
                const medicineContainer = document.getElementById('medicineContainer');
                
                const newMedicineDiv = document.createElement('div');
                newMedicineDiv.classList.add('mb-3', 'medicine-field');

                const medicineNameLabel = document.createElement('label');
                medicineNameLabel.classList.add('form-label');
                medicineNameLabel.innerText = `Medicine Name ${medicineCount}:`;
                newMedicineDiv.appendChild(medicineNameLabel);
                
                const medicineNameInput = document.createElement('input');
                medicineNameInput.type = 'text';
                medicineNameInput.name = `medicine_name_${medicineCount}`;
                medicineNameInput.classList.add('form-control', 'mt-1');
                medicineNameInput.placeholder = 'Enter medicine name';
                medicineNameInput.required = true;
                newMedicineDiv.appendChild(medicineNameInput);
                
                const medicineAmountLabel = document.createElement('label');
                medicineAmountLabel.classList.add('form-label', 'mt-2');
                medicineAmountLabel.innerText = `Amount ${medicineCount}:`;
                newMedicineDiv.appendChild(medicineAmountLabel);
                
                const medicineAmountInput = document.createElement('input');
                medicineAmountInput.type = 'number';
                medicineAmountInput.name = `amount_${medicineCount}`;
                medicineAmountInput.classList.add('form-control', 'mt-1');
                medicineAmountInput.placeholder = 'Enter quantity';
                medicineAmountInput.required = true;
                newMedicineDiv.appendChild(medicineAmountInput);
                
                medicineContainer.appendChild(newMedicineDiv);
            } else {
                alert('You can add up to 10 medicines only.');
            }
        }
    </script>
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

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-lg-6">
            <div class="card delivery-card">
                <div class="delivery-card-header text-center">
                    <h2 class="mb-0"><i class="fas fa-shipping-fast me-2"></i>Home Delivery</h2>
                </div>
                <div class="card-body p-4 bg-white">
                    <form action="process_home_delivery.php" method="POST">
                        <div class="mb-3">
                            <label for="name" class="form-label"><i class="fas fa-user me-2"></i>Name:</label>
                            <input type="text" id="name" name="name" class="form-control" placeholder="Enter your name" required>
                        </div>
                        
                        <div class="mb-3">
                            <label for="nid" class="form-label"><i class="fas fa-id-card me-2"></i>NID:</label>
                            <input type="text" id="nid" name="nid" class="form-control" placeholder="Enter your NID number" required>
                        </div>

                        <div class="mb-3">
                            <label for="phone" class="form-label"><i class="fas fa-phone-alt me-2"></i>Phone:</label>
                            <input type="tel" id="phone" name="phone" class="form-control" placeholder="Enter your phone number" required>
                        </div>
                        
                        <div class="mb-3">
                            <label for="email" class="form-label"><i class="fas fa-envelope me-2"></i>Email:</label>
                            <input type="email" id="email" name="email" class="form-control" placeholder="Enter your email address" required>
                        </div>
                        
                        <div class="mb-3">
                            <label for="address" class="form-label"><i class="fas fa-home me-2"></i>Home Address:</label>
                            <textarea id="address" name="address" class="form-control" rows="3" placeholder="Enter your home address" required></textarea>
                        </div>

                        <h5 class="form-label mt-4">Medicines</h5>
                        <div id="medicineContainer">
                            <!-- Initial medicine field -->
                            <div class="mb-3 medicine-field">
                                <label class="form-label">Medicine Name 1:</label>
                                <input type="text" name="medicine_name_1" class="form-control" placeholder="Enter medicine name" required>

                                <label class="form-label mt-2">Amount 1:</label>
                                <input type="number" name="amount_1" class="form-control" placeholder="Enter quantity" required>
                            </div>
                        </div>
                        
                        <button type="button" class="btn btn-outline-primary mb-3" onclick="addMedicineField()">Add Another Medicine</button>

                        <button type="submit" class="btn btn-submit w-100 py-2 text-white"><i class="fas fa-paper-plane me-2"></i>Submit</button>
                    </form>
                </div>
            </div>
        </div>
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

<script src="https://kit.fontawesome.com/09dd817247.js" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
