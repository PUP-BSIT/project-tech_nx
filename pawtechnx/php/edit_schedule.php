<?php
include 'dataconnection.php';

if (isset($_GET['schedule_ID'])) {
    $schedule_ID = $_GET['schedule_ID'];

    $sql = "SELECT * FROM schedule WHERE schedule_ID='$schedule_ID'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $adoption_ID = $_POST['adoption_ID'];
        $name = $_POST['name'];
        $date = $_POST['date'];
        $type = $_POST['type'];
        $status = $_POST['status'];

        $sql = "UPDATE schedule SET adoption_ID='$adoption_ID', name='$name', date='$date', type='$type', status='$status' WHERE schedule_ID='$schedule_ID'";

        if (mysqli_query($conn, $sql)) {
            echo "Record updated successfully";
        } else {
            echo "Error: " . mysqli_error($conn);
        }

        mysqli_close($conn);
        header('Location: ../php/dashboard.php');
        exit();
    }
} else {
    echo "Invalid request.";
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Schedule</title>
    <link href="../style/dashboard_style.css" rel="stylesheet">
</head>
<body>
    <div class="form-container">
        <h2>Edit Adoption Meeting</h2>
        <form action="edit_schedule.php?schedule_ID=<?php echo $schedule_ID; ?>" method="POST">
            <div class="form-group">
                <label for="adoption_ID">Adoption ID</label>
                <input type="text" id="adoption_ID" name="adoption_ID" value="<?php echo $row['adoption_ID']; ?>" required />
            </div>
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" id="name" name="name" value="<?php echo $row['name']; ?>" required />
            </div>
            <div class="form-group">
                <label for="date">Date</label>
                <input type="date" id="date" name="date" value="<?php echo $row['date']; ?>" required />
            </div>
            <div class="form-group">
                <label for="type">Type of Meeting</label>
                <select id="type" name="type" required>
                    <option value="">Select Type</option>
                    <option value="Online" <?php echo $row['type'] == 'Online' ? 'selected' : ''; ?>>Online</option>
                    <option value="Visit" <?php echo $row['type'] == 'Visit' ? 'selected' : ''; ?>>Visit</option>
                </select>
            </div>
            <div class="form-group">
                <label for="status">Status</label>
                <select id="status" name="status" required>
                    <option value="">Select Status</option>
                    <option value="In Progress" <?php echo $row['status'] == 'In Progress' ? 'selected' : ''; ?>>In Progress</option>
                    <option value="Not Started" <?php echo $row['status'] == 'Not Started' ? 'selected' : ''; ?>>Not Started</option>
                    <option value="Done" <?php echo $row['status'] == 'Done' ? 'selected' : ''; ?>>Done</option>
                </select>
            </div>
            <button type="submit">Update Meeting</button>
        </form>
    </div>
</body>
</html>
