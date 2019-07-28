<?php $headerLoadingFile = __FILE__;
require_once (ROOT.'/views/layouts/header.php');
$counter = 1;?>

    <!-- Cart -->

    <div class="cart_section">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 offset-lg-1">
                    <div class="cart_container">
                        <?php if ($productsInCart): ?>
                        <div class="cart_title">Shopping Cart</div>
                        <div class="cart_items order_sh">

                            <table class="table text-center" style="margin: auto">
                                <thead>
                                <tr>
                                    <th scope="col"></th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Color</th>
                                    <th scope="col">Quantity</th>
                                    <th scope="col">Price</th>
                                    <th scope="col">Remove</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php foreach ($products as $product): ?>
                                <tr>
                                    <th scope="row"><div class="cart_item_image"><img src="/template/images/shopping_cart.jpg" alt=""></div><?php //echo $counter; $counter++ ?></th>
                                    <td class="align-middle"><a href="/product/<?php echo $product['id'] ?>"><?php echo $product['name'] ?></a></td>
                                    <td class="align-middle"><div class="cart_item_color cart_info_col">Silver</div></td>
                                    <td class="align-middle"><?php echo $productsInCart[$product['id']] ?></td>
                                    <td class="align-middle">$<?php echo $product['price'] ?></td>
                                    <td class="align-middle"><a href="/cart/remove/<?php echo $product['id']?>" class="remove-product"><i class="fas fa-times""></i></a></td>
                                </tr>
                                <?php  endforeach; ?>
                                </tbody>
                            </table>

                        </div>


                        <!-- Order Total -->
                        <div class="order_total">
                            <div class="order_total_content text-md-right">
                                <div class="order_total_title">Order Total:</div>
                                <div class="order_total_amount">$<?php echo $totalPrice; ?></div>
                            </div>
                        </div>

                        <div class="cart_buttons">
<!--                            <button type="button" class="button cart_button_clear">Add to Cart</button>-->
                            <a href="/cart/checkout">
                            <button type="button" class="button cart_button_checkout">Checkout</button>
                            </a>
                        </div>

                        <?php else: ?>

                            <div class="cart_title text-center">Your cart is empty.</div>

                        <?php endif; ?>

                    </div>
                </div>
            </div>
        </div>
    </div>

<?php require_once (ROOT.'/views/layouts/footer.php');?>