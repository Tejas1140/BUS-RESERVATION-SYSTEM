<?php 
        session_start();
        $username = "root";
        $password = "";
        $database = "bus_management_system";
        $mysqli = new mysqli("localhost", $username, $password, $database);

        if(isset($_POST['but_delete'])){

            if(isset($_POST['delete'])){
                foreach($_POST['delete'] as $deleteid){

                $deleteUser = "Delete from passenger WHERE P_id = '$deleteid'";
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
        if(isset($_POST['but_update'])){

            if(isset($_POST['update'])){
                foreach($_POST['update'] as $updateid){

                $updateUser = "Alter from passenger WHERE P_id = '$updateid'";
                $result =  mysqli_query($mysqli, $updateUser);
                if($result)
                {
                    $_SESSION['fieldupdate'] = "  Record updated successfully";
                }    

                if(!$result)
                {
                    $_SESSION['fieldupdate1'] = "  Error : Unable to update record , try again";
                }    
            }
            }
        }
        header("location: passenger.php")
?>