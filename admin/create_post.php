<?php

include "../server.php";
include "../database/config.php";
http: //localhost/AlpetGTechBlog/

$c_sql = "SELECT * from post_categories ";
$c_result = mysqli_query($db, $c_sql);
$c_row = $c_result->fetch_assoc();

?>

<style>
    .container {
        padding-left: 5px !important;
        padding-right: 5px !important;
    }
</style>

<?php get_Aheader("C_Post Admin"); ?>


<div id="layoutSidenav_content">

    <div class="container mt-5 h-100">
        <?php
        if (!empty($msg)) {
            echo '
    <div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>' . $msg . ' </strong>  <br>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;<a href="apliko_online.php"></a></span>
    </button>
</div>';
        }
        ?>
        <div class="row justify-content-md-center h-100">
            <div class="card-wrapper">
                <div class="card fat">
                    <div class="card-body">
                        <h4 class="card-title">Krijo Postime</h4>

                        <form method="POST" action="#" enctype="multipart/form-data">

                            <div class="form-group">
                                <label>Titulli</label>
                                <input id="p_titulli" type="text" class="form-control" placeholder="Titulli" name="p_titulli" required="" oninvalid="this.setCustomValidity('Shkruani titullin');" oninput="this.setCustomValidity('');">
                            </div>

                            <label>P&euml;rshkrimi</label>
                            <div class="form-floating mb-3">
                                <textarea class="form-control" placeholder="P&euml;rshkrimi" id="floatingTextarea2 p_pershkrimi" style="height: auto;" name="p_pershkrimi" required="" oninvalid="this.setCustomValidity('Shkruani P&euml;rshkrimin');" oninput="this.setCustomValidity('')"></textarea>
                                <label for="floatingTextarea2">Pershkrimi</label>
                            </div>

                            <div class="form-group">
                                <label>Tags</label>
                                <input type="text" id="search_data" placeholder="" autocomplete="off" name="p_tags" class="form-control input-lg" />
                            </div>


                            <div class="mb-3 p_upload">
                                <label>Foto</label>
                                <input class="form-control" type="file" id="formFile" name="image" require="" oninvalid="this.setCustomValidity('Zgjithni Foto');" oninput="this.setCustomValidity('');">
                            </div>

                            <div class="form-group">
                                <label for="disabledTextInput" class="form-label">Kategorit</label>
                                <select name="p_kategorit" class="custom-select mb-3">
                                    <option disabled required=""> Çfar&euml; kategorie &euml;sht&euml; postimi </option>
                                    <?php

                                    foreach ($c_result as $key => $c_row) {
                                        echo '  <option value=" ' . $c_row['id'] . ' ">'    . $c_row['emri'] . '</option>     ';
                                    }

                                    ?>
                                </select>
                            </div>


                            <div class="form-group m-0">
                                <button type="submit" name="create_post_submit" class="btn btn-primary btn-block">
                                    Posto
                                </button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>



<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tokenfield/0.12.0/css/bootstrap-tokenfield.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tokenfield/0.12.0/bootstrap-tokenfield.js"></script>


<script>
    $(document).ready(function() {
        $('#search_data').tokenfield();
    });
</script>

</body>

</html>