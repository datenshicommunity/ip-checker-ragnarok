<?php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $account_id = (int)$_POST['account_id']; // Casting to int for added security

    $stmt = $pdo->prepare("SELECT account_id, userid, email, last_ip FROM login WHERE account_id = :account_id");
    $stmt->execute(['account_id' => $account_id]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user) {
        echo "<h3>User Information</h3>";
        echo "Account ID: " . htmlspecialchars($user['account_id']) . "<br>";
        echo "User ID: " . htmlspecialchars($user['userid']) . "<br>";
        echo "Email: " . htmlspecialchars($user['email']) . "<br>";
        echo "Last IP: " . htmlspecialchars($user['last_ip']) . "<br>";
    } else {
        echo "No user found with that Account ID.";
    }
}
?>
