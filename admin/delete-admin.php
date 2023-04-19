<?php 

//include constnant file here
include('../config/constants.php');

    // 1.get the ID of Admin to be Deleted

    $id= $_GET['id'];
    //2.create sql query to delete admin
    $sql = "DELETE FROM tbl_admin WHERE id=$id";

    //execute the query
    $res = mysqli_query($conn, $sql);


    //check  whether the query executed successfully or not 
    if($res==true)
    {
        // Query executed successfully and admin deleted
       // echo"Admin Deleted";
       //create session variable to display message
       $_SESSION['delete'] = "<div class='success'>Admin Deleted Successfully</div>";
       //Redirect to manage Admin Page 
       header('location:'.SITEURL.'admin/manage-admin.php');
    }
    else
    {
        //Failed to delete Admin
        // echo"Failed to delete ";
        $_SESSION['delete'] = "<div class='error'>Failed to Delete Admin,Try Again later.</div>";
        header('location:'.SITEURL.'admin/manage-admin.php');
    }


    //3.redirect to manage admin page with message(success/error)



?>