<?php include "server.php"; ?>
<?php get_header("AlpetG Tech Blog  - Ballina"); ?>
<div class="container">
    <div class="row">
        <div class="col-lg-8 left-blog-info-w3layouts-agileits text-left">
            <div class="blog-girds-sec">
                <div class="row">
                    <?php get_post("post"); ?>
                </div>
            </div>
        </div>

        <div class="col-lg-4 text-left">
            <div class="text-left">
                <h4><strong>Kategorit</strong></h4>
                <ul class="list-group mt-2">
                    <?php get_kadegoirt("post_categories", "post"); ?>
                </ul>
            </div>

            <div class="tech-btm widget_social">

                <h4>Rrjetet Sociale</h4>
                <ul>
                    <li>
                        <a class="facebook" href="">
                            <i class="fab fa-facebook-f"></i>
                            <span class="count"></span> Facebook</a>
                    </li>

                    <li>
                        <a class="instagram" href="">
                            <i class="fab fa-instagram"></i>

                            <span class="count"></span> instagram</a>
                    </li>

                    <li>
                        <a class="twitter" href="">
                            <i class="fab fa-twitter"></i>
                            <span class="count"></span> Twitter</a>
                    </li>


                    <li>
                        <a class="github" href="">
                            <i class="fab fa-github"></i>
                            <span class="count"></span> github</a>
                    </li>

                </ul>
            </div>


        </div>
    </div>
</div>

<?php get_footer(); ?>