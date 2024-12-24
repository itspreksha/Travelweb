<?php
include 'feedback_db_config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $rating = $_POST["rating"];
    $comments = $_POST["comments"];

    $sql = "INSERT INTO feedback (rating, comments) VALUES (?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("is", $rating, $comments);

    if ($stmt->execute()) {
        echo json_encode(["status" => "success", "message" => "Feedback submitted successfully"]);
    } else {
        echo json_encode(["status" => "error", "message" => "Error submitting feedback"]);
    }

    $stmt->close();
    $conn->close();
}
?>
