 <?php include('partials/menu.php'); ?>
 
 
 <div class="main-content">

    <div class="wrapper">
        <h1>Add Admin</h1>
            <br><br>
            <?php 
            if(isset($_SESSION['add'])) //checking  whether the session is set or not
            {
                echo $_SESSION['add']; //display the session mssg if set 
                unset($_SESSION['add']); //remove session mssg
            }
            ?>s
        <form action="" method="POST">
            
        <table class="tbl-30">
            <tr>
                <td>Full Name:</td>
                <td><input type="text" name="full_name" placeholder="Enter Your Name"></td>
        </tr>
            <tr>
                <td>Username:</td>
                <td><input type="text" name="username" placeholder="Username"></td>
        </tr>
            <tr>
                <td>Password:</td>
                <td><input type="password" name="password" placeholder="Enter Your password"></td>
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
 
 


 <?php include('partials/footer.php'); ?>

 <?php
//process the value from form and save it in DB
// check whether the button is clicked or not
if(isset($_POST['submit']))
{
    // Button Clicked
    // echo"button Clicked";

    // get the data from form
    $full_name = $_POST['full_name'];
    $username = $_POST['username'];
    $password =md5($_POST['password']); //password encrypt with md5

    // sql query to save the data into db
    $sql ="INSERT INTO tbl_admin SET
    full_name='$full_name',
    username='$username',
    password='$password'
    ";

   //3.execute query and saving data into DB
    $res = mysqli_query($conn, $sql) or die(mysqli_error());
     
    //4. Check Whether the (query is executed) data is inserted or not and display appropriate message 
    if($res==TRUE)
    {
        //data inserted
        // echo "Data Inserted";
        //create a session  variables to display message
        $_SESSION['add'] ="Admin Added Successfully";
        // Redirect Page to manage admin
        header("location:".SITEURL.'admin/manage-admin.php');
        
    
    }
    else
    {
        //Failed to insert Data 
        // echo "Failed to insert Data";
           //create a session  variables to display message
           $_SESSION['add'] ="Failed to Add Admin";
           // Redirect Page to add admin
           header("location:".SITEURL.'admin/add-admin.php');
    }
}


?>