<?php
    require("DBconnected.php");
    $pNo=$_POST["pNo"];
    $pathpart=pathinfo($_FILES['photo']['name']);
    $extname=$pathpart['extension'];

    $finalphoto="Photo_".time().".".$extname;
    $now=time();

    $SQL="UPDATE photo SET ppath='$finalphoto', pdate='$now' WHERE pNo='$pNo'";

    if(mysqli_query($link, $SQL)){
        if(move_uploaded_file($_FILES['photo']['tmp_name'],$finalphoto)){
            echo "<script type='text/javascript'>";
            echo "alert('照片更新成功');";
            echo "</script>";
            echo "<meta http-equiv='Refresh' content='0; url=photolist.php'>";
        }else{
            echo "<script type='text/javascript'>";
            echo "alert('照片更新失敗');";
            echo "</script>";
            echo "<meta http-equiv='Refresh' content='0; url=photolist.php'>";
        }
    }else{
        echo "<script type='text/javascript'>";
        echo "alert('照片更新失敗');";
        echo "</script>";
        echo "<meta http-equiv='Refresh' content='0; url=photolist.php'>";
    }

?>
