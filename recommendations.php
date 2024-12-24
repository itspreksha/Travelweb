<!DOCTYPE html>
<html>
<head>
    <title>Recommendations & Feedback Page</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            background-color: #f4f4f4;
        }
        .recommendation-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-around;
        }
        .recommendation-item {
            width: 200px;
            margin: 15px;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
            background-color: #fff;
            transition: transform 0.3s ease-in-out;
        }
        .recommendation-item:hover {
            transform: scale(1.05);
        }
        .recommendation-item img {
            width: 100%;
            border-radius: 5px;
        }
        .recommendation-item h3 {
            margin-top: 10px;
            font-size: 16px;
        }
        .recommendation-item p {
            font-size: 14px;
            color: #666;
        }
        .feedback-container {
            margin-top: 50px;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            background-color: #fff;
            opacity: 0;
            animation: fadeIn 1s forwards;
        }
        .feedback-container label {
            display: block;
            margin-bottom: 10px;
            font-weight: bold;
        }
        .feedback-container input[type="radio"] {
            margin-right: 10px;
        }
        .feedback-container textarea {
            width: 100%;
            height: 100px;
            margin-top: 10px;
        }
        .feedback-container button {
            margin-top: 10px;
            padding: 10px 20px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(-20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
    </style>
</head>
<body>





<h1>Your Recommendations & Feedback</h1>

<div class="feedback-container">
    <h2>Feedback Form</h2>
    <form id="feedbackForm" method="post" action="submit_feedback.php">
        <div>
            <label for="rating">Rate our website and services:</label>
            <input type="radio" id="rating1" name="rating" value="1">
            <label for="rating1">Excellent</label>
            <input type="radio" id="rating2" name="rating" value="2">
            <label for="rating2">Very Good</label>
            <input type="radio" id="rating3" name="rating" value="3">
            <label for="rating3">Good</label>
            <input type="radio" id="rating4" name="rating" value="4">
            <label for="rating4">Fair</label>
            <input type="radio" id="rating5" name="rating" value="5">
            <label for="rating5">Poor</label>
        </div>
        <div>
            <label for="comments">Comments:</label>
            <textarea id="comments" name="comments" placeholder="Enter your comments here..."></textarea>
        </div>
        <button type="submit">Submit Feedback</button>
    </form>


</div>

</body>

<script>

    document.addEventListener('DOMContentLoaded', function () {
        const feedbackForm = document.getElementById('feedbackForm');

        feedbackForm.addEventListener('submit', function (event) {
            event.preventDefault();

            const formData = new FormData(feedbackForm);
            fetch('submit_feedback.php', {
                method: 'POST',
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                if (data.status === 'success') {
                    alert(data.message);
                    feedbackForm.reset();
                } else {
                    alert(data.message);
                }
            })
            .catch(error => {
                console.error('Error:', error);
            });
        });
    });
</script>
