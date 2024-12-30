<?php
/**
 * Executes an SQL statement using MySQLi prepared statements.
 *
 * @param mysqli $conn   The active MySQLi connection
 * @param string $sql    The SQL query with placeholders (e.g. "SELECT * FROM table WHERE id = ?")
 * @param array  $params Optional array of parameters to bind (e.g. [123, 'abc'])
 *
 * @return mysqli_result|bool Returns mysqli_result on SELECT, or true/false for INSERT/UPDATE/DELETE queries.
 */
function runQuery($conn, $sql, $params = [])
{
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
        return true;    // For INSERT/UPDATE/DELETE
    }
}
?>
