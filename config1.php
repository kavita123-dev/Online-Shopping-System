<?php
require('stripe-php-master/init.php');

$publishableKey=
"pk_test_51IRcJTKbjVkiWuWisWVbdblGTfsp7GLjVBCLDH0Y0qEvjs7NSH77oKnu8ixfdFog9ZxC5pu3YFXLESsoLVgsD7up00Xd5hHPCX";

$secretKey=
"sk_test_51IRcJTKbjVkiWuWiaIklSLgfxq5CW07cGXMiekVJRCTHd4iFLzw9nGlgupq14JPSpEPBaHp5ZXIQ1KkvIKFmYJg700DbfJsykV";

\Stripe\Stripe::setApiKey($secretKey);
?>