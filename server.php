<?php
//headeri
function get_header($title_bar)
{
    include "assets/php/head.php";
    echo "<title>$title_bar</title></head>";
    include "assets/php/header.php";
}


//footer
function get_footer()
{
    include "assets/php/footer.php";
}

function get_post($table)
{
    require("database/config.php");
    $sql = "SELECT * FROM $table ORDER BY id DESC ";
    if ($result = mysqli_query($db, $sql)) {
        //count number of rows in query result
        $rowcount = mysqli_num_rows($result);
        //if no rows returned show no news alert
        if ($rowcount == 0) {
            # code...
            echo 'Nuk ka Poste "width:350px;height:250px'; 
        }
        //if there are rows available display all the results
        foreach ($result as $bloggrid => $postitem) {
            # code...
            echo '
                <div class="col-md-6">
                    <div class="b-grid-top">
                        <div class="card" style="width: 18rem;">
                            <a href="single.php?id=' . $postitem['id'] . '">
                                <img src="assets/img/' . $postitem['photo'] . '" class="card-img-top" alt="Foto">
                            </a>
                            <div class="card-body">
                            <i class="far fa-clock"></i>'. date('j F, Y ', strtotime($postitem['date']))  .'</a>
                                <h5 class="card-title"><a href="single.php?id=' . $postitem['id'] . '">' . $postitem['titulli'] . '</a></h5>
                                    <a class="btn btn-primary" href="single.php?id=' . $postitem['id'] . '">Meso m&euml; Shum&euml;</a>
                            </div>
                        </div>
                    </div>
                </div>
            '
            ;
        }
    }

    mysqli_close($db);
}
?>


<body>

</body>