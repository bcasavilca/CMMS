<?php 

include_once("connection.php");
?>
<?php



 //----email com interventos diarios-------------------------

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
$mail->CharSet = "UTF-8";
$mail->Username = 'ufficio.manutenzione@outlook.com';                 // SMTP username
$mail->Password = 'Toro2020';                           // SMTP password
$mail->setFrom('ufficio.manutenzione@outlook.com', 'Manutenzione');

$mail->addAddress('bcasavilca@yahoo.com', 'Bruno'); 
$mail->AddAddress('gb.busi@gmail.com', 'Giamba');
$mail->Subject = 'Rapporto giornalero';


$body .= '<p><b>Registro di Intervento</b></p>';
$respostas="SELECT * FROM tabela WHERE DATE(data_finale) = CURDATE()";
$res = mysqli_query($conexao,$respostas);

$datas = array();
if (mysqli_num_rows($res) > 0) {
    while($row = mysqli_fetch_assoc($res)){
        $datas[] = $row;
        
    }
}
      
      foreach ($datas as $data){
      $body .= '<table style="border:1px solid black;width:300px;" > ';
      $body .= '<tr > '; 
      $body .= '<td style="border:1px solid black"> Girassole:  </td> ';
      $body .= '<td style="border:1px solid black" >'.$data['id'].'</td></br>  '; 
      $body .= '</tr > '; 
      
      $body .= '<tr > ';
      $body .= '<td style="border:1px solid black"> Data:  </td> ';
      $body .= '<td style="border:1px solid black" >'.$data['data'].'</td></br>  '; 
      $body .= '</tr > ';
      
      $body .= '<tr > ';
      $body .= '<td style="border:1px solid black"> Descrizione del problema:  </td> ';
      $body .= '<td style="border:1px solid black" >'.$data['problema'].'</td></br>  '; 
      $body .= '</tr > ';
      
      $body .= '<tr > ';
      $body .= '<td style="border:1px solid black"> tipo manutenzione:  </td> ';
      $body .= '<td style="border:1px solid black" >'.$data['manutenzione'].'</td></br>  '; 
      $body .= '</tr > ';
      
      $body .= '<tr > ';
      $body .= '<td style="border:1px solid black"> Descrizione del lavoro:   </td> ';
      $body .= '<td style="border:1px solid black" >'.$data['solucao'].'</td></br>  '; 
      $body .= '</tr > ';
      
      $body .= '<tr > ';
      $body .= '<td style="border:1px solid black"> Data finale:   </td> ';
      $body .= '<td style="border:1px solid black" >'.$data['data_finale'].'</td></br>  '; 
      $body .= '</tr > ';
      
      $body .= '<tr > ';
      $body .= '<td style="border:1px solid black"> Conclusione:  </td> ';
      $body .= '<td style="border:1px solid black" >'.$data['risultato_finale'].'</td></br>  '; 
      $body .= '</tr > ';
      $body .= '</table > </br>';
    }
      $body .= '</br></br></br> <p><i>Questo è un riepilogo, altre informazioni sono registrate in <a href="https://spirano-it.000webhostapp.com/historic.php">spirano-it.000webhostapp.com/historic.php</a></i></p>';
$mail->Body = $body;
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


//----------------------------------------------------------



?>
<style>


body {
  white-space: pre-line;
  border:1px solid black;
  
  
}
.tabela{
    border: 1px!important;  
    width: 300px;
}

.cabecalho{
   color: red;
     width:150px!important;
   
    }
.preencher{

 padding-left: 10px!important;
   height:25px;
   width:150px!important;
   font-weight: 500;
}    
 

</style>
 
 

    

 