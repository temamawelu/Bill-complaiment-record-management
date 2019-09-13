<?php


  $sender = $_REQUEST['sender'];
  $message = $_REQUEST['keyword'];

  $message = trim($message);

  if ($message!='') 
  {  
   $servername = "localhost";
      $username = "root";
      $password = "";
      $dbname = "et_sms_fixedreg";
      $conn = new mysqli($servername, $username, $password, $dbname);
      // Check connection
      if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
      } 
     /******start here****/
     if($message=='F'||$message=='f'){
echo "Dear Customer Wel Come TO Fixed Line SMS Registration\n"."\n 
          Please send your Full name and Address"."Fullname Address Area\n"."e.g.Abebekebede Addisabeba Leghar";
             }
else if(preg_match('/^([a-zA-Z]){3,21}\s([a-zA-Z]){2,10}\s([a-zA-Z0-9]){2,10}$/', $message,$rmatchs)){
// print_r($rmatchs);
      $splittedstring=explode(" ",$message);
      $fname=$splittedstring[0];
      $town=$splittedstring[1];
      $area=$splittedstring[2];
      $regdate=date('Y-m-d H:i:s');
    $sql = "SELECT `contact_No`, `fname` FROM `ethio_fixedline_tbl` WHERE `contact_No`='".$sender."' OR `fname`='".$fname."'";
$result = $conn->query($sql);
//print_r($result);
if($result->num_rows >= 1) {
    $reg_replay_msg .= "<br>" . "Dear Customer You are already Registrated by".$sender."<br>"."For more call 994";
      echo $reg_replay_msg;
} else {
   //insert query goes here
     $sql="INSERT INTO ethio_fixedline_tbl(contact_No,fname,town,area,regdate,remark)VALUES
                                          ('$sender','$fname','$town','$area','$regdate','$message')";
      mysqli_set_charset($conn,"utf8");
      if ($conn->query($sql) === TRUE) {
      //send replay 
      $reg_replay_msg .= "<br>" . "your Name: $fname <br> Your address: $town <br> Your Town: $area <br> Registration successfully done";
      echo $reg_replay_msg;
      }
      else
      { echo "Error: " . $sql . "\n" . $conn->error;
      }
      $conn->close();


    }//ende of check



       
  }//abebe bekila addis abeba lideta or abebe bekila addis abeba 
 else if(preg_match('/^([a-zA-Z]){3,21}\s([a-zA-Z]){3,21}\s([a-zA-Z]){3,21}\s([a-zA-Z]){2,14}\s([a-zA-Z0-9._-]){2,10}$/', $message,$rmatchs)){
       // print_r($rmatchs);
      $splittedstring=explode(" ",$message);
      $fname=$splittedstring[0]." ".$splittedstring[1];//full name firstname+lastname
      $town=$splittedstring[2];//address bale robe
      $area=$splittedstring[3]." ".$splittedstring[4];//area leghar
       $sql = "SELECT `contact_No`, `fname` FROM `ethio_fixedline_tbl` WHERE `contact_No`='".$sender."' OR `fname`='".$fname."'";
$result = $conn->query($sql);
//print_r($result);
if($result->num_rows >= 1) {
    $reg_replay_msg .= "<br>" . "Dear Customer You are already Registrated by".$sender." Thank You<br>"."For more call 994";
      echo $reg_replay_msg;
}else{
    $regdate=date('Y-m-d H:i:s');
      $sql="INSERT INTO ethio_fixedline_tbl(contact_No,fname,town,area,regdate,remark)VALUES
                                          ('$sender','$fname','$town','$area','$regdate','$message')";
      mysqli_set_charset($conn,"utf8");
      if ($conn->query($sql) === TRUE) {//send replay 
      $reg_replay_msg .= "Dear Customer You are successfully Registrated<br>" . "Name: $fname <br>Address: $town <br> Area: $area <br> Thank you";
      echo $reg_replay_msg;
      }
      else
      { echo "Error: " . $sql . "\n" . $conn->error;
      }
      $conn->close();
    }//end of check
      
  }else if(preg_match('/^([a-zA-Z]){3,21}\s([a-zA-Z]){3,21}\s([a-zA-Z]){3,20}\s([a-zA-Z0-9._-]){2,10}$/', $message,$rmatchs)){////e.g abebe bekila Adama kebele04 
     //print_r($result);
      $splittedstring=explode(" ",$message);
      $fname=$splittedstring[0]." ".$splittedstring[1];//full name
      $town=$splittedstring[2];//Address
      $area=$splittedstring[3];//e.g area kebeke04
      $sql = "SELECT `contact_No`, `fname` FROM `ethio_fixedline_tbl` WHERE `contact_No`='".$sender."' OR `fname`='".$fname."'";
$result = $conn->query($sql);
print_r($result);
if($result->num_rows >= 1) {
    $reg_replay_msg .= "<br>" . "Dear Customer You are already Registrated by".$sender." Thank You<br>"."For more call 994";
      echo $reg_replay_msg;
}else{
      $regdate=date('Y-m-d H:i:s');
      $sql="INSERT INTO ethio_fixedline_tbl(contact_No,fname,town,area,regdate,remark)VALUES
                                          ('$sender','$fname','$town','$area','$regdate','$message')";
      mysqli_set_charset($conn,"utf8");
      if ($conn->query($sql) === TRUE) {//send replay 
      $reg_replay_msg .= "<br>" . "your Name: $fname <br> Your address: $town <br> Your Town: $area <br> Registration successfully done";
      echo $reg_replay_msg;
      }
      else
      { echo "Error: " . $sql . "\n" . $conn->error;
      }
      $conn->close();
    }//end of check
  }else if($message=='help'||$message=='Help'||$message=='H'||$message=='h'){
  	echo'To Request FixedLine Send using this Format Fullname Address Town <br>E.g <br>Abebe bekele Addis Abeba Leghar for more call 994';
  }else{ 
    echo"Invalid Format please Send :Help or h";
    //echo $message;
       }
    /******End here****/ 
  }else 
    {//end of send not empty and message not empty
        echo "Invalid format,please send using correct format: Fullname*Address*Town <br>E.g For Fullname with Abebe Bekele Adress Addis abeba and Town Leghar send:<br>Abebebekele AddisAbeba Leghar";

      }
?>