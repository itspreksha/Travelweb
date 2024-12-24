<!DOCTYPE html>
<html>
<head>
    <title>Schedule Tour</title>  
    <style>
        /* General styles */
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        h2 {
            text-align: center;
            color: #333;
        }

        form {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            width: 350px;
        }

        label {
            display: block;
            margin-bottom: 8px;
            color: #666;
        }

        select, input[type="date"], input[type="submit"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border-radius: 4px;
            border: 1px solid #ccc;
            transition: border-color 0.3s ease-in-out;
        }

        select:focus, input[type="date"]:focus, input[type="submit"]:focus {
            border-color: #007bff;
            outline: none;
        }

        input[type="submit"] {
            background-color: #007bff;
            color: white;
            cursor: pointer;
            transition: background-color 0.3s ease-in-out;
        }

        input[type="submit"]:hover {
            background-color: #0056b3;
        }

        /* Animation */
        form {
            animation: slideIn 1s ease;
        }

        @keyframes slideIn {
            from {
                opacity: 0;
                transform: translateY(-50px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Error message */
        .error {
            color: red;
            margin-top: -10px;
            margin-bottom: 10px;
            text-align: center;
        }
    </style>
  
</head>
<body>
    <form action="schedule_process.php" method="post" onsubmit="return validateDates();">
        <h2>Schedule Tour</h2>
        
        <label for="source">Source:</label>
        <select id="source" name="source" required>
            <option value="Mumbai">Mumbai</option>
            <option value="Ahmedabad">Ahmedabad</option>
            <option value="Bangalore">Bangalore</option>
        </select><br><br>

        <label for="destination">Destination:</label>
        <select id="destination" name="destination" required>
            <option value="Mumbai">Mumbai</option>
            <option value="Ahmedabad">Ahmedabad</option>
            <option value="Bangalore">Bangalore</option>
        </select><br><br>

        <label for="start_date">Start Date:</label>
        <input type="date" id="start_date" name="start_date" required><br><br>

        <label for="end_date">End Date:</label>
        <input type="date" id="end_date" name="end_date" required><br>
        <div class="error" id="error_message"></div>

        <input type="submit" name="submit" value="Schedule Tour">
    </form>

    <br>
  <script>
        function validateDates() {
            const startDate = new Date(document.getElementById("start_date").value);
            const endDate = new Date(document.getElementById("end_date").value);
            
            const differenceInTime = endDate.getTime() - startDate.getTime();
            const differenceInDays = differenceInTime / (1000 * 3600 * 24);

            if (differenceInDays > 10) {
                document.getElementById("error_message").innerText = "Maximum 10 days difference allowed.";
                return false;
            } else {
                document.getElementById("error_message").innerText = "";
                return true;
            }
        }
    </script>
</body>
</html>