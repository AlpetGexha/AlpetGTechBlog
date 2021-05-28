<?php include "server.php"; ?>
<?php get_header("Ballina"); ?>
<ol class="breadcrumb">
    <li class="breadcrumb-item" style="color: #333 !important;">
        <a href=" index.php" style="color: #333 !important;">Ballina</a>
    </li>
</ol>
<div class="container">
    <div class="row">
        <div class="col-lg-8 text-left">
            <div class="">
                <div class="row">
                    <?php //PostStyle::get_post("post");
                    get_post("post"); ?>
                </div>
            </div>
        </div>
        <?php get_widget(); ?>
    </div>
</div>

<?php get_footer(); ?>

