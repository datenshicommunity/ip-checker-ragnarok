<?php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $ip_address = $_POST['ip_address'];

    $stmt = $pdo->prepare("SELECT account_id, userid, email FROM login WHERE last_ip = :ip_address");
    $stmt->execute(['ip_address' => $ip_address]);
    $users = $stmt->fetchAll(PDO::FETCH_ASSOC);

    if ($users) {
        echo "<h3>Users with IP: " . htmlspecialchars($ip_address) . "</h3>";
        foreach ($users as $user) {
            echo "Account ID: " . htmlspecialchars($user['account_id']) . "<br>";
            echo "User ID: " . htmlspecialchars($user['userid']) . "<br>";
            echo "Email: " . htmlspecialchars($user['email']) . "<br><br>";
        }
    } else {
        echo "No users found with that IP address.";
    }
}
?>