<!DOCTYPE html>
<html>
<head>
    <title>Gold Converter</title>

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
            border-radius: 5px;d
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

        .error {
            color: red;
            font-weight: bold;
            margin-top: 10px;
        }

        .result {
            font-size: 20px;
            background-color: #fef9e7;
            padding: 10px;
            border-radius: 5px;
            margin-top: 15px;
        }
    </style>
</head>
