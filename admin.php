<?php
$conn = new mysqli("localhost:3307", "root", "", "food_order");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Update status
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $status = $_POST['status'];

    $conn->query("UPDATE orders SET status='$status' WHERE ID='$id'");
}

// Fetch all orders
$result = $conn->query("SELECT * FROM orders");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin Panel</title>
    <style>
    body {
        font-family: Arial;
        background: linear-gradient(to right, #ffecd2, #fcb69f);
        text-align: center;
        padding-top: 50px;
    }

    .container {
        background: white;
        width: 90%;
        max-width: 900px;
        margin: auto;
        padding: 20px;
        border-radius: 15px;
        box-shadow: 0 5px 20px rgba(0,0,0,0.2);
    }

    h2 {
        color: green;
        margin-bottom: 20px;
    }

    table {
        width: 100%;
        border-collapse: collapse;
    }

    th {
        background: #ff7a18;
        color: white;
        padding: 10px;
    }

    td {
        padding: 10px;
        border-bottom: 1px solid #ddd;
    }

    tr:hover {
        background-color: #f5f5f5;
    }

    select {
        padding: 5px;
        border-radius: 5px;
    }

    button {
        background: #ff7a18;
        color: white;
        border: none;
        padding: 6px 12px;
        border-radius: 15px;
        cursor: pointer;
    }

    button:hover {
        background: #ff4b2b;
    }
</style>
</head>
<body>

<div class="container">
    <h2>Admin Panel - Update Order Status</h2>

<table>
<tr>
    <th>ID</th>
    <th>Name</th>
    <th>Food</th>
    <th>Status</th>
    <th>Update</th>
</tr>

<?php while($row = $result->fetch_assoc()) { ?>
<tr>
    <form method="POST">
        <td><?php echo $row['ID']; ?></td>
        <td><?php echo $row['name']; ?></td>
        <td><?php echo $row['food']; ?></td>

        <td>
            <select name="status">
                <option <?php if($row['status']=="Preparing") echo "selected"; ?>>Preparing</option>
                <option <?php if($row['status']=="Out for Delivery") echo "selected"; ?>>Out for Delivery</option>
                <option <?php if($row['status']=="Delivered") echo "selected"; ?>>Delivered</option>
            </select>
        </td>

        <td>
            <input type="hidden" name="id" value="<?php echo $row['ID']; ?>">
            <button type="submit">Update</button>
        </td>
    </form>
</tr>
<?php } ?>

</table>

</body>
</html>

<?php $conn->close(); ?>