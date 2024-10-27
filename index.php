<?php
// Retrieve authentication credentials from environment
$valid_username = getenv('AUTH_USERNAME');
$valid_password = getenv('AUTH_PASSWORD');

// Check if the user is authenticated
if (!isset($_SERVER['PHP_AUTH_USER']) || !isset($_SERVER['PHP_AUTH_PW']) ||
    $_SERVER['PHP_AUTH_USER'] !== $valid_username || $_SERVER['PHP_AUTH_PW'] !== $valid_password) {
    // If not, send authentication headers
    header('WWW-Authenticate: Basic realm="Restricted Area"');
    header('HTTP/1.0 401 Unauthorized');
    echo 'Authentication required.';
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Information Checker</title>
</head>
<body>
    <h2>Check User by Account ID</h2>
    <form action="check_user.php" method="POST">
        <label for="account_id">Account ID:</label>
        <input type="number" name="account_id" required>
        <button type="submit">Check User</button>
    </form>

    <h2>Check IP Address for Shared Users</h2>
    <form action="check_ip.php" method="POST">
        <label for="ip_address">IP Address:</label>
        <input type="text" name="ip_address" required>
        <button type="submit">Check IP</button>
    </form>
</body>
</html>
