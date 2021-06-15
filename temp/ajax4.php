<?php
include_once('functions.php');
$link=connect();
$hid=$_POST['hid'];
        echo '<form action="comments.php?page=2" method="post" class="input-group" id="formcity">';
        echo '<input type="text" name="comment" placeholder="Your comment">';
        echo '<input type="submit" name="addcomment" value="Add" class="btn btn-sm btn-info">';
        echo '</form>';

        if (isset($_POST['addccomment'])) {
            $comment = trim(htmlspecialchars($_POST['comment']));
            if ($comment == "") exit();
            $ins = 'insert into comments (comment,hotelid) values ("' . $comment . '",' . $hid . ')';
            mysqli_query($link, $ins);
            $err = mysqli_errno($link);
            if ($err) {
                echo 'Error code:' . $err . '<br>';
                exit();
            }
            echo "<script>";
            echo "window.location=document.URL;";
            echo "</script>";
        }


?>