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
            <img src="images/services/f1caf5_7e45858d88044fc08d372e4476e2eadc~mv2.jpg" alt="Magnum Pomade">
        </div>
        <div class="product-info">
            <h1 class="product-title">Magnum Pomade</h1>
            <p class="product-description">Magnum Pomade provides an ultra-strong hold with a high shine finish, perfect for bold and defined hairstyles. Its long-lasting formula is water-soluble for easy application and clean removal. Enjoy a sleek, polished look with a subtle, masculine fragrance.</p>
            
            <div class="price-quantity-container">
                <div class="product-price">RM 30.00</div>
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
                <div class="total-cost" style="font-size: 40px;">Total: RM 30.00</div>

                <!-- Purchase Form -->
                <form method="POST" action="connect.php" style="text-align: right;">
                    <input type="hidden" name="fullname" value="<?php echo $_SESSION['fullname']; ?>">
                    <input type="hidden" name="productname" value="Magnum Pomade">
                    <input type="hidden" name="price" value="30.00">
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
        const productPrice = 30; // Product price in RM

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
