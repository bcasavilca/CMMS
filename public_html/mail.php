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

$mail->Subject = 'Rapporto giornalero';

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
 $re_finale = $_POST["data_finale"];
 $timestamp_finale = strtotime($re_finale);
 $new_date_finale = date("d-m-Y", $timestamp_finale);
//----------------------------------------------------
$hora_finale = $_POST['hora_finale'];
$time_finale = strtotime($hora_finale);
$new_time_finale = date("H:i", $time_finale);
$msg_daily = 
'<html>
<head>
 
</head>
<body>
  <p><b>Registro di Intervento</b></p></br>
  <table border="1px"  style="width: 300px">
  <tr >  
     <td class=cabecalho> Girassole:  </td>  
     <td class=preencher >'.$_POST['id'].'</td>  
     </tr>
    
	 <tr>  
     <td class=cabecalho > Data:  </td>  
     <td class=preencher>'.$new_date.'</td>  
     </tr>
     <tr>  
     <td class=cabecalho > Ore:  </td>  
     <td class=preencher>'.$new_time.'</td>  
     </tr> 
    
     <tr>  
     <td colspan="2" class=cabecalho > Commenti:  </td>  
     </tr>  
     <tr>  
      <td style="white-space: pre-line;height:25px" colspan="2">'.$_POST['problema'].'</br></td>  
     </tr>  

   </table ></br>
   <table border="1px" style="width: 300px" >
    <tr>  
     <td colspan="2" class=cabecalho > Descrizione del lavoro:  </td>  
     </tr>  
     <tr>  
    <td style="white-space: pre-line;" colspan="2" >'.$_POST['solucao'].'</td>  
    </tr>
    
    </table ></br>
    <table border="1px" style="width: 300px" >
     <tr> 
     <td class=cabecalho >Conclusione:  </td> 
     <td class=cabecalho > '.$_POST['risultato_finale'].'</td> 
     </tr> 
         <tr> 
     <td  > Data finale:  </td>  
     <td class=preencher >'.$new_date_finale.'</td> 
     </tr> 
     <tr>  
     <td class=cabecalho > Ore finale:  </td>  
     <td class=preencher>'.$new_time_finale.'</td>  
     </tr> 
   
    
    
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




if (isset($_POST['submit']))
{
//var do bd
 $data=$_POST['data'];
 $hora=$_POST['hora'];
 $id=$_POST['id'];
 $status=$_POST['status'];
 $cor=$_POST['cor'];
 $comunicazione=$_POST['comunicazione'];
 $comando=$_POST['comando'];
 $actual_TL =$_POST['actual_TL'];
 $actual_AZ=$_POST['actual_AZ'];
 $setpoint_TL=$_POST['setpoint_TL'];
 $setpoint_AZ=$_POST['setpoint_AZ'];
 $asse = $_POST['asse'];
 $seguimento = $_POST['seguimento'];
 $valor = $_GET['valor'] ?? '';;
 $problema=$_POST['problema'];
 $solucao=$_POST['solucao'];
 $risultato_finale=$_POST['risultato_finale'];
 $data_finale=$_POST['data_finale'];
 $hora_finale=$_POST['hora_finale'];
 
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
 $sql="INSERT INTO tabela(data,hora,id,status,cor,comunicazione,comando,actual_TL,actual_AZ,setpoint_TL,setpoint_AZ,problema,asse,seguimento,manutenzione,solucao,image,risultato_finale,data_finale,hora_finale) VALUES ('$data','$hora','$id','$status','$cor','$comunicazione','$comando','$actual_TL','$actual_AZ','$setpoint_TL','$setpoint_AZ',$problema','$asse','$seguimento','$valor',$solucao', '$img_upload_path','$risultato_finale','$data_finale','$hora_finale' )";
		 		            
		    	
if (!mysqli_query($conexao,"INSERT INTO tabela(data,hora,id,status,cor,comunicazione,comando,actual_TL,actual_AZ,setpoint_TL,setpoint_AZ,problema,asse,seguimento,manutenzione,solucao,image,risultato_finale,data_finale,hora_finale) VALUES ('$data','$hora','$id','$status','$cor','$comunicazione','$comando','$actual_TL','$actual_AZ','$setpoint_TL','$setpoint_AZ','$problema','$asse','$seguimento','$valor','$solucao', '$img_upload_path','$risultato_finale','$data_finale','$hora_finale' )"))
 
  {
  echo("Error description: ". mysqli_error($conexao));
  }else{ 
  
      echo"<p style='color:green;font-size:50px;'>Registrazione com succeso</p>";
  }
  

 


mysqli_close($conexao);
 
 

    
}
 