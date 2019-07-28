<?php $headerLoadingFile = __FILE__;
require_once (ROOT.'/views/layouts/header.php');?>

<?php if ($result): ?>
        <h4 class="text-center" style="margin-top: 80px">Your message has been sent! We will email you our response.</h4>
    <?php else: ?>

    <?php if (isset($errors) && is_array($errors)): ?>
        <div class="col-md-12 text-left login_form" style="margin: auto;">
            <ul>
                <?php foreach ($errors as $error): ?>
                    <li style="color: red;"> - <?php echo $error ?></li>
                <?php endforeach; ?>
            </ul>
        </div>
    <?php endif; ?>

    <!-- Contact Info -->

    <div class="contact_info">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 offset-lg-1">
                    <div class="contact_info_container d-flex flex-lg-row flex-column justify-content-between align-items-between">

                        <!-- Contact Item -->
                        <div class="contact_info_item d-flex flex-row align-items-center justify-content-start">
                            <div class="contact_info_image"><img src="/template/images/contact_1.png" alt=""></div>
                            <div class="contact_info_content">
                                <div class="contact_info_title">Phone</div>
                                <div class="contact_info_text">+38 068 005 3570</div>
                            </div>
                        </div>

                        <!-- Contact Item -->
                        <div class="contact_info_item d-flex flex-row align-items-center justify-content-start">
                            <div class="contact_info_image"><img src="/template/images/contact_2.png" alt=""></div>
                            <div class="contact_info_content">
                                <div class="contact_info_title">Email</div>
                                <div class="contact_info_text">fastsales@gmail.com</div>
                            </div>
                        </div>

                        <!-- Contact Item -->
                        <div class="contact_info_item d-flex flex-row align-items-center justify-content-start">
                            <div class="contact_info_image"><img src="/template/images/contact_3.png" alt=""></div>
                            <div class="contact_info_content">
                                <div class="contact_info_title">Address</div>
                                <div class="contact_info_text">10 Suffolk at Soho, London, UK</div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Contact Form -->

    <div class="contact_form">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 offset-lg-1">
                    <div class="contact_form_container">
                        <div class="contact_form_title">Get in Touch</div>

                        <form action="" id="contact_form" method="post">
                            <div class="contact_form_inputs d-flex flex-md-row flex-column justify-content-between align-items-between">
                                <input type="text" id="contact_form_name" name="userName" value="<?php echo $userName; ?>" class="contact_form_name input_field" placeholder="Your name" required="required" data-error="Name is required.">
                                <input type="text" id="contact_form_email" name="userEmail" value="<?php echo $userEmail; ?>" class="contact_form_email input_field" placeholder="Your email" required="required" data-error="Email is required.">
                                <input type="text" id="contact_form_phone" name="userPhone" value="<?php echo $userPhone; ?>" class="contact_form_phone input_field" placeholder="Your phone number">
                            </div>
                            <div class="contact_form_text">
                                <textarea id="contact_form_message" name="userText" class="text_field contact_form_message" name="userText" rows="4" placeholder="Message" required="required" data-error="Please, write us a message."><?php echo $userText; ?></textarea>
                            </div>
                            <div class="contact_form_button">
                                <button type="submit" name="submit" class="button contact_submit_button">Send Message</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
        <div class="panel"></div>
    </div>

    <!-- Map -->

    <div class="contact_map">
        <div id="google_map" class="google_map">
            <div class="map_container">
                <div id="map"></div>
            </div>
        </div>
    </div>

<?php endif; ?>

<?php require_once (ROOT.'/views/layouts/footer.php'); ?>
