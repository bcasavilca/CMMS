<?php 

include_once("connection.php");
?>
<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require $_SERVER['DOCUMENT_ROOT'] . '/mail/Exception.php';
require $_SERVER['DOCUMENT_ROOT'] . '/mail/PHPMailer.php';
require $_SERVER['DOCUMENT_ROOT'] . '/mail/SMTP.php';

$mail = new PHPMailer;
$mail->isSMTP(); 
$mail->SMTPDebug = 0; // 0 = off (for production use) - 1 = client messages - 2 = client and server messages
$mail->Host = "smtp.office365.com"; // use $mail->Host = gethostbyname('smtp.gmail.com'); // if your network does not support SMTP over IPv6
$mail->Port = 587; // TLS only
$mail->SMTPSecure = 'TLS'; // ssl is deprecated
$mail->SMTPAuth = true;
$mail->Username = 'ufficio.manutenzione@outlook.com';                 // SMTP username
$mail->Password = 'Toro2020';                           // SMTP password
$mail->setFrom('ufficio.manutenzione@outlook.com', 'Manutenzione');

$mail->addAddress('bcasavilca@yahoo.com', 'Bruno'); 
//$mail->AddAddress('gb.busi@gmail.com', 'Giamba');

$mail->Subject = 'allerta di vento';
//------------------------------------------------
$image = $_FILES['image']['tmp_name'];
$mail->AddAttachment($image,'immagine.jpg');
//-------------------------------------------------
 $re = $_POST['data'];
 $timestamp = strtotime($re);
 $new_date = date("d-m-Y", $timestamp);
//-------------------------------------------------
 $hora =  $_POST['hora'];
 $time = strtotime($hora);
 $new_time = date("H:i", $time);
//----------------------------------------------------
$msg_daily = 
'<html>
<head>
 
</head>
<body>
 
  <table border="1px"  style="width: 300px;height:25px">
  <tr >  
     <td colspan="2" class=preencher ><b>'.$_POST['Azione'].'</b></td>  
     </tr>
    
	 <tr>  
     <td class=cabecalho > Data:  </td>  
     <td class=preencher>'.$new_date.'</td>  
     </tr> 
     <tr>  
     <td class=cabecalho > Ore:  </td>  
     <td class=preencher>'.$new_time.'</td>  
     </tr>
  <!--   <tr>  
     <td class=cabecalho > Commenti:  </td>  
     <td class=preencher>'.$_POST['commenti'].'</td>  
     </tr>-->
      
    </table>
    </body> 

</html>
';

$mail->msgHTML($msg_daily); 


$mail->AltBody = 'HTML messaging not supported';


$mail->SMTPOptions = array(
                    'ssl' => array(
                        'verify_peer' => false,
                        'verify_peer_name' => false,
                        'allow_self_signed' => true
                    )
                );


 if ($mail->send())
 { header("Refresh:2; url=index.php");
   echo"<p style='color:green;font-size:50px;'>Email enviato</p>";
    
} else{ 
    echo " Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}




if (isset($_POST['submit_temporale']))
{
//var do 
 $Azione=$_POST['Azione'];
 $data=$_POST['data'];
 $hora=$_POST['hora'];
 $commenti=$_POST['commenti'];
 
 $re = $_POST['data'];
 $timestamp = strtotime($re);
 $new_date = date("d-m-Y", $timestamp);
 
 

if (isset($_FILES['image']) && empty(!$_FILES['image'])) 
{
 $img_name = $_FILES['image']['name'];
 $tmp_name = $_FILES['image']['tmp_name'];
 $img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
 $img_ex_lc = strtolower($img_ex);
  if (!$_FILES['image']['size'] == 0 )
    {
         $new_img_name = uniqid("IMG-", true).'.'.$img_ex_lc;
         $img_upload_path = 'upload/'.$new_img_name;
		 move_uploaded_file($tmp_name, $img_upload_path); 
    
    }else{
          $img_upload_path = "";
         }
}    


 // Insert into Database
 $sql="INSERT INTO gobat(Azione,data,hora,commenti,image) VALUES ('$Azione','$data','$hora','$commenti', '$img_upload_path' )";
		 		            
		    	
if (!mysqli_query($conexao,"INSERT INTO gobat(Azione,data,hora,commenti,image) VALUES ('$Azione','$data','$hora','$commenti', '$img_upload_path' )"))
 
  {
  echo("Error description: ". mysqli_error($conexao));
  }else{ 
  
      echo"<p style='color:green;font-size:50px;'>Registrazione com succeso</p>";
  }


mysqli_close($conexao);
 
 

    
}
 