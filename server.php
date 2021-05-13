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

//footer
function get_widget()
{
    include "assets/php/widget.php";
}

function get_post($table)
{
    require("database/config.php");
    $sql = "SELECT * FROM $table ORDER BY id DESC ";
    if ($result = mysqli_query($db, $sql)) {
        //Nese nuk ka postime 
        $rowcount = mysqli_num_rows($result);

        if ($rowcount == 0) {
            # code...
            echo 'Nuk ka Poste "width:350px;height:250px'; 
        }
        //if there are rows available display all the resultss
        foreach ($result as $bloggrid => $postitem) {
            # code...
            echo '
                <div class="col-md-6">
                    <div class="b-grid-top">
                        <div class="card mt-3" style="width: 18rem;">
                            <a href="postim.php?id=' . $postitem['id'] . '">
                                <img src="assets/img/' . $postitem['photo'] . '" class="card-img-top" alt="Foto">
                            </a>
                            <div class="card-body">
                            <i class="far fa-clock"></i>'. date('j F, Y ', strtotime($postitem['date']))  .'
                                <h5 class="card-title"><a href="postim.php?id=' . $postitem['id'] . '">' . $postitem['titulli'] . '</a></h5>
                                <a" href="postim.php?id=' . $postitem['id'] . '"><p> ' . $postitem['body'] . ' </p></a>
                                
                                    <a class="btn btn-success" href="postim.php?id=' . $postitem['id'] . '">Meso m&euml; Shum&euml;</a>
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



function get_kadegoirt($table,$table1)
{
    require("database/config.php");
    $sql = "SELECT * FROM $table";
    if ($result = mysqli_query($db, $sql)) {
       //Nese nuk ka kategori  
        $rowcount = mysqli_num_rows($result);
        if ($rowcount == 0) {
            echo 'Nuk ka kategori';
        }

        foreach ($result as $categoriescount => $kategorit) {
            // sa herë secila kategori shfaqet në poste
            $categoryid = $kategorit['id'];
            $sql = "SELECT * FROM $table1 WHERE category='$categoryid'";
            if ($result = mysqli_query($db, $sql)) {
                //numero kategorit
                $rowcountkategorit = mysqli_num_rows($result);
                $getcatcount = $rowcountkategorit;
            }
            //shfaq
            echo '<li class="list-group-item d-flex justify-content-between align-items-center">
			' . $kategorit['emri'] . '
			<span class="badge badge-success badge-pill">' . $rowcountkategorit . '</span>
			</li>';
        } 
    }

    mysqli_close($db);
}

function get_kadegoirt_menu($table)
{
    require("database/config.php");
    $sql = "SELECT * FROM $table ";
    if ($result = mysqli_query($db, $sql)) {

        foreach ($result as $get_kadegoirt_menu1 => $kategori_memu) {
            echo '<a class="dropdown-item" href="category.php?id=' . $kategori_memu['id'] . '">' . $kategori_memu['emri'] . '</a>
			<div class="dropdown-divider"></div>';
        }
    }

    mysqli_close($db);
}
?>