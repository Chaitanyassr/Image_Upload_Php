<?php
   if(isset($_FILES['image'])){
      $errors= array();
      $file_name = $_FILES['image']['name'];
      $file_size =$_FILES['image']['size'];
      $file_tmp =$_FILES['image']['tmp_name'];
      $file_type=$_FILES['image']['type'];
      $file_ext=strtolower(end(explode('.',$_FILES['image']['name'])));
      $Upload_True = 1;
      $Target_File= array("jpeg","jpg","png");
      
      if(in_array($file_ext,$Target_File)=== false){
         $errors[]="extension not allowed, please choose a JPEG or PNG file.";
      }

       if($file_size > 500000) {
         $errors[]='File size must be excately 2 MB';
      }
      
      
      if(empty($errors)==true){
         move_uploaded_file($file_tmp,"images/".$file_name);
         echo "Success";
      }else{
         print_r($errors);
      }
   }
?>
<html>
   <body>
      
      <form action="index.php" method="POST" enctype="multipart/form-data">
         <input type="file" name="image" />
         <input type="submit"/>
      </form>
      
   </body>
</html> 
