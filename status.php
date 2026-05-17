<?php
$conn = new mysqli("localhost:3307", "root", "", "food_order");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$id = $_GET['id'];

$sql = "SELECT * FROM orders WHERE ID = '$id'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
} else {
    die("Order not found");
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Track Order</title>
    <style>
    body {
        font-family: Arial;
        background: linear-gradient(to right, #ffecd2, #fcb69f); /* same as other pages */
        text-align: center;
        padding-top: 80px;
    }

    .box {
        background: white;
        width: 400px;
        margin: auto;
        padding: 30px;
        border-radius: 15px;
        box-shadow: 0 5px 20px rgba(0,0,0,0.2);
    }

    .status {
        font-size: 22px;
        color: orange;
        font-weight: bold;
    }

    .progress {
        display: flex;
        justify-content: space-between;
        margin: 20px 0;
        padding: 0 20px;
    }

    .step {
        padding: 10px 15px;
        background: #ddd;
        border-radius: 20px;
        color: #333;
        font-weight: bold;
        transition: 0.3s;
    }

    .step.active {
        background: #ff7a18; /* same orange as other pages */
        color: white;
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
    <h2>Track Your Order</h2>

    <p><b>Name:</b> <?php echo $row['name']; ?></p>
    <p><b>Food:</b> <?php echo $row['food']; ?></p>
    <p><b>Address:</b> <?php echo $row['address']; ?></p>

    <div class="progress">
        <div class="step <?php if($row['status']=="Preparing") echo "active"; ?>">Preparing</div>
        <div class="step <?php if($row['status']=="Out for Delivery") echo "active"; ?>">Out for Delivery</div>
        <div class="step <?php if($row['status']=="Delivered") echo "active"; ?>">Delivered</div>
    </div>

    <p><b>Payment:</b> <?php echo $row['payment']; ?></p>

    <br>
    <a href="index.html">Back to Home</a>
</div>

</body>
</html>

<?php
$conn->close();
?>