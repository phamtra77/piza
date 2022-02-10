<?php 
    include ('../config/constances.php');

    //1.Get the id of admin to be delete
        $id = $_GET['id'];
    //2. Execute to query
       $sql = "DELETE FROM tbl_admin WHERE id = $id ";
       $res = mysqli_query($conn,$sql);
    //3. Check query executed successfully or not
       if($res == TRUE){
           $_SESSION['delete'] = "<div class = 'success'>Admin delete successfully.</div>";
           header('location:'.SITEURL.'admin/manage-admin.php');
       }
       else {
           $_SESSION['delete'] = "<div class = 'error'> Failed to delete admin. Try again later.</div>";
           header('location:'.SITEURL.'admin/manage-admin.php');
       }
?>