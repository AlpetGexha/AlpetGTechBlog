<?php include "server.php"; ?>
<?php get_header("AlpetG Tech Blog  - Ballina"); ?>
<div class="container">
    <div class="row">
        <div class="col-lg-8 text-left">
            <div class="">
                <div class="row">
                    <?php get_post("post"); ?>
                </div>
            </div>
        </div>

        <?php get_widget(); ?>
        
    </div>
</div>

<?php get_footer(); ?>