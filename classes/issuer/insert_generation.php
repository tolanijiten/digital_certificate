<?php
include_once("../../functions/db.php");
session_start();
$user_id=$_SESSION['user_id'];
//$user_id=1;

if(isset($_POST["submit_generation"])){
    $name = $_POST["name"];
    $commitee_name = $_POST["commitee_name"];
    $certificate_title = "";
    $date = $_POST["date"];
    $signature_1_name = $_POST["signature_1_name"];
    $signature_2_name = $_POST["signature_2_name"];
    $template_id=$_POST['template_id'];
    
    
    $query = "INSERT INTO generation(template_id, commitee_name, certificate_title, authority_1_name, authority_2_name, date,issued_by) VALUES('$template_id','$commitee_name', '$certificate_title', '$signature_1_name', '$signature_2_name','$date',$user_id)";
//    echo $query;
    $result = mysqli_query($connection, $query);
    $recent_id = mysqli_insert_id($connection);

/*-------------------------------------------------------------------------------------    

    
    
/* -----------------------logo upload -----------------------------------*/  
    
//    
//    if(isset($_FILES['logo'])){
//        //yes the file was uploaded so we are initializing all the required variables
//        $image_name = $_FILES['logo']['name'];
//        $image_size = $_FILES['logo']['size'];
//        $temp_name = $_FILES['logo']['tmp_name'];
//        $file_type = $_FILES['logo']['type'];
//        echo $image_name;
////      $file_extension = strtolower(end(explode(".",$image_name)));
//    }
//    
//    $image_name=$recent_id.".png";
////    echo "<br>".$image_name;
//    if(isset($_FILES['logo'])){
//        echo 'here';
//        move_uploaded_file($temp_name,"../logo_images/".$image_name);   
//    }
////    echo "ADDED";
//    
//    
//    $image = $recent_id.".png";
////    echo $image;
//    $query = "UPDATE generation SET logo = '$image' WHERE generation_id = $recent_id";
////    echo $recent_id;    
//    $result = mysqli_query($connection, $query);
    
/*-------------------------------------------------------------------------------------    
    
    
    
/* -----------------------signature 1 -----------------------------------*/  

    if(isset($_FILES['signature_1_photo'])){
        //yes the file was uploaded so we are initializing all the required variables
        $image_name = $_FILES['signature_1_photo']['name'];
        $image_size = $_FILES['signature_1_photo']['size'];
        $temp_name = $_FILES['signature_1_photo']['tmp_name'];
        $file_type = $_FILES['signature_1_photo']['type'];
    }
    
    $image_name=$recent_id.".png";
    if(isset($_FILES['signature_1_photo'])){
        move_uploaded_file($temp_name,"images/authority_1_signature/".$image_name);   
    }
    $image = $recent_id.".png";
    $query = "UPDATE generation SET authority_1_signature = '$image' WHERE generation_id = $recent_id";
    $result = mysqli_query($connection, $query);
 /*-------------------------------------------------------------------------------------    
   
    
    
/* -----------------------signature 2 -----------------------------------*/  

    
    if(isset($_FILES['higher_authority_signature'])){
        //yes the file was uploaded so we are initializing all the required variables
        $image_name = $_FILES['higher_authority_signature']['name'];
        $image_size = $_FILES['higher_authority_signature']['size'];
        $temp_name = $_FILES['higher_authority_signature']['tmp_name'];
        $file_type = $_FILES['higher_authority_signature']['type'];
        
        echo $image_name;
//        exit;
//        $file_extension = strtolower(end(explode(".",$image_name)));
    }
    
    $image_name=$recent_id.".png";
    if(isset($_FILES['higher_authority_signature'])){
        move_uploaded_file($temp_name,"images/authority_2_signature/".$image_name); 
//        echo "moved";
    }
    $image = $recent_id.".png";
    echo $image;
    $query = "UPDATE generation SET authority_2_signature = '$image' WHERE generation_id = $recent_id";
    $result = mysqli_query($connection, $query);

    
/*-------------------------------------------------------------------------------------    
   
    
    
    
    
 /*--------------------------Creating Table-----------------*/   
    

    $sql = "CREATE TABLE $commitee_name (
  student_id int(11) NOT NULL AUTO_INCREMENT,
  student_name varchar(255) NOT NULL,
  year varchar(255) NOT NULL,
  department varchar(255) NOT NULL,
  class varchar(255) NOT NULL,
  rank varchar(255) NOT NULL,
  field varchar(255) NOT NULL,
  score varchar(255) NOT NULL,
  email varchar(255) NOT NULL,
  qr_image varchar(255) NOT NULL,
  link varchar(255) NOT NULL,
  email_sent varchar(255) NOT NULL  DEFAULT 'NOT_SENT',
   PRIMARY KEY (student_id)
)";

    $result = mysqli_query($connection, $query);
    if (mysqli_query($connection, $sql)) {
//    echo "Table created successfully";
} else {
    die("Error creating table: " . mysqli_error($connection));
    
}


/*-------------------------------------------------------------------------------------    
    
    
    
    
    
    
    
/*------------------------Uploading Excel Data into Table------------------*/    
$columns=array();

    
    
$value = explode(".", $_FILES["excel_sheet"]["name"]);
$extension = strtolower(array_pop($value));
 $allowed_extension = array("xls", "xlsx", "csv"); //allowed extension
 if(in_array($extension, $allowed_extension)) //check selected file extension is present in allowed extension array
 {
  $file = $_FILES["excel_sheet"]["tmp_name"]; // getting temporary source of excel file
  include("PHPExcel/IOFactory.php"); // Add PHPExcel Library in this code
  $objPHPExcel = PHPExcel_IOFactory::load($file); // create object of PHPExcel library by using load() method and in load method define path of selected file

//  $output .= "<label class='text-success'>Data Inserted</label><br /><table class='table table-bordered'>";
     
  foreach ($objPHPExcel->getWorksheetIterator() as $worksheet)
  {
    $highest_column=$worksheet->getHighestColumn();
//    echo $highest_column;  
   $highestRow = $worksheet->getHighestRow();
//      echo $highestRow;
//      exit;
   for($row=2; $row<=$highestRow; $row++)
   {
//    $output .= "<tr>";
//    $student_id = mysqli_real_escape_string($connection, $worksheet->getCellByColumnAndRow(0, $row)->getValue());
    
    $student_name = mysqli_real_escape_string($connection, $worksheet->getCellByColumnAndRow(1, $row)->getValue());
       
    $year= mysqli_real_escape_string($connection, $worksheet->getCellByColumnAndRow(2, $row)->getValue());
       
    $department = mysqli_real_escape_string($connection, $worksheet->getCellByColumnAndRow(3, $row)->getValue());
       
    $class = mysqli_real_escape_string($connection, $worksheet->getCellByColumnAndRow(4, $row)->getValue());

    $rank = mysqli_real_escape_string($connection, $worksheet->getCellByColumnAndRow(5, $row)->getValue());
       
    $field = mysqli_real_escape_string($connection, $worksheet->getCellByColumnAndRow(6, $row)->getValue());
       
    $score = mysqli_real_escape_string($connection, $worksheet->getCellByColumnAndRow(7, $row)->getValue());

    $email = mysqli_real_escape_string($connection, $worksheet->getCellByColumnAndRow(8, $row)->getValue());

    $query = "INSERT INTO $commitee_name(student_name, year,department,class, rank, field,score, email) VALUES ('$student_name', '$year','$department','$class', '$rank', '$field','$score', '$email')";
       
//       echo $query;
//       exit;
    mysqli_query($connection, $query);
//       echo $query;
//    $output .= '<td>'.$name.'</td>';
//    $output .= '<td>'.$email.'</td>';
////    $output .= '<td>'.$add.'</td>';   
//    $output .= '</tr>';
   }
  } 
//  $output .= '</table>';

 }
 else
 {
//  $output = '<label class="text-danger">Invalid File</label>'; //if non excel file then
 }
    
header("Location: records.php?generation_id=$recent_id");
    
    
}
    
    
    
    
    
    
    
    
    
    
    
    
    


?>