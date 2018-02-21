<?php
session_start();
//check if user has logged in or not

/*if(!isset($_SESSION['loggedInUser'])){
    //send the iser to login page
    header("location:index.php");
}*/
include_once("includes/functions.php");
include_once("includes/connection.php");
$cardId = validateFormData($_POST['id']);
//setting error variables
$error="";

//check if the insert was pressed
if(isset($_POST['insert-image'])){
    if(isset($_FILES['image'])){
      $errors= array();
      $fileName = $_FILES['image']['name'];
      $fileSize = $_FILES['image']['size'];
      $fileTmp = $_FILES['image']['tmp_name'];
      $fileType = $_FILES['image']['type'];
      $fileExt=strtolower(end(explode('.',$_FILES['image']['name'])));
      $targetName="report/".$_POST['id'].".".$fileExt;  
      
      if(empty($errors)==true) {
        if (file_exists($targetName)) {   
            unlink($targetName);
        }      
         $moved = move_uploaded_file($fileTmp,$targetName);
         if($moved == true){
             //successful
             $query = "Update faculty set report_path =' ".$targetName."' where P_ID = $cardId";
             mysqli_query($conn,$query);
             header("location:2_dashboard.php");
             echo "<h1> $targetName </h1>";
         }
         else{
             //not successful
             header("location:error.php");
         }
      }
        else{
         print_r($errors);
        header("location:else.php");
      }
   }
}

?>





<?php include_once('head.php'); ?>
<?php include_once('header.php'); ?>
<?php include_once('sidebar.php'); ?>





<div class="content-wrapper">
    
    <section class="content" style = "margin:10px;">
          <div class="row">
            <!-- left column -->
            <div class="col-md-6">
              <!-- general form elements -->
              <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title">Upload Report</h3>
                </div><!-- /.box-header -->
                <!-- form start -->
                <form action=''
                 method="POST" enctype="multipart/form-data" class="row">
<?php //echo $cardId;?>
                    <input type ='hidden' name = 'id' value = '<?php echo $cardId;?>'>
                     <div class="form-group col-md-6">
                         <label for="card-image">Report * </label>
                         <input  type="file"  required class="form-control input-lg" id="card-image" name="image">
                    </div> 
                    <div class="form-group col-md-12">
                         <a href="2_dashboard.php" type="button" class="btn btn-warning btn-lg">Cancel</a>
                         <div class="pull-right"> 
                             <button name="insert-image" type="submit" class="btn btn-success  btn-lg">Insert</button>
                         </div>
                    </div> 
                 </form>
                
                </div>
              </div>
           </div>      
        </section>
    
</div>
   
    
    
    
<?php include_once('footer.php'); ?>
   
   