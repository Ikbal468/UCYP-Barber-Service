<?php
session_start();
include 'connect.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Detail</title>
    <link rel="stylesheet" href="css/productstyle.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>
<body>
    <div class="product-detail-container">
        <div class="product-image">
            <img src="images/services/85935d2529884090bfc956235dd0fc8a.jpg" alt="Suavecito Pomade">
        </div>
        <div class="product-info">
            <h1 class="product-title">Suavecito Pomade</h1>
            <p class="product-description">Achieve a strong hold with Suavecito Pomade, featuring a medium shine that keeps your style polished all day. This water-soluble formula is easy to apply and wash out, making it perfect for classic and modern hairstyles alike. Enjoy a firm, flexible hold with a subtle, masculine fragrance.</p>
            
            <div class="price-quantity-container">
                <div class="product-price">RM 25.00</div>
                <div class="quantity-selector">
                    <div class="add flex1">
                        <span class="quantity-minus">
                            <i class='bx bx-minus-circle'></i>
                        </span>
                        <label class="quantity-label">1</label>
                        <span class="quantity-plus">
                            <i class='bx bx-plus-circle'></i>
                        </span>
                    </div>
                </div>
            </div>

            <div class="price-and-button-container" style="display: flex; align-items: center; justify-content: space-between; margin-top: 40px;">
                <div class="total-cost" style="font-size: 40px;">Total: RM 25.00</div>

                <!-- Purchase Form -->
                <form method="POST" action="connect.php" style="text-align: right;">
                    <input type="hidden" name="fullname" value="<?php echo $_SESSION['fullname']; ?>">
                    <input type="hidden" name="productname" value="Suavecito Pomade">
                    <input type="hidden" name="price" value="25.00">
                    <input type="hidden" name="quantity" id="quantityInput" value="1">

                    <button class="add-to-cart-button" name="buyProduct" style="width: 250px;">Buy now</button>
                </form>
            </div>
        </div>
    </div>

    <script>
    document.addEventListener('DOMContentLoaded', function() {
        const minusButton = document.querySelector('.quantity-minus');
        const plusButton = document.querySelector('.quantity-plus');
        const quantityLabel = document.querySelector('.quantity-label');
        const totalCostLabel = document.querySelector('.total-cost');
        const quantityInput = document.getElementById('quantityInput');
        const productPrice = 25; // Product price in RM

        let quantity = 1; // Initial quantity

        // Function to update total cost
        function updateTotalCost() {
            const totalCost = productPrice * quantity;
            totalCostLabel.textContent = `Total: RM ${totalCost.toFixed(2)}`;
            quantityInput.value = quantity; // Update hidden input
        }

        // Function to handle minus button click
        minusButton.addEventListener('click', function() {
            if (quantity > 1) {
                quantity--;
                quantityLabel.textContent = quantity;
                updateTotalCost();
            }
        });

        // Function to handle plus button click
        plusButton.addEventListener('click', function() {
            quantity++;
            quantityLabel.textContent = quantity;
            updateTotalCost();
        });

        // Initial update of total cost
        updateTotalCost();
    });
    </script>
</body>
</html>
