<?php include "server.php"; ?>
<?php get_header("Kontakti"); ?>
<ol class="breadcrumb">
    <li class="breadcrumb-item" style="color: #333 !important;">
        <a href=" index.php" style="color: #333 !important;">Ballina</a>
    </li>
    <li class=" breadcrumb-item active" style="color: #01cd74 !important;"> Kontakti </li>
</ol>



<div class="container">
    <div class="row">
        <div class="col-lg-8 text-left mt-5">
            <div class="row">
                <div class="card-wrapper">
                    <div class="card fat">
                        <div class="card-body">
                            <h4 class="card-title">Na kontakotni</h4>
                            <form method="POST" action="#">

                                <div class="form-group">
                                    <label>E-mail</label>
                                    <input id="p_titulli" type="emial" class="form-control" placeholder="E-mail(nuk )" name="ko_mail">
                                </div>

                                <label>Mesazhi</label>
                                <div class="form-floating mb-3">
                                    <textarea class="form-control" placeholder="P&euml;rshkrimi" id="floatingTextarea2 p_pershkrimi" style="height: auto;" name="ko_mesazhi" required="" oninvalid="this.setCustomValidity('Shkruani Mesazhin');" oninput="this.setCustomValidity('')"></textarea>
                                    <label for="floatingTextarea2">Mesazhi</label>
                                </div>

                                <div class="form-group m-0">
                                    <button type="submit" name="kontakit_submit" class="btn btn-primary btn-block">
                                        Dergo
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>

                </div>
            </div>

        </div>
        <?php get_widget(); ?>
    </div>
</div>

<?php get_footer(); ?>