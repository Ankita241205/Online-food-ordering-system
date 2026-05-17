<?php
$conn = new mysqli("localhost:3307", "root", "", "food_order");

$id = $_GET['id'];

// Update payment status
$conn->query("UPDATE orders SET payment='Paid' WHERE ID='$id'");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Payment Success</title>

    <style>
        body {
            font-family: Arial;
            background: linear-gradient(to right, #ffecd2, #fcb69f);
            text-align: center;
            padding-top: 100px;
        }

        .box {
            background: white;
            width: 350px;
            margin: auto;
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 5px 20px rgba(0,0,0,0.2);
        }

        h2 {
            color: green;
        }

        p {
            font-size: 16px;
            color: #333;
        }

        a {
            display: inline-block;
            margin-top: 20px;
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
    <h2>Payment Successful ✅</h2>
    <p>Your payment has been completed successfully.</p>

    <a href="status.php?id=<?php echo $id; ?>">Track Order</a>
</div>

</body>
</html>