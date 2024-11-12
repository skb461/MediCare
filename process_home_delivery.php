<?php
require 'db_connection.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $nid = $_POST['nid'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $address = $_POST['address'];

    // Array to store medicines and their amounts
    $medicines = [];

    // Loop through each medicine field (maximum 10)
    for ($i = 1; $i <= 10; $i++) {
        if (isset($_POST["medicine_name_$i"]) && isset($_POST["amount_$i"])) {
            $medicine_name = $_POST["medicine_name_$i"];
            $amount = $_POST["amount_$i"];

            // Add to the medicines array only if there's a valid input
            if (!empty($medicine_name) && !empty($amount)) {
                $medicines[] = [
                    'medicine_name' => $medicine_name,
                    'amount' => $amount
                ];
            }
        }
    }

    // Check if any medicines were added
    if (count($medicines) > 0) {
        // Insert order details into HomeDelivery table
        $sql = "INSERT INTO HomeDelivery (hname, nid, phone, email, haddress) VALUES ('$name', '$nid', '$phone', '$email', '$address')";
        
        if ($conn->query($sql) === TRUE) {
            // Get the ID of the last inserted order
            $order_id = $conn->insert_id;

            // Insert each medicine into the OrderMedicines table (assumes this table exists)
            $medicines_inserted = true;
            foreach ($medicines as $medicine) {
                $medicine_name = $medicine['medicine_name'];
                $amount = $medicine['amount'];
                $medicine_sql = "INSERT INTO OrderMedicines (order_id, medicine_name, amount) VALUES ('$order_id', '$medicine_name', '$amount')";

                if (!$conn->query($medicine_sql)) {
                    $medicines_inserted = false;
                    break;
                }
            }

            if ($medicines_inserted) {
                echo "Order placed successfully with medicines.";
            } else {
                echo "Error adding medicines to the order.";
            }
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    } else {
        echo "Please add at least one medicine.";
    }
}
?>
