<?php include "server.php"; ?>
<?php get_header("AlpetG Tech Blog  - Ballina"); ?>
<div class="container">
    <div class="row">
        <!--left-->
        <div class="col-lg-8 left-blog-info-w3layouts-agileits text-left">
            <!--grid blogs below-->
            <div class="blog-girds-sec">
                <div class="row">
                    <?php get_post("post"); ?>
                    <!--bloggrids-->
                </div>
            </div>
        </div>
        <?php get_footer(); ?>