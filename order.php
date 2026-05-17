<?php
$conn = new mysqli("localhost:3307", "root", "", "food_order");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $food = $_POST['food'];
    $payment = $_POST['payment'];

    // Insert query (includes payment)
    $sql = "INSERT INTO orders (name, phone, address, food, payment) 
            VALUES ('$name', '$phone', '$address', '$food', '$payment')";

    if ($conn->query($sql) === TRUE) {
        $order_id = $conn->insert_id; // get last inserted ID

        if ($payment == "Online") {
            header("Location: payment.php?id=$order_id");
            exit();
        }
    } else {
        die("Error: " . $conn->error);
    }

} else {
    die("Invalid Request");
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Order Status</title>
    <style>
        body {
            font-family: Arial;
            background: linear-gradient(to right, #ffecd2, #fcb69f);
            text-align: center;
            padding-top: 80px;
        }

        .box {
            background: white;
            width: 380px;
            margin: auto;
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 5px 20px rgba(0,0,0,0.2);
        }

        h2 {
            color: green;
        }

        .status {
            font-size: 18px;
            color: orange;
            font-weight: bold;
        }

        .payment {
            font-size: 16px;
            color: blue;
        }

        a {
            display: inline-block;
            margin-top: 15px;
            text-decoration: none;
            background: #ff7a18;
            color: white;
            padding: 10px 20px;
            border-radius: 20px;
        }

        a:hover {
            background: #ff4b2b;
        }
    </style>
</head>
<body>

<div class="box">

<h2> Order Placed Successfully!</h2>

<p>Thank you <b><?php echo $name; ?></b> for your order </p>
<p><b>Items:</b> <?php echo $food; ?></p>
<p><b>Delivery Address:</b> <?php echo $address; ?></p>
<p><b>Phone:</b> <?php echo $phone; ?></p>

<p><b>Status:</b> <span class="status">Preparing</span></p>

<p><b>Payment:</b> <span class="payment"><?php echo $payment; ?></span></p>

<p>
<b>Track Location:</b><br>
<a href="https://www.google.com/maps" target="_blank"> View on Map</a>
</p>

<a href="status.php?id=<?php echo $order_id; ?>"> Track Order</a>
<br>
<a href="index.html"> Back to Home</a>

</div>

<script>
localStorage.removeItem("cart");
</script>

</body>
</html>

<?php
$conn->close();
?>