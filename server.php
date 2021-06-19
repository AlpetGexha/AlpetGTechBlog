<?php
include "database/config.php";

session_start();
ob_start();


setlocale(LC_TIME, array('da_DA.UTF-8', 'da_DA@euro', 'da_DA', 'Albanian'));

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
function get_post()
{
    require("database/config.php");
    $sql = "SELECT p.id,p.photo,p.date,p.tags,p.views,p.titulli,p.body, u.username , p.userid FROM users u, post p WHERE p.userid = u.id ORDER BY id DESC  ";
    if ($result = mysqli_query($db, $sql)) {
        //Nese nuk ka postime 
        // ucfirst
        $rowcount = mysqli_num_rows($result);

        if ($rowcount == 0) {
            echo 'Nuk ka Poste';
        }
        foreach ($result as $key => $row) {


            // Replace hashtags with links

            echo '
                <div class="col-sm-4 col-cart-body d-flex flex-wrap justify-content-center">
                    <div class="">
                        <div class="card mt-3">
                            <a href="postim.php?id=' . $row['id'] . '"> 
                                <img src="assets/img/post/' . $row['photo'] . ' " class="card-img-top" alt="Foto" loading="lazy">
                            </a>
                            <div class="card-body">
                            <i class="far fa-clock"></i>' . strftime('%e %B, %Y', strtotime($row['date']))  . '/
                            <i class="far fa-eye fa-x2"></i> ' . $row['views'] . '/
                           <a href="user.php?id=' . $row['userid'] . '" <i class="far fa-user fa-x2"></i> ' . $row['username'] . '<a>
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
function get_post_id($table, $id1, $id2)
{
    require("database/config.php");
    $sql = "SELECT * FROM $table WHERE $id1='$id2' ORDER BY id DESC";
    if ($result = mysqli_query($db, $sql)) {
        $rowcount = mysqli_num_rows($result);
        if ($rowcount == 0) {
            echo '<p class="null_result"> Nuk ka postime</p>';
        }
        foreach ($result as $categories => $row) {
            echo '
                <div class="col-sm-4 col-cart-body d-flex flex-wrap justify-content-center">
                    <div class="">
                        <div class="card mt-3">
                            <a href="postim.php?id=' . $row['id'] . '">
                                <img src="assets/img/post/' . $row['photo'] . ' " class="card-img-top" alt="Foto" loading="lazy">
                            </a>
                            <div class="card-body">
                            <i class="far fa-clock"></i>' . strftime('%e %B, %Y', strtotime($row['date']))   . '
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


function get_Aheader($title_bar)
{
    include "../assets/php/head.php"; //linkat
    echo '<link rel="stylesheet" type="text/css" href="../assets/css/style.css">';
    echo '<link rel="stylesheet" type="text/css" href="../assets/css/bootstrap.css">';
    echo "<title>$title_bar - AlpetGTech Blog</title></head>"; //tilulli per tab 
    include "../assets/php/admin-navbar.php"; //navbari
}



function get_modal($modal_name, $m_id, $path, $title, $text, $color, $btn_text, $name)
{
    echo '
        <div class="modal fade" id="modal_' . $modal_name . '' . $m_id . '" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">' . $title . '</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
            <form action="' . $path . '" method="POST" enctype="multipart/form-data">
                ' . $text . '
                <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">JO</button>
                <button type="submit" class="btn btn-' . $color . '" id="submit" value="' . $m_id . '" name="' . $name . '">' . $btn_text . '</button> 
                
                </div>
            </div>
            </div>
            </form>
        </div>
        </div>
        ';
}



//****************Krijimi i postimeve****************//

if (isset($_POST['create_post_submit'])) {
    $p_titulli = mysqli_real_escape_string($db, $_POST['p_titulli']);
    $p_pershkrimi = mysqli_real_escape_string($db, $_POST['p_pershkrimi']);
    $p_kategorit = mysqli_real_escape_string($db, $_POST['p_kategorit']);
    $p_tags = mysqli_real_escape_string($db, $_POST['p_tags']);
    $u_id = mysqli_real_escape_string($db, $_SESSION['username']);


    //Marrja e id nga useri 
    $sql = "SELECT id from users where username='$u_id'";
    $results = mysqli_query($db, $sql);
    $row = $results->fetch_assoc();
    $user_id = $row['id'];
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
                $insert = "INSERT INTO post (userid,titulli,body,tags,category,photo)VALUES('$user_id','$p_titulli','$p_pershkrimi','$p_tags','$p_kategorit','$fileNameNew')";
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


//****************Regjistrimi ****************//
if (isset($_POST['register_submit'])) {
    $emri = mysqli_real_escape_string($db, $_POST['reg_emri']);
    $mbiemri = mysqli_real_escape_string($db, $_POST['reg_mbiemri']);
    $username = strtolower(mysqli_real_escape_string($db, $_POST['reg_username']));
    $email = mysqli_real_escape_string($db, $_POST['reg_email']);
    $password = mysqli_real_escape_string($db, $_POST['reg_password']);


    $reg_username = "SELECT * FROM users WHERE username='$username'";
    $reg_email = "SELECT * FROM users WHERE email='$email'";
    $result_username = mysqli_query($db, $reg_username);
    $result_email = mysqli_query($db, $reg_email);


    $usernamelength = strlen($username);

    if ($usernamelength < 3) {
        $msg = "Username-i duhet t&euml; jet&euml; s&euml; paku 3 karaktere";
    }


    if (mysqli_num_rows($result_username) > 0 || (mysqli_num_rows($result_email) > 0)  ) {
        $msg = "P&euml;dorues ose Emaili ekziton tashm&euml;";
    } else {
        $password_hash = password_hash($password, PASSWORD_DEFAULT);
        $insert = "INSERT into users(emri,mbiemri,username,password,email,role)
        VALUES('$emri','$mbiemri','$username','$password_hash','$email','1')";
        mysqli_query($db, $insert);
        if ($insert) {
            $msg = "u krye $emri .\n .$mbiemri. \n .$username . \n  $email ";
        }
    }

}


//**************** Login ****************//
if (isset($_POST['login_submit'])) {
    $username = strtolower(mysqli_real_escape_string($db, $_POST['login_us']));
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
//**************** Post Update ****************//
if (isset($_POST['post_update'])) {
    $id = $_POST['post_update'];
    $titulli = mysqli_real_escape_string($db, $_POST['post_titulli']);
    $body = mysqli_real_escape_string($db, $_POST['post_body']);


    //updati nga edit.php 
    $post_update = "UPDATE post set titulli = '$titulli', body = '$body' where id=$id";
    mysqli_query($db, $post_update);


    header("Location:admin/create_post.php");
    if ($post_update) {
        $msg = "test";
    } else {
        $msg = "jo";
    }
}

//****************Profile Update ****************//
if (isset($_POST['profile_edit_submit'])) {
    $id = $_POST['profile_edit_submit'];
    $emri = mysqli_real_escape_string($db, $_POST['profile_name']);
    $mbiemri = mysqli_real_escape_string($db, $_POST['profile_surename']);

    //updati nga edit.php 
    $post_update = "UPDATE users set emri = '$emri', mbiemri = '$mbiemri' where id=$id";
    mysqli_query($db, $post_update);
    header("Location:../admin/profile.php?msg=profili_u_ndryshua_me_sukses");
}


//**************** User Password Update ****************//
if (isset($_POST['user_password_edit'])) {
    $user = $_SESSION['username'];

    if ($user) {
        $password = mysqli_real_escape_string($db, $_POST['momental_password']);
        $new_password = $_POST['new_password'];
        $continiu_password = $_POST['confirm_password'];

        $sql = ("SELECT password FROM users where username='$user'");
        $results = mysqli_query($db, $sql);
        $row = $results->fetch_assoc();
        $db_password = $row['password'];
        $passwordlength = strlen($new_password);
        if ($passwordlength < 6) {
            $msg = " Fjalëkalimi duhet të jetë së paku 6 karaktere";
        } else {
            if (password_verify($password, $db_password) == 1) {

                if ($new_password == $continiu_password) {
                    $new_password_hash = password_hash($new_password, PASSWORD_DEFAULT);
                    $update_password =  "UPDATE users SET password='$new_password_hash' WHERE username='$user'";
                    mysqli_query($db, $update_password);
                    header("Location:../admin/profile.php?msg=Passwordi_u_ndryshua_me_sukses");
                    $msg = "Passwordi u ndryshua me sukses";
                } else {

                    $msg = "Rishruaj passwordin momental";
                }
            } else {

                $msg = "Passwordi momental &euml;dh&euml; gabim";
            }
        }
    }
}


//****************Profil Photo Update****************//
if (isset($_POST['photo_update_submit'])) {

    $fileName = mysqli_real_escape_string($db, basename($_FILES["image"]["name"]));

    $fileAcualeExt = strtolower(end(explode('.', $fileName)));
    $fileNameNew =  "AlpetGBlogUser" . uniqid('.', true) . "." . $fileAcualeExt;

    $fileDestination = "../assets/img/user/" . $fileNameNew;

    $allowTypes = array('jpg', 'JPG', 'png', 'PNG', 'jpeg', 'JPEG', 'gif');

    if (in_array($fileAcualeExt, $allowTypes)) {

        // Upload image s
        if (move_uploaded_file($_FILES["image"]["tmp_name"], $fileDestination)) {

            if ($_FILES['image']['size'] < 10485760) {
                //compressImage($_FILES["image"]["tmp_name"], $fileDestination, 60);
                // Insert ne databases

                $sql2 = "UPDATE users SET image = '" . $fileNameNew . "' WHERE username = '" . $_SESSION['username'] . "'";
                mysqli_query($db, $sql2);
                if ($sql2) {
                    header("Location:profile.php?msg=foto_u_ndryshua_me_sukses ");
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

/* DELETE */

if (isset($_POST['post_delete'])) {
    $id = $_POST['post_delete'];

    // fshirja e fotos 
    $sql = "SELECT * from post where id = '$id'";
    $results = mysqli_query($db, $sql);
    $row = $results->fetch_assoc();
    unlink('../../assets/img/post/' . $row['photo']);
    mysqli_query($db, $sql);

    //fshitja e postimit
    $sql1 = "DELETE FROM post WHERE id='$id'";
    $result = $db->query($sql1);

    if ($result == TRUE) {
        header('Location:admin/admin_post.php');
    }
}

if (isset($_POST['sms_delete'])) {
    $id = $_POST['sms_delete'];

    $delete = "DELETE from kontakit where id='$id'";
    mysqli_query($db, $delete);

    if (!$delete == TRUE) {
        $msg = "False";
    } else {
        header('Location: admin/admin_sms.php');
        $msg = "True";
    }
}

if (isset($_POST['category_delete'])) {
    $id = $_POST['category_delete'];

    $sql = "DELETE  FROM post_categories WHERE  id = '$id'";
    $result = mysqli_query($db, $sql);

    $delete = "DELETE from post where id='$id'";
    $result = mysqli_query($db, $delete);

    if (!$result == TRUE) {
        $msg = "False";
    } else {
        header('Location: ../create_category.php');
        $msg = "True";
    }
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
