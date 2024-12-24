<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking Form</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 20px;
        }

        form {
            max-width: 500px;
            margin: 50px auto;
            background-color: #fff;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            overflow: hidden;
            animation: slideIn 0.5s ease-in-out;
        }

        @keyframes slideIn {
            from {
                opacity: 0;
                transform: translateY(-20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        label {
            display: block;
            font-weight: bold;
            margin-top: 10px;
        }

        input[type="text"],
        input[type="date"],
        select {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        input[type="submit"] {
            width: 100%;
            padding: 10px;
            margin-top: 20px;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        input[type="submit"]:hover {
            background-color: #0056b3;
        }

        #upiDetails,
        #cardDetails {
            margin-top: 10px;
        }

        #upiDetails,
        #cardDetails label {
            display: block;
        }

        #upiDetails input,
        #cardDetails input {
            margin-top: 5px;
        }

        /* Responsive design */
        @media (max-width: 600px) {
            form {
                padding: 10px;
            }

            input[type="submit"] {
                margin-top: 15px;
            }
        }

    </style>
</head>
<body>

<form id="bookingForm" action="processs_booking.php" method="post">
    <label for="name">Name:</label>
    <input type="text" id="name" name="name" required>

    <label for="startDate">Start Date:</label>
    <input type="date" id="startDate" name="startDate" required>

    <label for="endDate">End Date:</label>
    <input type="date" id="endDate" name="endDate" required>

    <label for="paymentOption">Payment Option:</label>
    <select id="paymentOption" name="paymentOption">
        <option value="upi">UPI</option>
        <option value="card">Card</option>
    </select>

    <div id="upiDetails" style="display: none;">
        <label for="upiId">UPI ID:</label>
        <input type="text" id="upiId" name="upiId">
    </div>

    <div id="cardDetails" style="display: none;">
        <label for="cardNumber">Card Number:</label>
        <input type="text" id="cardNumber" name="cardNumber">

        <label for="expiryDate">Expiry Date:</label>
        <input type="text" id="expiryDate" name="expiryDate">

        <label for="cvv">CVV:</label>
        <input type="text" id="cvv" name="cvv">
    </div>

    <label for="location">Location:</label>
    <select id="location" name="location">
        <option value="Udaipur">Udaipur</option>
        <option value="Jaipur">Jaipur</option>
        <option value="Jaisalmer">Jaisalmer</option>
                <option value="Goa">Goa</option>
                 <option value="Srinagar">Srinagar</option>
                  <option value="Jammu">Jammu</option>
                   <option value="Gulmarg">Gulmarg</option>
                    <option value="Gujarat">Gujarat</option>
                   
                      <option value="Mumbai">Mumbai</option>
                       <option value="Pune">Pune</option>
                       <option value="Andhrapradesh">Andhrapradesh</option>
                        <option value="Kerela">Kerela</option><!-- comment -->
                      
                          <option value="Odissa">Odissa</option>
                           <option value="Assam">Assam</option>
                            <option value="Sikkim">Sikkim</option>
                             <option value="Amritsar">Amritsar</option>
                              <option value="Chandigarh">Chandigarh</option>
        <!-- Add more cities as needed -->
    </select>

    <input type="submit" value="Book Now">
</form>

<script>
    document.addEventListener('DOMContentLoaded', function() {
    const bookingForm = document.getElementById('bookingForm');
    const paymentOption = document.getElementById('paymentOption');
    const upiDetails = document.getElementById('upiDetails');
    const cardDetails = document.getElementById('cardDetails');
    
    paymentOption.addEventListener('change', function() {
        if (paymentOption.value === 'upi') {
            upiDetails.style.display = 'block';
            cardDetails.style.display = 'none';
        } else if (paymentOption.value === 'card') {
            upiDetails.style.display = 'none';
            cardDetails.style.display = 'block';
        }
    });
    
    bookingForm.addEventListener('submit', function(event) {
        event.preventDefault();
        
        // Validate and send data to server
        const formData = new FormData(bookingForm);
        
        fetch('processs_booking.php', {
            method: 'POST',
            body: formData
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                window.location.href = `receipt.php?id=${data.bookingId}`;
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

</body>
</html>
