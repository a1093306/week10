<?php
require("DBconnected.php");
$pNo=$_GET["pNo"];
echo $pNo."<br>";
$SQL="SELECT * FROM photo WHERE pNo='$pNo'";
if ($result=mysqli_query($link, $SQL)){
    while($row=mysqli_fetch_assoc($result)){
        $ppath=$row['ppath'];
        echo "<img src='/homework7/".$ppath."'width='30%'><br>";
        echo $ppath."<br><br>";
    }
}
?>

<form action="updatephotoconfirm.php" method="post" enctype="multipart/form-data">
    <input type="hidden" name="pNo" value='<?php echo $pNo;?>'>
    <input type="file" name="photo" accept="image/*" ><br/>

    <input type="submit" value="更新">
</form>
