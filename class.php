<?php
declare(strict_types=1);

include "database/config.php";

class PostStyle

{
    private $table;


    public static function get_post($table){
        require "database/config.php";

        $sql = "SELECT * FROM $table ORDER BY id DESC ";
        if ($result = mysqli_query($db, $sql)) {
            //Nese nuk ka postime
            $rowcount = mysqli_num_rows($result);
        }
            if ($rowcount == 0) {
                echo 'Nuk ka Poste "width:350px;height:250px';
            }

            foreach ($result as $key => $row) {
                echo '
                <div class="col-sm-4 col-cart-body d-flex justify-content-center">
                    <div class="">
                        <div class="card mt-3">
                            <a href="postim.php?id=' . $row['id'] . '">
                                <img src="assets/img/' . $row['photo'] . '" class="card-img-top" alt="Foto">
                            </a>
                            <div class="card-body">
                            <i class="far fa-clock"></i>' . date('j F, Y ', strtotime($row['date']))  . '
                            <i class="far fa-eye fa-x2"></i> ' . $row['views'] . '
                                <h5 class="card-title"><a href="postim.php?id=' . $row['id'] . '">' . $row['titulli'] . '</a></h5>
                                <a" href="postim.php?id=' . $row['id'] . '"><p> ' . $row['body'] . ' </p></a>
                                
                                    <a class="btn btn-success" href="postim.php?id=' . $row['id'] . '">Meso m&euml; Shum&euml;</a>
                            </div>
                        </div>
                    </div>
                </div>
            ';
    }
        mysqli_close($db);
        }


}