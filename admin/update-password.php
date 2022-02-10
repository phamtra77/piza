<?php include('./partials/menu.php')?>
<?php include('../config/constances.php') ?>

<div class="main-content">
    <div class="wrapper">
        <h1>Change Password</h1> <br><br>

        <?php
            if(isset($_GET['id'])) 
            {
                $id = $_GET['id'];
            }
        ?>
        <form action="" method="POST">
            <table class="tbl-30">
                <tr>
                    <td>Old Password</td>
                    <td>
                        <input type="password" name="current_password" placeholder="Old Password">
                    </td>
                </tr>

                <tr>
                    <td>New Password</td>
                    <td>
                        <input type="password" name="new_password" placeholder="New Password">
                    </td>
                </tr>

                <tr>
                    <td>Confirm Password</td>
                    <td>
                        <input type="password" name="confirm_password" placeholder="Confirm Password">
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <input type="hidden" name="id" value="<?php echo $id ?>">
                        <input type="submit" name="submit" value="Change Password" class="btn-secondary">
                    </td>
                </tr>
            </table>
        </form>
    </div>
</div>

<?php 
   if(isset($_POST['submit']))
   {
       //1. get the data from form
       $id = $_POST['id'];
       $current_password = md5($_POST['current_password']);
       $new_password = md5($_POST['new_password']);
       $confirm_password = md5($_POST['confirm_password']);

       //2. Check whether the user with current ID and Current Password 
       $sql = "SELECT * FROM tbl_admin WHERE id=$id AND password = '$current_password'";
       $res = mysqli_query($conn,$sql);
       if($res==TRUE)
       {
           $count = mysqli_num_rows($res);
           if($count == 1)
           {
               if($new_password == $confirm_password)
               {
                   $sql2 = "UPDATE tbl_admin SET 
                   password = '$new_password'
                   WHERE id = $id";
                   $res2 = mysqli_query($conn,$sql2);
                   if($res == true)
                   {
                       $_SESSION['change-pwd'] = "<div class='success'>Password changed successful. </div>";
                       header('location:'.SITEURL.'admin/manage-admin.php');
                   }
                   else
                   {
                       $_SESSION['change-pwd'] = "<div class='error'>Failed to changes password.</div>";
                       header('location:'.SITEURL.'admin/manage-admin.php');
                   }
               }
               else
               {
                  $_SESSION['pwd-not-match'] = "<div class='error'>Password Did not patch. </div>";
                  header('location:'.SITEURL.'admin/manage-admin.php'); 
               }
           }
           else 
           {
               $_SESSION['user-not-found'] = "<div class='error'>User not found.</div>";
               //chuyen huong user
               header('location:'.SITEURL.'admin/manage-admin.php');
           }
       }
   }
?>

<?php include('./partials/footer.php') ?>