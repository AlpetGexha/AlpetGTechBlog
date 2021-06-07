<?php
include "database/config.php";
include "class.php";
session_start();
ob_start();

//headeri
function get_header($title_bar)
{
    include "assets/php/head.php"; //linkat
    echo "<title>$title_bar - AlpetGTech Blog</title></head>"; //tilulli per tab 
    include "assets/php/header.php"; //headeri ,navbari
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

        foreach ($result as $get_kadegoirt1 => $row) {
            // sa herë secila kategori shfaqet në poste
            $categoryid = $row['id'];
            $sql = "SELECT * FROM $table1 WHERE category='$categoryid'";
            if ($result = mysqli_query($db, $sql)) {
                //numero kategorit
                $rowcountkategorit = mysqli_num_rows($result);
                $getcatcount = $rowcountkategorit;
            }
            //shfaq
            echo '
            <li class="list-group-item d-flex justify-content-between align-items-center">
            <a href="category.php?id=' . $row['id'] . '">' . $row['emri'] . '</a>
            
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
        foreach ($result as $key => $row) {
            echo '
                <div class="col-sm-4 col-cart-body d-flex flex-wrap justify-content-center">
                    <div class="">
                        <div class="card mt-3">
                            <a href="postim.php?id=' . $row['id'] . '">
                                <img src="assets/img/post/'.$row['photo'].' " class="card-img-top" alt="Foto">
                            </a>
                            <div class="card-body">
                            <i class="far fa-clock"></i>' . date('j F, Y ', strtotime($row['date']))  . '
                            <i class="far fa-eye fa-x2"></i> ' . $row['views'] . '
                                <h5 class="card-title"><a href="postim.php?id=' . $row['id'] . '">' . $row['titulli'] . '</a></h5>
                                <a" href="postim.php?id=' . $row['id'] . '"><p class="body-text"> ' . $row['body'] . ' </p></a>                                
                                <a class="btn btn-success btn-submit" href="postim.php?id=' . $row['id'] . '">Meso m&euml; Shum&euml;</a>
                            </div>
                        </div>
                    </div>
                </div>
            ';
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
        foreach ($result as $categories => $row) {
            echo '
                <div class="col-md-6 d-flex justify-content-center col-cart-body">
                    <div class="">
                        <div class="card mt-3" style="width: 18rem;">
                            <a href="postim.php?id=' . $row['id'] . '">
                                <img src="assets/img/post/' . $row['photo'] . '" class="card-img-top" alt="Foto">
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
    }

    mysqli_close($db);
}


function get_Aheader($title_bar)
{
    include "../assets/php/head.php"; //linkat
    echo '<link rel="stylesheet" type="text/css" href="../assets/css/style.css">';
    echo '<link rel="stylesheet" type="text/css" href="../assets/css/bootstrap.css">';
    echo "<title>$title_bar - AlpetGTech Blog</title></head>"; //tilulli per tab 
    include "../assets/php/admin-navbar.php"; //navbari
}

function get_modal_button($m_id)
{
    echo ' <td> <a class="btn btn-danger"  data-toggle="modal" data-target="#modal_' . $m_id . ' ">Fshije</a><td> ';
}

function get_modal($m_id, $path, $title, $text, $color, $btn_text)
{
    echo '
        <div class="modal fade" id="modal_' . $m_id . '" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">' . $title . '</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                ' . $text . '
                <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">JO</button>
                <a  href="' . $path . '? id= ' . $m_id . '"class="btn btn-' . $color . '"id="delete_btn"  >' . $btn_text . '</a>
                </div>
            </div>
    </form>
            </div>
        </div>
        </div>
        ';
}



//****************Krijimi i postimeve****************//

if (isset($_POST['create_post_submit'])) {
    $p_titulli = mysqli_real_escape_string($db, $_POST['p_titulli']);
    $p_pershkrimi = mysqli_real_escape_string($db, $_POST['p_pershkrimi']);
    $p_kategorit = mysqli_real_escape_string($db, $_POST['p_kategorit']);
    //$u_id = mysqli_real_escape_string($db, $_SESSION['id']);

    //Image name
    $fileName = mysqli_real_escape_string($db, basename($_FILES["image"]["name"]));
    //shto extension
    $fileAcualeExt = strtolower(end(explode('.', $fileName)));
    $fileNameNew =  "AlpetG Blog" . uniqid('.', true) . "." . $fileAcualeExt;

    //direktori i fotos
    $fileDestination = "../assets/img/post/" . $fileNameNew;


    $allowTypes = array('jpg', 'JPG', 'png', 'PNG', 'jpeg', 'JPEG', 'gif');

    if (in_array($fileAcualeExt, $allowTypes)) {

        // Upload image s
        if (move_uploaded_file($_FILES["image"]["tmp_name"], $fileDestination)) {

            if ($_FILES['image']['size'] < 10485760) {
                //compressImage($_FILES["image"]["tmp_name"], $fileDestination, 60);
                // Insert ne databases
                $insert = "INSERT INTO post (titulli,body,category,photo)VALUES('$p_titulli','$p_pershkrimi','$p_kategorit','$fileNameNew')";
                mysqli_query($db, $insert);
                if ($insert) {
                    $msg = "Postimi  u postua";
                    header("Location:create_post.php");
                } else {
                    $msg = "Ngarkimi i fotografis&euml; d&euml;shtoi, ju lutemi provoni p&euml;rs&euml;ri";
                }
            } else {
                $msg = "Foto &euml;sht&euml; shum&euml; e madhe. MAXIMUMI 10mb";
            }
        }
    } else {
        $msg = 'Vet&euml;m FOTO( JPG, JPEG, PNG, & GIF) lejohen t&euml; ngarkohen.';
    }

}


//****************Krijimi i kategorive****************//

if (isset($_POST['add_kategory'])) {
    $c_kategory = mysqli_real_escape_string($db, $_POST['c_kategory']);
    $sql = "SELECT * from post_categories WHERE emri= '$c_kategory' ";
    $result = mysqli_query($db, $sql);


    if (mysqli_num_rows($result) > 0) {
        $msg = "Kjo kategori ekzioston";
    } else {

        $insert = "INSERT into post_categories(emri) VALUE('$c_kategory')";
        mysqli_query($db, $insert);

        header("Location:create_category.php");
    }
}
//**************** Mesazhet ****************//
if (isset($_POST['kontakit_submit'])) {
    $ko_mail = mysqli_real_escape_string($db, $_POST['ko_mail']);
    $ko_mesazhi = mysqli_real_escape_string($db, $_POST['ko_mesazhi']);

    $insert = "INSERT into kontakit (email,sms) VALUE ('$ko_mail', '$ko_mesazhi')";
    mysqli_query($db, $insert);
    if (!$insert) {
        echo "False";
    } else {
        echo "True";
    }
}

function IamAdmin()
{
    if (!isset($_SESSION['loggedIn']) || $_SESSION['loggedIn'] == false) {
        header("Location:../login.php");
        die();
    }
}

//**************** Login ****************//
if (isset($_POST['login_submit'])) {
    $username = mysqli_real_escape_string($db, $_POST['login_us']);
    $password = mysqli_real_escape_string($db, $_POST['login_pw']);

    $sql =    "SELECT * from users where username = '$username'";
    $results = mysqli_query($db, $sql);
    $row = $results->fetch_assoc();


    if (mysqli_num_rows($results) != 1) {
        $msg = "Ky p&euml;rdorues nuk ekziston!";
    } else if (password_verify($password, $row['password'])) {
        $_SESSION['username'] = $username;
        $_SESSION['loggedIn'] = true;
        $_SESSION['ROLE'] = $row['role'];
        header('Location:admin/admin_post.php');
    } else {
        $msg = "Fjalekalimi &euml;sht&euml; gabim!";
    }
}
//****************Post Update ****************//
if (isset($_POST['post_update'])) {
    $id = $_POST['post_update'];
    $titulli = mysqli_real_escape_string($db, $_POST['post_titulli']);
    $body = mysqli_real_escape_string($db, $_POST['post_body']);


    //updati nga edit.php 
    $post_update = "UPDATE post set titulli = '$titulli', body = '$body' where id=$id";
    mysqli_query($db, $post_update);
    header("Location:admin/admin_post.php");
}



//compressImage function
function compressImage($source, $destination, $quality)
{
    $info = getimagesize($source);
    if ($info['mime'] == 'image/jpeg')
        $image = imagecreatefromjpeg($source);
    elseif ($info['mime'] == 'image/gif')
        $image = imagecreatefromgif($source);
    elseif ($info['mime'] == 'image/png')
        $image = imagecreatefrompng($source);
    imagejpeg($image, $destination, $quality);
}