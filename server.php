<?php

//headeri
function get_header($title_bar)
{
    include "assets/php/head.php";//linkat
    echo "<title>$title_bar</title></head>";//tilulli per tab 
    include "assets/php/header.php";//headeri ,navbari
}

//footer
function get_footer()
{
    include "assets/php/footer.php";
}

//widget
function get_widget()
{
    //kategorit dhe rrjetet sociale
    include "assets/php/widget.php";
}

//kategorit per navbar
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


//lista e kategorive (widget)
function get_kadegoirt($table, $table1)
{
    require("database/config.php");
    $sql = "SELECT * FROM $table";
    if ($result = mysqli_query($db, $sql)) {
        //Nese nuk ka kategori  
        $rowcount = mysqli_num_rows($result);
        if ($rowcount == 0) {
            echo '<p class="null_result">Nuk ka kategori</p';
        }

        foreach ($result as $get_kadegoirt1 => $kategorit) {
            // sa herë secila kategori shfaqet në poste
            $categoryid = $kategorit['id'];
            $sql = "SELECT * FROM $table1 WHERE category='$categoryid'";
            if ($result = mysqli_query($db, $sql)) {
                //numero kategorit
                $rowcountkategorit = mysqli_num_rows($result);
                $getcatcount = $rowcountkategorit;
            }
            //shfaq
            echo '
            <li class="list-group-item d-flex justify-content-between align-items-center">
            <a href="category.php?id=' . $kategorit['id'] . '">' . $kategorit['emri'] . '</a>
            
			<span class="badge badge-success badge-pill">' . $rowcountkategorit . '</span>
			</li>';
        }
    }

    mysqli_close($db);
}


//trego te gjitha postimet(index.php)
function get_post($table)
{
    require("database/config.php");
    $sql = "SELECT * FROM $table ORDER BY id DESC ";
    if ($result = mysqli_query($db, $sql)) {
        //Nese nuk ka postime 
        $rowcount = mysqli_num_rows($result);

        if ($rowcount == 0) {
            echo 'Nuk ka Poste "width:350px;height:250px'; 
        }
        foreach ($result as $bloggrid => $postitem) {
            echo '
                <div class="col-md-6">
                    <div class="">
                        <div class="card mt-3" style="width: 18rem;">
                            <a href="postim.php?id=' . $postitem['id'] . '">
                                <img src="assets/img/' . $postitem['photo'] . '" class="card-img-top" alt="Foto">
                            </a>
                            <div class="card-body">
                            <i class="far fa-clock"></i>'. date('j F, Y ', strtotime($postitem['date']))  .'
                            <i class="far fa-eye fa-x2"></i> '. $postitem['views'] .'
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


//trego te gjitha postimet ne kategorin e caktuar(category.php)
function get_kategori_post($table, $id)
{
    require("database/config.php");
    $sql = "SELECT * FROM $table WHERE category='$id' ORDER BY id DESC";
    if ($result = mysqli_query($db, $sql)) {
        $rowcount = mysqli_num_rows($result);
        if ($rowcount == 0) {
            echo '<p class="null_result"> Nuk ka postime p&euml;r k&euml;t&euml; kategori</p>';
        }
        foreach ($result as $categories => $k_post) {
            echo '
                <div class="col-md-6">
                    <div class="">
                        <div class="card mt-3" style="width: 18rem;">
                            <a href="postim.php?id=' . $k_post['id'] . '">
                                <img src="assets/img/' . $k_post['photo'] . '" class="card-img-top" alt="Foto">
                            </a>
                            <div class="card-body">
                            <i class="far fa-clock"></i>' . date('j F, Y ', strtotime($k_post['date']))  . '
                            <i class="far fa-eye fa-x2"></i> ' . $k_post['views'] . '
                                <h5 class="card-title"><a href="postim.php?id=' . $k_post['id'] . '">' . $k_post['titulli'] . '</a></h5>
                                <a" href="postim.php?id=' . $k_post['id'] . '"><p> ' . $k_post['body'] . ' </p></a>
                                    <a class="btn btn-success" href="postim.php?id=' . $k_post['id'] . '">Meso m&euml; Shum&euml;</a>
                            </div>
                        </div>
                    </div>
                </div>
            ';
        }
    }

    mysqli_close($db);
}

?>