<?php
$msg = "";
include "../server.php";
include "../database/config.php";

?>

<?php get_Aheader("Admin"); ?>

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
                        <h4 class="card-title">Kategori</h4>

                        <form method="POST" action="#">
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" placeholder="Shto Kategori" name="c_kategory" required="" autofocus="" aria-describedby="button-addon2" oninvalid="this.setCustomValidity('Shkruani kategorin');" oninput="this.setCustomValidity('');">
                                <button class="btn btn-outline-primary" type="submit" name="add_kategory" id="button-addon2">Shto</button>
                            </div>
                        </form>

                    </div>
                </div>
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Kategorit</th>
                            <th scope="col">Opsionet</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php
                        require("../database/config.php");
                        $c_sql = "SELECT * from post_categories ";
                        if ($result = mysqli_query($db, $c_sql)) {
                            $i = 1;
                            foreach ($result as $key => $c_row) {

                                //$c_row['id']
                                echo ' <tr>
                        <td> ' . $i++. ' </td> 
                        <td> ' . $c_row['emri'] . ' </td>
                        <td> <a class="btn btn-danger"  data-toggle="modal" data-target="#aplikemet_' . $c_row["id"] . ' ">Fshije</a> </td>
                        </tr>  ';

                                echo '
              <div class="modal fade" id="aplikemet_' . $c_row['id'] . '" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLongTitle">Kujedes</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      A jeni i sigurt q&euml; d&euml;shironi ta fshini k&euml;t&euml; kategori<br>
                      N&euml;se fshini k&euml;t&euml; kategori do te fshini edhe t&euml; gjita  postimet me k&euml;te kategori
                      <div class="modal-footer">
                       <button type="button" class="btn btn-secondary" data-dismiss="modal">JO</button>
                        <a href="delete/catefory_delete.php? id= '.$c_row['id'].'"class="btn btn-danger"id="delete_btn" >PO! Fshije</a> 
                      </div>
                    </div>

                  </div>
                </div>
              </div>
              ';
                            }
                        }

                        ?>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

</body>

</html>