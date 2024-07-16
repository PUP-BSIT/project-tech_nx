<?php
session_start();
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['pet_name'])) {
    $_SESSION['recently_viewed_pet_name'] = $_POST['pet_name'];
    echo 'Pet name set in session: ' . $_POST['pet_name'];
} else {
    echo 'No pet name provided';
}
?>
