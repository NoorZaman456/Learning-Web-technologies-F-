<?php
function calculateVAT($amount, $vatRate = 15) {
    $vatAmount = ($amount * $vatRate) / 100;
    return $vatAmount;
}
$amount = 10000;  
$vat = calculateVAT($amount);
echo "Amount: \$" . number_format($amount, 2) . "<br>";
echo "VAT (15%): \$" . number_format($vat, 2) . "<br>";
echo "Total amount with VAT: \$" . number_format($amount + $vat, 2) . "<br>";
?>