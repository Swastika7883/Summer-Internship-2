<?php
include 'nav.php';
include '../gemini/response.php';

$response = '';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $product_type = htmlspecialchars($_POST['product_type']);
    $response = response("Find eco-friendly products for $product_type");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eco-Friendly Product Finder - GreenPath</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f9f9f9;
            color: #333;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        header, footer {
            background-color: rgb(0,109,82); /* Green theme */
            color: #fff;
            padding: 10px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        header .logo, footer .logo {
            font-size: 24px;
            font-weight: bold;
        }

        header .logo img, footer .logo img {
            height: 40px;
        }

        nav ul {
            list-style: none;
            margin: 0;
            padding: 0;
            display: flex;
            background-color: rgb(0,109,82); /* Green background for nav */
        }

        nav ul li {
            margin: 0 10px;
        }

        nav ul li a {
            text-decoration: none;
            color: #fff; /* White text */
            padding: 10px;
            transition: color 0.3s;
        }

        nav ul li a:hover {
            color: #c8e6c9; /* Light green on hover */
        }

        main {
            flex: 1;
            padding: 20px;
        }

        .product-finder-container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            border: 1px solid #ccc;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
            border-radius: 8px;
        }

        .product-finder-container h1 {
            text-align: center;
            color: rgb(0,109,82); /* Green theme */
        }

        .product-finder-container form {
            display: flex;
            flex-direction: column;
        }

        .product-finder-container label {
            margin-top: 10px;
        }

        .product-finder-container input[type="text"] {
            padding: 10px;
            font-size: 16px;
            margin-top: 5px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
            width: 100%;
            box-sizing: border-box;
        }

        .product-finder-container input[type="submit"] {
            padding: 10px;
            background-color: rgb(0,109,82); /* Green theme */
            color: #fff;
            border: none;
            cursor: pointer;
            font-size: 16px;
            border-radius: 4px;
        }

        .product-finder-container input[type="submit"]:hover {
            background-color: #388E3C; /* Darker green */
        }

        .response {
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <main>
        <div class="product-finder-container">
            <h1>Eco-Friendly Product Finder</h1>
            <form method="post" action="">
                <label for="product_type">Enter product type:</label>
                <input type="text" id="product_type" name="product_type" required>
                <input type="submit" value="Suggest Products">
            </form>

            <?php if (!empty($response)): ?>
                <div class="response">
                    <h2>Results:</h2>
                    <p><?php 
                        $formattedGuide = str_replace(['**', '*'], '', $response);
                        echo nl2br(htmlspecialchars($formattedGuide)); 
                    ?></p>
                </div>
            <?php endif; ?>
        </div>
    </main>

    <?php include 'footer.php'; ?>
</body>
</html>
