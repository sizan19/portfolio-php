<?php
/**
 * Database connection and utility functions
 */

// Database credentials
$host = "localhost";
$user = "root";
$pass = "";
$dbname = "portfolio_db";

// Create connection
$conn = new mysqli($host, $user, $pass, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Database connection failed: " . $conn->connect_error);
}

/**
 * Executes an SQL statement using MySQLi prepared statements.
 *
 * @param string $sql    The SQL query with placeholders (e.g. "SELECT * FROM table WHERE id = ?")
 * @param array  $params Optional array of parameters to bind (e.g. [123, 'abc'])
 *
 * @return mysqli_result|bool Returns mysqli_result on SELECT, or true/false for INSERT/UPDATE/DELETE queries.
 */
function runQuery($sql, $params = [])
{
    global $conn; // Use the global connection

    // Prepare the statement
    $stmt = $conn->prepare($sql);
    if (!$stmt) {
        die("Prepare failed: " . $conn->error);
    }

    // If we have parameters, bind them
    if (!empty($params)) {
        $types = '';
        foreach ($params as $param) {
            if (is_int($param)) {
                $types .= 'i';
            } elseif (is_float($param)) {
                $types .= 'd';
            } else {
                $types .= 's';
            }
        }
        $stmt->bind_param($types, ...$params);
    }

    // Execute the query
    if (!$stmt->execute()) {
        die("Execute failed: " . $stmt->error);
    }

    $result = $stmt->get_result();
    if ($result) {
        return $result; // SELECT query
    } else {
        return true;    // INSERT/UPDATE/DELETE
    }
}
?>
