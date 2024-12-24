<?php
include 'feedback_db_config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $week_number = $_POST["week_number"];
    $date = $_POST["date"];
    $title = $_POST["title"];
    $update_content = $_POST["update_content"];
    $image_url = $_POST["image_url"];
    $bookmyshow_url = $_POST["bookmyshow_url"];

    $sql = "INSERT INTO weekly_updates (week_number, date, title, update_content, image_url, bookmyshow_url) VALUES (?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("isssss", $week_number, $date, $title, $update_content, $image_url, $bookmyshow_url);

    if ($stmt->execute()) {
        echo json_encode(["status" => "success", "message" => "Weekly update submitted successfully"]);
    } else {
        echo json_encode(["status" => "error", "message" => "Error submitting weekly update"]);
    }

    $stmt->close();
    $conn->close();
}
?>
