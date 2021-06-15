<?php
        $link = connect();
        echo '<form action="index.php?page=2" method="post" enctype="multipart/form-data" class="input-group" id="formhotel">';
        echo '<select name="hotelid">';
        $sel = 'select ho.id, co.country,ci.city,ho.hotel 
	            from countries co,cities ci, hotels ho
	            where co.id=ho.countryid and ci.id=ho.cityid
	            order by co.country';
        $res = mysqli_query($link, $sel);
        while ($row = mysqli_fetch_array($res, MYSQLI_NUM)) {
            echo '<option value="' . $row[0] . '">';
            echo $row[1] . '&nbsp;&nbsp;' . $row[2] . '&nbsp;&nbsp;' . $row[3] . '</option>';
        }
        mysqli_free_result($res);
        echo '<textarea name="comment" placeholder="Your comment"></textarea>';
        echo '<input type="submit" name="addcomment" value="Add" class="btn btn-sm btn-info">';
        echo '</select>';
        echo '</form>';
      if (isset($_POST['addcomment'])) {
           $hotelid = intval($_POST['hotelid']);
           $comment = trim(htmlspecialchars($_POST['comment']));
            if ($comment == "") exit();
            $ins = 'insert into comments (comment, hotelid) values("' . $comment . '",' . $hotelid . ')';
            mysqli_query($link, $ins);
            echo "Your comment is added";
            echo "<script>";
            //echo "window.location=document.URL;";
            echo "</script>";
        }
        echo '</div>';
        ?>