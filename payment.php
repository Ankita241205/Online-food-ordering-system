<?php
$id = $_GET['id'];
?>

<!DOCTYPE html>
<html>
<head>
    <title>Payment</title>
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
        }

        button {
            padding: 10px 20px;
            background: #ff7a18;
            color: white;
            border: none;
            border-radius: 20px;
        }
    </style>
</head>
<body>

<div class="box">
    <h2>Online Payment</h2>
    <p>Click below to simulate payment</p>

    <a href="success.php?id=<?php echo $id; ?>">
        <button>Pay Now</button>
    </a>
</div>

</body>
</html>