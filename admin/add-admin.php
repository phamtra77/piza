<?php include('./partials/menu.php') ?>
<?php include('../config/constances.php') ?>
<div class="main-content">
    <div class="wrapper">
        <h1>Add Admin</h1><br/>

        <?php 
            if(isset($_SESSION['add']))
            {
                echo $_SESSION['add'];
                unset ($_SESSION['add']);
            }
        ?>

        <br/> <br/><br/>
        <form action="" method="POST">
            <table class="tbl-30">
                <tr>
                    <td>Full Name:</td>
                    <td><input type="text" name="full_name" placeholder="Enter your name"></td>
                </tr>

                <tr>
                    <td>UserName:</td>
                    <td>
                        <input type="text" name="username" placeholder="Your Username">
                    </td>
                </tr>

                <tr>
                    <td>Password</td>
                    <td>
                        <input type="password" name="password" placeholder="Your Password">
                    </td>
                </tr>

                <tr>
                    <td colspan="2">
                        <input type="submit" name="submit" value="Add Admin" class="btn-secondary">
                    </td>
                </tr>
            </table>
        </form>
    </div>
</div>

<?php include('./partials/footer.php') ?>

<?php 
    //Check whether the submit button is clicked or not
    if(isset($_POST['submit'])) {
        $full_name = $_POST['full_name'];
        $username = $_POST['username'];
        $password = md5($_POST['password']); //password encryption with md5

        //Sql query to save data into database

        $sql = "INSERT INTO tbl_admin SET
        full_name = '$full_name',
        username = '$username',
        password = '$password'";

        //executing query and saveing data 
        $res = mysqli_query($conn,$sql) or (die ('Cancel'));
        if($res == TRUE) {
            //Create a session to display message
            $_SESSION['add'] = "<div class = 'success'> Admin Added Successfully. </div>";
            //Redirect Page to manage admin
            header("location:" .SITEURL.'admin/manage-admin.php');
        }
        else {
            //fail to  insert data
            //create session to display message
            $_SESSION['add'] = "<div class = 'error'>Fail to add admin. </div>";
            //redirect page to add admin
            header("location:" .SITEURL .'admin/add-admin.php');
        }
    }
?>