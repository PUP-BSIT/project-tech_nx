<?php
include './dataconnection.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['user_id'])) {
        $user_id = $_POST['user_id'];
        
        $delete_sql = "DELETE FROM users WHERE `user_id` = ?";
        $delete_stmt = mysqli_prepare($conn, $delete_sql);
        mysqli_stmt_bind_param($delete_stmt, "s", $user_id);

        if (mysqli_stmt_execute($delete_stmt)) {
            header("Location: user_list.php");
            exit;
        } else {
            echo "Error deleting user: " . mysqli_error($conn);
        }

        mysqli_stmt_close($delete_stmt);
    } else {
        echo "No user ID provided.";
    }
} else {
    echo "Invalid request method.";
}

mysqli_close($conn);
?>
