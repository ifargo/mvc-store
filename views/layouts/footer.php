<!-- Footer -->

<footer class="footer">
    <div class="container">
        <div class="row">

            <div class="col-lg-3 footer_col">
                <div class="footer_column footer_contact">
                    <div class="logo_container">
                        <div class="logo"><a href="#">OneTech</a></div>
                    </div>
                    <div class="footer_title">Got Question? Call Us 24/7</div>
                    <div class="footer_phone">+38 068 005 3570</div>
                    <div class="footer_contact_text">
                        <p>17 Princess Road, London</p>
                        <p>Grester London NW18JR, UK</p>
                    </div>
                    <div class="footer_social">
                        <ul>
                            <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                            <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                            <li><a href="#"><i class="fab fa-youtube"></i></a></li>
                            <li><a href="#"><i class="fab fa-google"></i></a></li>
                            <li><a href="#"><i class="fab fa-vimeo-v"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="col-lg-2 offset-lg-2">
                <div class="footer_column">
                    <div class="footer_title">Find it Fast</div>
                    <ul class="footer_list">
                        <li><a href="#">Computers & Laptops</a></li>
                        <li><a href="#">Cameras & Photos</a></li>
                        <li><a href="#">Hardware</a></li>
                        <li><a href="#">Smartphones & Tablets</a></li>
                        <li><a href="#">TV & Audio</a></li>
                    </ul>
                    <div class="footer_subtitle">Gadgets</div>
                    <ul class="footer_list">
                        <li><a href="#">Car Electronics</a></li>
                    </ul>
                </div>
            </div>

            <div class="col-lg-2">
                <div class="footer_column">
                    <ul class="footer_list footer_list_2">
                        <li><a href="#">Video Games & Consoles</a></li>
                        <li><a href="#">Accessories</a></li>
                        <li><a href="#">Cameras & Photos</a></li>
                        <li><a href="#">Hardware</a></li>
                        <li><a href="#">Computers & Laptops</a></li>
                    </ul>
                </div>
            </div>

            <div class="col-lg-2">
                <div class="footer_column">
                    <div class="footer_title">Customer Care</div>
                    <ul class="footer_list">
                        <li><a href="#">My Account</a></li>
                        <li><a href="#">Order Tracking</a></li>
                        <li><a href="#">Wish List</a></li>
                        <li><a href="#">Customer Services</a></li>
                        <li><a href="#">Returns / Exchange</a></li>
                        <li><a href="#">FAQs</a></li>
                        <li><a href="#">Product Support</a></li>
                    </ul>
                </div>
            </div>

        </div>
    </div>
</footer>

<!-- Copyright -->

<div class="copyright">
    <div class="container">
        <div class="row">
            <div class="col">

                <div class="copyright_container d-flex flex-sm-row flex-column align-items-center justify-content-start">
                    <div class="copyright_content"><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                        Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
                        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                    </div>
                    <div class="logos ml-sm-auto">
                        <ul class="logos_list">
                            <li><a href="#"><img src="/template/images/logos_1.png" alt=""></a></li>
                            <li><a href="#"><img src="/template/images/logos_2.png" alt=""></a></li>
                            <li><a href="#"><img src="/template/images/logos_3.png" alt=""></a></li>
                            <li><a href="#"><img src="/template/images/logos_4.png" alt=""></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<script src="/template/js/jquery-3.3.1.min.js"></script>
<script src="/template/styles/bootstrap4/popper.js"></script>
<script src="/template/styles/bootstrap4/bootstrap.min.js"></script>
<script src="/template/plugins/greensock/TweenMax.min.js"></script>
<script src="/template/plugins/greensock/TimelineMax.min.js"></script>
<script src="/template/plugins/scrollmagic/ScrollMagic.min.js"></script>
<script src="/template/plugins/greensock/animation.gsap.min.js"></script>
<script src="/template/plugins/greensock/ScrollToPlugin.min.js"></script>
<script src="/template/plugins/OwlCarousel2-2.2.1/owl.carousel.js"></script>
<script src="/template/plugins/slick-1.8.0/slick.js"></script>
<script src="/template/plugins/easing/easing.js"></script>
<script src="/template/js/custom.js"></script>

<?php
$jsPatterns = ["~blog~","~blog-post~","~cart~","~contact~","~product~","~regular~","~catalog~","~user~","~profile~",];
$jsLinks = [
    "~contact~" => "<script src=\"https://maps.googleapis.com/maps/api/js?v=3.exp&key=AIzaSyCIwF204lFZg1y4kPSIhKaHEXMLYxxuMhA\"></script><script src=\"/template/js/contact_custom.js\"></script>",
    "~blog~" => "<script src=\"/template/plugins/parallax-js-master/parallax.min.js\"></script><script src=\"/template/js/blog_custom.js\"></script>",
    "~blog-post~" => "<script src=\"/template/plugins/parallax-js-master/parallax.min.js\"></script><script src=\"/template/plugins/easing/easing.js\"></script><script src=\"/template/js/blog_single_custom.js\"></script>",
    "~cart~" => "<script src=\"/template/js/cart_custom.js\"></script>",
    "~product~" => "<script src=\"/template/js/product_custom.js\"></script>",
    "~regular~" => "<script src=\"/template/js/regular_custom.js\"></script>",
    "~catalog~" => "<script src=\"/template/js/shop_custom.js\"></script><script src=\"/template/plugins/Isotope/isotope.pkgd.min.js\"></script><script src=\"/template/plugins/jquery-ui-1.12.1.custom/jquery-ui.js\"></script>",
    // Повторяющиеся костыли
    "~user~" => "",
    "~profile~" => "",
];
foreach ($jsPatterns as $pattern) {

    if (preg_match($pattern, $headerLoadingFile)) {
        foreach ($jsLinks as $key => $link) {

            if ($pattern == $key) {
                echo $link;
            }
        }
    }
}
?>

<script>
    $(document).ready(function () {
        $(".product_cart_button").click(function () {
            var id = $(this).attr("data-id");
            $.post("/cart/addAjax/"+id, {}, function (data) {
                $("#cart-count").html("<span>"+data+"</span>");
            });
            $.post("/cart/getTotalPrice/", {}, function (data) {
                $("#cart-total-price").html("$"+data);
            });
            return false;
        });
        $(".cart_button").click(function () {
            var id = $(this).attr("data-id");
            $.post("/cart/addAjax/"+id, {}, function (data) {
                $("#cart-count").html("<span>"+data+"</span>");
            });
            $.post("/cart/getTotalPrice/", {}, function (data) {
                $("#cart-total-price").html("$"+data);
            });
            return false;
        });
    });
</script>


</body>

</html>