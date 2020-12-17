<?php
#id ，照片
$id=$_GET['id'];
$img=$_GET['img'];
// print_r($id);
$con=mysqli_connect('localhost','root','123456','ldq');
$sql = "SELECT * FROM `cake` WHERE `cake_id` = '$id'";//连接数据库的id匹配
$res=mysqli_query($con,$sql);
if(!$res){
    die('报错'.mysqli_error($con));
    
}
$row = mysqli_fetch_assoc($res);
if($row){
    print_r("数据存在");
}else{
    $sql1="INSERT INTO `cake` (`id`,`cake_id`,`cake_photo`) VALUES (NULL,'$id','$img')";
    $res1=mysqli_query($con,$sqll);
        if($res1){
            print_r("添加成功");
        }
}

?>