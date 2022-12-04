<?php 
        session_start();
        $username = "root";
        $password = "";
        $database = "bus_management_system";
        $mysqli = new mysqli("localhost", $username, $password, $database);

        if(isset($_POST['but_delete'])){

            if(isset($_POST['delete'])){
                foreach($_POST['delete'] as $deleteid){

                $deleteUser = "Delete from bus WHERE Bus_id = '$deleteid'";
                $result =  mysqli_query($mysqli, $deleteUser);
                if($result)
                {
                    $_SESSION['fielddelete'] = "  Record deleted successfully";
                }    

                if(!$result)
                {
                    $_SESSION['fielddelete1'] = "  Error : Unable to delete record , try again";
                }    
            }
            }
        }
        header("location: searchbox.php")
?>