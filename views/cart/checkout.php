<?php $headerLoadingFile = __FILE__;
require_once (ROOT.'/views/layouts/header.php');?>

<!--================Checkout Area =================-->
<section class="checkout_area section_gap">
    <div class="container">

<?php if ($result): ?>
<h3>Your order has been received. Thank you!</h3>
<?php else: ?>

        <div class="billing_details">
            <div class="row">
                <div class="col-lg-8">
                    <div class="order_box">
                        <h2>Your Order</h2>
                        <ul class="list">
                            <li><a href="#">Product <span>Total</span></a></li>
                            <?php foreach ($products as $product): ?>
                            <li><a href="#"><?php echo $product['name'];?><span class="middle">x <?php echo $productsInCart[$product['id']];?></span> <span class="last">$<?php echo $product['price'];?></span></a></li>
<!--                            <li><a href="#">Fresh Tomatoes <span class="middle">x 02</span> <span class="last">$720.00</span></a></li>-->
<!--                            <li><a href="#">Fresh Brocoli <span class="middle">x 02</span> <span class="last">$720.00</span></a></li>-->
                            <?php endforeach; ?>
                        </ul>
                        <ul class="list list_2">
                            <li><a href="#">Total <span>$<?php echo $totalPrice;?></span></a></li>
                        </ul>

                        <div class="creat_account">
                            <input type="checkbox" id="f-option4" name="selector">
                            <label for="f-option4">I’ve read and accept the </label>
                            <a href="#">terms & conditions*</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <h3>Billing Details</h3>
                    <?php if (isset($user)): ?>
                        <?php if (isset($errors) && is_array($errors)): ?>
                            <ul>
                            <?php foreach ($errors as $error): ?>
                                <li style="color: red;"> - <?php echo $error ?></li>
                            <?php endforeach; ?>
                            </ul>
                        <?php endif; ?>
                    <form class="row contact_form" action="" method="post" novalidate="novalidate">
                        <div class="col-md-12 form-group">
                            <input type="text" class="form-control" id="first" name="userName" placeholder="Your Name" value="<?php echo $userName;?>">
                        </div>
                        <div class="col-md-12 form-group">
                            <input type="text" class="form-control" id="number" name="userPhoneNumber" placeholder="Your Phone number" value="<?php echo $userPhoneNumber;?>">
                        </div>
                        <div class="col-md-12 form-group">
                            <input type="text" class="form-control" id="email" name="userEmail" placeholder="Your Email" value="<?php echo $userEmail;?>">
                        </div>
                        <div class="col-md-12 form-group">
                            <input type="text" class="form-control" id="address" name="userAddress" placeholder="Your Address" value="<?php echo $userAddress;?>">
                        </div>
                        <div class="col-md-12 form-group">
                            <textarea type="text" class="form-control" id="comm" name="userComment" rows="2" placeholder="Comments"></textarea>
                        </div>
                        <button type="submit" value="submit" name="submit" class="btn primary-btn" style="margin: auto;">Submit order</button>
                    </form>

                    <?php else: ?>
                        <?php if (isset($errors) && is_array($errors)): ?>
                            <ul>
                                <?php foreach ($errors as $error): ?>
                                    <li style="color: red;"> - <?php echo $error ?></li>
                                <?php endforeach; ?>
                            </ul>
                        <?php endif; ?>
                        <form class="row contact_form" action="" method="post" novalidate="novalidate">

                            <div class="col-md-12 form-group">
                                <input type="text" class="form-control" id="first" name="userName" placeholder="Your Name" value="<?php echo $userName;?>">
                            </div>

                            <div class="col-md-12 form-group">
                                <input type="text" class="form-control" id="number" name="userPhoneNumber" placeholder="Your Phone number" value="<?php echo $userPhoneNumber;?>">
                            </div>

                            <div class="col-md-12 form-group">
                                <input type="text" class="form-control" id="email" name="userEmail" placeholder="Your Email" value="<?php echo $userEmail;?>">
                            </div>
                            <div class="col-md-12 form-group">
                                <input type="text" class="form-control" id="address" name="userAddress" placeholder="Your Address" value="<?php echo $userAddress;?>">
                            </div>
                            <div class="col-md-12 form-group">
                                <textarea type="text" class="form-control" id="comm" name="userComment" rows="2" placeholder="Comments"></textarea>
                            </div>
                            <div class="col-md-12 form-group">
                                <button type="submit" value="submit" name="submit" class="btn primary-btn" style="margin: auto;">Submit order</button>
                            </div>
                        </form>
                    <?php endif; ?>
                </div>
            </div>
        </div>
<?php endif; ?>
    </div>
</section>
<!--================End Checkout Area =================-->

<?php require_once (ROOT.'/views/layouts/footer.php');?>