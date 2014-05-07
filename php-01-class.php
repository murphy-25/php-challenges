<html>

<body>
<h1>Shopping Cart Challenge</h1>
<p>To expand from this:</p>
<ul>
    <li>A interface could be used.</li>
    <li>The session could be stored in a session on the client browser.</li>
</ul>

<?php
    require_once '\ShoppingCart.php';
    $ShoppingCart = new \shoppingcart\ShoppingCart();
    echo '<b>Add and display cart</b><br>';
    $ShoppingCart->addItem(123, 'Chicken', 3, 4);
    $ShoppingCart->addItem(327, 'Mince Meat', 3, 3);
    $ShoppingCart->displayCart();
    echo '<b>Delete Product ID: 324 from cart and display updated cart.</b><br>';
    $ShoppingCart->deleteItem(327);
    $ShoppingCart->displayCart();

/*
* Sources:
* http://www.php.net/manual/en/language.oop5.php
*/
?>
</body>
</html>