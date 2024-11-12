<?php
session_start();

// Check if the user is logged in; if not, redirect to login page
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("Location: login.php");
    exit;
}

require 'db_connection.php';

// Fetch delivery orders with JOIN
$deliveryOrders = $conn->query("
    SELECT HomeDelivery.id AS order_id, hname, nid, phone, email, haddress, medicine_name, amount 
    FROM HomeDelivery 
    JOIN OrderMedicines ON HomeDelivery.id = OrderMedicines.order_id
    ORDER BY order_id
");

// Fetch medicine inventory
$medicines = $conn->query("SELECT * FROM Medicines");

// Handle new medicine submission
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['add_medicine'])) {
    $name = $_POST['name'];
    $price = $_POST['price'];
    $quantity = $_POST['quantity'];

    $addMedicineQuery = "INSERT INTO Medicines (name, price, available_quantity) VALUES ('$name', '$price', '$quantity')";
    if ($conn->query($addMedicineQuery)) {
        echo "<script>alert('Medicine added successfully!'); window.location.href = 'admin_dashboard.php';</script>";
    } else {
        echo "<script>alert('Error adding medicine: " . $conn->error . "');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f9f9f9;
            padding: 20px;
        }
        .section-title {
            color: #5596FF;
            font-weight: bold;
            margin-top: 20px;
        }
        .card {
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
        }
        .table-grouped tbody tr[data-order-id] {
            transition: background-color 0.3s;
        }
        .form-label {
            font-weight: bold;
            color: #5596FF;
        }
    </style>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            // Apply same color to rows with the same order ID
            const rows = document.querySelectorAll(".table-grouped tbody tr[data-order-id]");
            let colors = {};
            let colorIndex = 0;
            const colorPalette = ["#e0f7fa", "#ffebee", "#f3e5f5", "#e8f5e9", "#fff3e0"];

            rows.forEach(row => {
                const orderId = row.getAttribute("data-order-id");
                if (!colors[orderId]) {
                    colors[orderId] = colorPalette[colorIndex % colorPalette.length];
                    colorIndex++;
                }
                row.style.backgroundColor = colors[orderId];
            });
        });
    </script>
</head>
<body>

<div class="container">
    <h2 class="text-center mb-4">Admin Dashboard</h2>
    <div class="text-end mb-3">
        <a href="logout.php" class="btn btn-danger">Logout</a>
    </div>

    <!-- Delivery Orders Section -->
    <section id="delivery_orders">
        <h3 class="section-title">Delivery Orders</h3>
        <div class="table-responsive">
            <table class="table table-bordered table-striped table-grouped">
                <thead>
                    <tr>
                        <th>Order ID</th>
                        <th>Customer Name</th>
                        <th>NID</th>
                        <th>Phone</th>
                        <th>Email</th>
                        <th>Address</th>
                        <th>Medicine Name</th>
                        <th>Amount</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($order = $deliveryOrders->fetch_assoc()): ?>
                        <tr data-order-id="<?php echo htmlspecialchars($order['order_id']); ?>">
                            <td><?php echo htmlspecialchars($order['order_id']); ?></td>
                            <td><?php echo htmlspecialchars($order['hname']); ?></td>
                            <td><?php echo htmlspecialchars($order['nid']); ?></td>
                            <td><?php echo htmlspecialchars($order['phone']); ?></td>
                            <td><?php echo htmlspecialchars($order['email']); ?></td>
                            <td><?php echo htmlspecialchars($order['haddress']); ?></td>
                            <td><?php echo htmlspecialchars($order['medicine_name']); ?></td>
                            <td><?php echo htmlspecialchars($order['amount']); ?></td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </div>
    </section>

    <!-- Medicines Inventory Section -->
    <section id="medicine_inventory">
        <h3 class="section-title">Medicines Inventory</h3>
        <div class="table-responsive">
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Medicine ID</th>
                        <th>Name</th>
                        <th>Price (৳)</th>
                        <th>Available Quantity</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($medicine = $medicines->fetch_assoc()): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($medicine['id']); ?></td>
                            <td><?php echo htmlspecialchars($medicine['name']); ?></td>
                            <td><?php echo htmlspecialchars($medicine['price']); ?></td>
                            <td><?php echo htmlspecialchars($medicine['available_quantity']); ?></td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </div>
    </section>

    <!-- Add Medicine Form -->
    <section id="add_medicine">
        <h3 class="section-title">Add New Medicine</h3>
        <form action="admin_dashboard.php" method="POST" class="p-3 border rounded bg-white">
            <div class="mb-3">
                <label for="name" class="form-label">Medicine Name</label>
                <input type="text" id="name" name="name" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="price" class="form-label">Price (৳)</label>
                <input type="number" id="price" name="price" class="form-control" step="0.01" required>
            </div>
            <div class="mb-3">
                <label for="quantity" class="form-label">Available Quantity</label>
                <input type="number" id="quantity" name="quantity" class="form-control" required>
            </div>
            <button type="submit" name="add_medicine" class="btn btn-primary">Add Medicine</button>
        </form>
    </section>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
