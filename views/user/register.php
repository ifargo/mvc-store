<?php $headerLoadingFile = __FILE__;?>
<?php //require_once (ROOT.'/views/layouts/shopHeader.php');
require_once (ROOT.'/views/layouts/header.php');?>


<!--================Login Box Area =================-->
<section class="login_box_area section_gap">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-lg-offset-4" style="margin:auto;">
                <div class="login_form_inner">
                    <div class="logo"><a href="/">OneTech</a></div>
                    <?php if ($result): ?>
                        <h4>You are registered!</h4>
                            <?php else: ?>
                        <h3>Sign up</h3>
                        <div class="col-md-12 text-left" >
                            <?php if (isset($errors) && is_array($errors)): ?>
                                <ul>
                                    <?php foreach ($errors as $error): ?>
                                        <li style="color: red;"> - <?php echo $error ?></li>
                                    <?php endforeach; ?>
                                </ul>
                            <?php endif; ?>
                    </div>
                    <form class="row login_form " action="" method="post" id="contactForm" novalidate="novalidate">
                        <div class="col-md-12 justify-content-center form-group">
                            <input type="text" class="form-control" id="name" name="name" placeholder="Name" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Name'" value="<?php echo $name; ?>" <?php  if (isset($errors) && is_array($errors)) { echo "style=\"color: #db5246;\""; } ?>>
                        </div>
                        <div class="col-md-12 justify-content-center form-group">
                            <input type="email" class="form-control" id="email" name="email" placeholder="Email" onfocus="this.placeholder = ''" onblur="this.placeholder = 'E-mail'" value="<?php echo $email; ?>" <?php  if (isset($errors) && is_array($errors)) { echo "style=\"color: #db5246;\""; } ?>>
                        </div>
                        <div class="col-md-12 justify-content-center form-group">
                            <input type="password" class="form-control" id="password" name="password" placeholder="Password" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Password'" value="<?php echo $password; ?>" <?php  if (isset($errors) && is_array($errors)) { echo "style=\"color: #db5246;\""; } ?>>
                        </div>
                        <div class="col-md-12 justify-content-center form-group">
                            <button type="submit" value="submit" name="submit" class="btn btn-default">Register</button>
                        </div>
                    </form>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</section>


<?php require_once (ROOT.'/views/layouts/footer.php'); ?>
