<!DOCTYPE html>
<html>
<head>
    <title>Booking Form</title>
    <style>  body {
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
    }form {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            background: #f9f9f9;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        input[type="text"],
        input[type="email"],
        input[type="tel"],
        select,
        input[type="date"],
        input[type="password"] {
            width: 100%;
            padding: 10px;
            margin: 8px 0;
            display: inline-block;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        input[type="submit"] {
            width: 100%;
            background-color: #4CAF50;
            color: white;
            padding: 14px 20px;
            margin: 8px 0;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }

        /* CSS for hiding/showing payment details */
        #payment_details {
            display: none;
        }

        /* CSS for error message */
        .error {
            color: red;
        }
    h2
    {
        text-align: center;
    }
    </style>
</head>
<body>
   <a href="index.php" class="home-icon">🏠</a>
<h2>Booking Form</h2>

<form action="process_booking.php" method="post">
    <label for="name">Name:</label>
    <input type="text" id="name" name="name" required><br><br>

    <label for="email">Email:</label>
    <input type="email" id="email" name="email" required><br><br>

    <label for="phone">Phone:</label>
    <input type="text" id="phone" name="phone" required><br><br>

    <label for="payment_method">Payment Method:</label>
    <select id="payment_method" name="payment_method" required>
        <option value="UPI">UPI</option>
        <option value="Credit/Debit Card">Credit/Debit Card</option>
    </select><br><br>

    <div id="upi_id_div">
        <label for="upi_id">UPI ID:</label>
        <input type="text" id="upi_id" name="upi_id"><br><br>
    </div>

    <div id="cvv_div" style="display:none;">
        <label for="cvv">CVV:</label>
        <input type="text" id="cvv" name="cvv"><br><br>
    </div>

    <label for="start_date">Start Date:</label>
    <input type="date" id="start_date" name="start_date" min="<?php echo date('Y-m-d'); ?>" required><br><br>

    <label for="end_date">End Date:</label>
    <input type="date" id="end_date" name="end_date" min="<?php echo date('Y-m-d'); ?>" required><br><br>

    <label for="package">Package:</label>
    <select id="package" name="package" required>
        <option value="Select Package">Select Package</option>
        <option value="Adventure Trekking">Adventure Trekking (40000/=)</option>
        <option value="Beach Paradise">Beach Paradise (30000/=)</option>
        <option value="Himalayan Adventure">Himalayan Adventure (50000/=)</option>
        <option value="Cultural Expedition">Cultural Expedition (45000/=)</option>
    </select><br><br>

   <label for="amount">Total Amount (Rs):</label>
<input type="text" id="amount" name="amount" readonly><br><br>

    <input type="submit" name="submit" value="Book Now">
</form>

<script>
document.getElementById('package').addEventListener('change', function() {
    var package = this.value;
    var amount = document.getElementById('amount');

    if(package === "Adventure Trekking") {
        amount.value = "40000.00 Rs";
    } else if(package === "Beach Paradise") {
        amount.value = "30000.00 Rs";
    } else if(package === "Himalayan Adventure") {
        amount.value = "50000.00 Rs";
    } else if(package === "Cultural Expedition") {
        amount.value = "45000.00 Rs";
    } else {
        amount.value = "0.00 Rs";
    }
});

document.getElementById('payment_method').addEventListener('change', function() {
    var upiDiv = document.getElementById('upi_id_div');
    var cvvDiv = document.getElementById('cvv_div');

    if(this.value === "UPI") {
        upiDiv.style.display = "block";
        cvvDiv.style.display = "none";
    } else {
        upiDiv.style.display = "none";
        cvvDiv.style.display = "block";
    }

});

document.getElementById('payment_method').addEventListener('change', function() {
    var upiDiv = document.getElementById('upi_id_div');
    var cvvDiv = document.getElementById('cvv_div');

    if(this.value === "UPI") {
        upiDiv.style.display = "block";
        cvvDiv.style.display = "none";
    } else {
        upiDiv.style.display = "none";
        cvvDiv.style.display = "block";
    }
});
</script>


</body>
</html>
