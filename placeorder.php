<?=template_header('Place Order')?>

<div class="placeorder content-wrapper">
    <h1>Your order has been received.</h1>
    <p>Thank you for choosing us for your shopping! We will contact you via e-mail with your order details.</p>
</div>

<?=template_footer()?>

<?php

session_unset();
session_destroy();

?>