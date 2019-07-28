<?php $headerLoadingFile = __FILE__;
require_once (ROOT.'/views/layouts/header.php');?>


<!--================Login Box Area =================-->
<section class="login_box_area section_gap">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="login_box_img">
                    <img class="img-fluid" src="/template/images/login.jpg" alt="">
                    <div class="hover">
                        <h4>New to our website?</h4>
                        <p>There are advances being made in science and technology everyday, and a good example of this is the</p>
                        <a class="primary-btn" href="/user/register">Create an Account</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="login_form_inner">
                    <h3>Log in to enter</h3>

                        <?php if (isset($errors) && is_array($errors)): ?>
                    <div class="col-md-12 text-left login_form" style="margin: auto;">
                            <ul>
                                <?php foreach ($errors as $error): ?>
                                    <li style="color: red;"> - <?php echo $error ?></li>
                                <?php endforeach; ?>
                            </ul>
                    </div>
                        <?php endif; ?>

                    <form class="row login_form" action="" method="post" id="contactForm" novalidate="novalidate">
                        <div class="col-md-12 form-group">
                            <input type="email" class="form-control" id="email" name="email" value="<?php echo $email; ?>" placeholder="E-mail" onfocus="this.placeholder = ''" onblur="this.placeholder = 'E-mail'" <?php  if (isset($errors) && is_array($errors)) { echo "style=\"color: #db5246;\""; } ?>>
                        </div>
                        <div class="col-md-12 form-group">
                            <input type="password" class="form-control" id="password" name="password" value="<?php echo $password; ?>" placeholder="Password" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Password'" <?php  if (isset($errors) && is_array($errors)) { echo "style=\"color: #db5246;\""; } ?>>
                        </div>
                        <div class="col-md-12 form-group">
                            <div class="creat_account">
                                <input type="checkbox" id="f-option2" name="selector">
                                <label for="f-option2">Keep me logged in</label>
                            </div>
                        </div>
                        <div class="col-md-12 form-group">
                            <button type="submit" value="submit" name="submit" class="primary-btn">Log In</button>
<!--                            <a href="#">Forgot Password?</a>-->
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<!--================End Login Box Area =================-->

<?php require_once (ROOT.'/views/layouts/footer.php'); ?>
