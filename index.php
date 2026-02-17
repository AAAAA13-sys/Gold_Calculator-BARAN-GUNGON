<!DOCTYPE html>
<html>
<head>
    <title>Gold Value Calculator</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background: url("goldbars.png");
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            height: 90vh;
            position: relative;
        }

        .container {
            background: white;
            position: absolute;
            top: 50%;
            right: 10%;
            transform: translateY(-50%);
            padding: 50px;
            border-radius: 25px;
            width: 500px;
            display: flex;
            flex-direction: column;
            gap: 15px;
            box-shadow: 0 5px 15px rgb(254, 233, 0);
        }

        h2 {
            text-align: center;
            color: #cda90a;
        }

        input[type="number"] {
            font-size: 20px;
            width: 95%;
            padding: 10px;
            margin-top: 10px;
            border-radius: 5px;
            border: 1px solid #ccc;
        }

        input[type="submit"] {
            width: 100%;
            padding: 10px;
            margin-top: 10px;
            background-color: #e6bb0f;
            border: none;
            color: white;
            font-size: 20px;
            font-weight: bold;
            border-radius: 5px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #c35816;
        }

        .result {
            font-size: 20px;
            background-color: #fef9e7;
            padding: 15px;
            border-radius: 5px;
            margin-top: 15px;
            border-left: 5px solid #e6bb0f;
        }

        .error {
            font-size: 18px;
            background-color: #ffebee;
            padding: 15px;
            border-radius: 5px;
            margin-top: 15px;
            color: #c62828;
            border-left: 5px solid #c62828;
        }

        .hint {
            font-size: 14px;
            color: #666;
            margin-top: 5px;
            font-style: italic;
        }

        .hint i {
            color: #e6bb0f;
        }

        .required {
            color: #c35816;
            font-size: 16px;
        }
    </style>
</head>
<body>
    <?php
    // Initialize variables
    $showResult = false;
    $showError = false;
    $errorMessage = '';
    $weight = '';
    $price = '';
    $ounces = '';
    $kg = '';
    $total = '';
    
    // Check if form was submitted
    if (isset($_GET['weight']) && isset($_GET['price'])) {
        
        // Check if fields are empty
        if ($_GET['weight'] === '' || $_GET['price'] === '') {
            $showError = true;
            $errorMessage = 'Please fill in all fields!';
        }
        // Check if values are positive numbers
        else if ($_GET['weight'] <= 0 || $_GET['price'] <= 0) {
            $showError = true;
            $errorMessage = 'Please enter positive numbers only!';
        }
        else {
            $weight = $_GET['weight'];
            $price = $_GET['price'];
            
            // Calculate
            $ounces = $weight / 28.3495;
            $kg = $weight / 1000;
            $total = $weight * $price;
            
            $showResult = true;
        }
    }
    ?>

    <div class="container">
        <h2>Gold Value Calculator</h2>
        <form method="GET">
            <div>
                <label>Weight (grams): <span class="required">*</span></label><br>
                <input type="number" name="weight" step="0.01" min="0.01" placeholder="Enter Weight" value="<?php echo htmlspecialchars($weight); ?>" required>
            </div>
            
            <div>
                <label>Price per gram (₱): <span class="required">*</span></label><br>
                <input type="number"name="price" step="0.01" placeholder="Enter Price" value="<?php echo htmlspecialchars($price); ?>" required>
            </div>
            
            <input type="submit" value="CALCULATE GOLD VALUE">
        </form>
        
        <?php if ($showError): ?>
        <div class="error">
            <strong>Error:</strong> <?php echo $errorMessage; ?>
        </div>
        <?php endif; ?>
        
        <?php if ($showResult): ?>
        <div class="result">
            <strong>Results:</strong><br>
            Weight: <?php echo number_format($weight, 2); ?> grams<br>
            Ounces: <?php echo number_format($ounces, 4); ?> oz<br>
            Kilograms: <?php echo number_format($kg, 4); ?> kg<br>
            Total: ₱<?php echo number_format($total, 2); ?>
        </div>
        <?php endif; ?>
    </div>
</body>
</html>