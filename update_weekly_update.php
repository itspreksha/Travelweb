<?php
include 'db_config.php';

$update_message = "";
$add_message = "";

// Update existing weekly update
if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $week_number = $_POST['week_number'];
    $date = $_POST['date'];
    $title = $_POST['title'];
    $update_content = $_POST['update_content'];
    $image_url = $_POST['image_url'];
    $bookmyshow_url = $_POST['bookmyshow_url'];

    $sql = "UPDATE weekly_updates SET week_number=?, date=?, title=?, update_content=?, image_url=?, bookmyshow_url=? WHERE id=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("isssssi", $week_number, $date, $title, $update_content, $image_url, $bookmyshow_url, $id);

    if ($stmt->execute()) {
        $update_message = "Weekly update updated successfully";
    } else {
        $update_message = "Error updating weekly update";
    }

    $stmt->close();
}

// Add new weekly update
if (isset($_POST['add'])) {
    $week_number = $_POST['week_number'];
    $date = $_POST['date'];
    $title = $_POST['title'];
    $update_content = $_POST['update_content'];
    $image_url = $_POST['image_url'];
    $bookmyshow_url = $_POST['bookmyshow_url'];

    $sql = "INSERT INTO weekly_updates (week_number, date, title, update_content, image_url, bookmyshow_url) VALUES (?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("isssss", $week_number, $date, $title, $update_content, $image_url, $bookmyshow_url);

    if ($stmt->execute()) {
        $add_message = "New weekly update added successfully";
    } else {
        $add_message = "Error adding new weekly update";
    }

    $stmt->close();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Update Weekly Update</title>
    <style>
         body {
        margin: 0;
        padding: 0;
    }

    .home-icon {
        position: fixed;
        top: 20px; /* Adjust the top position as needed */
        left: 20px; /* Adjust the left position as needed */
        display: inline-block;
        width: 50px;
        height: 50px;
        background: rgba(255, 255, 255, 0.8);
        color: white;
        text-align: center;
        line-height: 50px;
        border-radius: 50%;
        font-size: 24px;
        cursor: pointer;
        transition: background-color 0.3s;
        text-decoration: none;
        z-index: 1000; /* Ensure the icon is above other content */
    }

    .home-icon:hover {
   background: #0056b3;
    }
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            background-color: #f4f4f4;
        }
        form {
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
        }
        label {
            display: block;
            margin-top: 10px;
            font-weight: bold;
        }
        input[type="text"], input[type="date"], textarea {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            border-radius: 4px;
            border: 1px solid #ccc;
        }
        button {
            padding: 10px 20px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            margin-top: 10px;
        }
        button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
   <a href="index.php" class="home-icon">🏠</a>
<h2>Update Weekly Update</h2>

<?php if ($update_message) : ?>
    <p style="color: green;"><?php echo $update_message; ?></p>
<?php endif; ?>

<?php if ($add_message) : ?>
    <p style="color: green;"><?php echo $add_message; ?></p>
<?php endif; ?>

<!-- Update form -->
<form method="post" action="">
    <?php
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $sql = "SELECT * FROM weekly_updates WHERE id=?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        $row = $result->fetch_assoc();
    ?>
        <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
        <label for="week_number">Week Number:</label>
        <input type="number" name="week_number" value="<?php echo $row['week_number']; ?>" required>

        <label for="date">Date:</label>
        <input type="date" name="date" value="<?php echo $row['date']; ?>" required>

        <label for="title">Title:</label>
        <input type="text" name="title" value="<?php echo $row['title']; ?>" required>

        <label for="update_content">Update Content:</label>
        <textarea name="update_content" required><?php echo $row['update_content']; ?></textarea>

        <label for="image_url">Image URL:</label>
        <input type="text" name="image_url" value="<?php echo $row['image_url']; ?>">

        <label for="bookmyshow_url">BookMyShow URL:</label>
        <input type="text" name="bookmyshow_url" value="<?php echo $row['bookmyshow_url']; ?>">

        <button type="submit" name="update">Update</button>
    <?php
        $stmt->close();
    }
    ?>
</form>

<!-- Add form -->
<h2>Add Weekly Update</h2>

<form method="post" action="">
    <label for="week_number">Week Number:</label>
    <input type="number" name="week_number" required>

    <label for="date">Date:</label>
    <input type="date" name="date" required>

    <label for="title">Title:</label>
    <input type="text" name="title" required>

    <label for="update_content">Update Content:</label>
    <textarea name="update_content" required></textarea>

    <label for="image_url">Image URL:</label>
    <input type="text" name="image_url">

    <label for="bookmyshow_url">BookMyShow URL:</label>
    <input type="text" name="bookmyshow_url">

    <button type="submit" name="add">Add</button>
</form>

</body>
</html>

<?php
$conn->close();
?>
