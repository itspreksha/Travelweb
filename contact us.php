<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <style> body {
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
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 0;
            padding: 20px;
            background-color: #f9f9f9;
        }

        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
            color: #333;
            margin-bottom: 20px;
        }

        .admin-section {
            margin-top: 40px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
        }

        .admin-card {
            flex: 0 0 calc(33.3333% - 20px);
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
            margin-bottom: 20px;
            transition: box-shadow 0.3s;
            text-align: center;
        }

        .admin-card:hover {
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
        }

        .admin-card img {
            width: 100px;
            height: 100px;
            border-radius: 50%;
            margin-bottom: 15px;
            object-fit: cover;
            display: block;
            margin-left: auto;
            margin-right: auto;
        }

        .admin-card h3 {
            font-size: 20px;
            color: #333;
            margin-bottom: 10px;
        }

        .admin-card p {
            font-size: 16px;
            color: #666;
            margin-bottom: 15px;
        }

        .admin-card .social-links a {
            margin-right: 10px;
            color: #007bff;
            transition: color 0.3s;
        }

        .admin-card .social-links a:hover {
            color: #0056b3;
        }

        /* Animation */
        @keyframes fadeIn {
            from {
                opacity: 0;
            }

            to {
                opacity: 1;
            }
        }

        @keyframes slideIn {
            from {
                transform: translateY(-20px);
                opacity: 0;
            }

            to {
                transform: translateY(0);
                opacity: 1;
            }
        }

        .admin-card {
            animation: fadeIn 0.6s ease-out, slideIn 0.6s ease-out;
        }
    </style>
</head>
<body><a href="index.php" class="home-icon">🏠</a>
    <div class="container">
        <h1>Contact Us</h1>

        <div class="admin-section">
            <!-- Admin 1 -->
            <div class="admin-card">
                <img src="Preksha (2).jpeg" alt="Admin 1">
                <h3>Preksha Joshi</h3>
                <p>Admin</p>
                <p>itspreksha54@gmail.com</p>
                <div class="social-links">
                    <a href="https://www.instagram.com/_.thechillhouse?igsh=MnQwbG9mOXZtZWt0" target="_blank"><i class="fab fa-instagram"></i></a>
                </div>
            </div>

            <!-- Admin 2 -->
            <div class="admin-card">
                <img src="jayana.jpeg" alt="Admin 2">
                <h3>Jayana Joshi</h3>
                <p>Admin</p>
                <p>jayana.joshi24.sw@gmail.com</p>
                <div class="social-links">
                    <a href="https://www.instagram.com/_.thechillhouse?igsh=MnQwbG9mOXZtZWt0" target="_blank"><i class="fab fa-instagram"></i></a>
                </div>
            </div>

          
            </div>
        </div>
    </div>

    <script>
        function submitForm(event) {
            event.preventDefault();
            showPopup();
        }

        function showPopup() {
            document.getElementById('overlay').style.display = 'flex';
        }

        function closePopup() {
            document.getElementById('overlay').style.display = 'none';
        }
    </script>
</body>
</html>
