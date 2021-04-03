<?php
//session_start();
include "db.php";
include "config1.php";
include "header.php";
require_once('stripe-php-master/init.php');

if(isset($_POST['stripeToken'])){

    $token = $_POST["stripeToken"];

    \Stripe\Stripe::setVerifySslCerts(false);

    

    
    //$contact_name = $_POST["customer_name"];
    $token_card_type = $_POST["stripeTokenType"];
   // $phone           = $_POST["phone"];
   // $email           = $_POST["stripeEmail"];
  //  $address         = $_POST["customer_address"];
    $amount        = $_POST["total_price"]; 
   // $desc            = $_POST["product-details"];
    $charge = \Stripe\Charge::create([
      "amount" => str_replace(",","", $amount) * 100,
      "currency" => 'inr',
     // "description"=>$desc,
      "source"=> $token,
    ]);

 
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>success</title>
   </head>
<body>
<br />
    <br />
    <br />
    <center>
      <div class="success-container">
        <?php
           $ordStatus = 'Your Transaction has been Successfully Completed'; 
          // if(isset($_GET["amount"]) && !empty($_GET["amount"]))
           if($charge)
           {
               ?>
          
            <h4>Payment Information</h4> <br />
                <p><b>Paid Amount:</b> <?php print_r($charge['amount']); ?></p>
                <p><b>TXN ID:</b> <?php print_r($charge['balance_transaction']); ?></p>
                <p><b>Transaction ID:</b> <?php print_r($charge['id']); ?></p>
                <p><b>Payment Status:</b> <?php echo $ordStatus ?></p>
      <!--
                <h4>Product Information</h4>
                <p><b>Name:</b> <?php print_r($charge['description']); ?></p>
                <p><b>Price:</b> <?php print_r($charge['amount']); ?></p>
           -->
         <?php 
        }
        else
        { 
            ?>
                <h1 class="error">Your Payment has Failed</h1>
            <?php 
        } ?>
    </div>
    <a href="index.php" class="btn-link">Back to Home Page</a>
    </center>
</body>
</html>
<br />
    <br />
    <br />
<?php
    include "footer.php";
    ?>