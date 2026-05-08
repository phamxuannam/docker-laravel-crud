<?php
$servername = "mysql";
$username = "user";
$password = "password";
$dbname = "mydb";

// Tạo kết nối
$conn = new mysqli($servername, $username, $password, $dbname);

// Kiểm tra kết nối
if ($conn->connect_error) {
    die("Kết nối thất bại: " . $conn->connect_error);
}

// Query table users (giả sử table này tồn tại với cột id, name, email)
$sql = "SELECT id, name, age FROM users";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<h2>Danh sách Users</h2>";
    echo "<table border='1'><tr><th>ID</th><th>Name</th><th>age</th></tr>";
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>" . $row["id"]. "</td><td>" . $row["name"]. "</td><td>" . $row["age"]. "</td></tr>";
    }
    echo "</table>";
} else {
    echo "Không có dữ liệu trong table users.";
}

$conn->close();
?>