<link href="https://bml-app.herokuapp.com/proxy/checkout/stylesheet.css" rel="stylesheet" type="text/css" />
<h3 style="text-transform: none!important;">You are being redirected to the BML checkout page, please wait...</h3>
<form style="display: none;" id="bml-integration" method="post" action="https://ebanking.bankofmaldives.com.mv/bmlmpiuat/threed/MPI">
    <input type="hidden" name="Version" value="<?= $mpi->version ?>" />
    <input type="hidden" name="MerID" value="<?= $mpi->merchantId ?>" />
    <input type="hidden" name="AcqID" value="<?= $mpi->acquirerId ?>" />
    <input type="hidden" name="MerRespURL" value="<?= $mpi->merchantResponseUrl ?>" />
    <input type="hidden" name="PurchaseCurrency" value="<?= $mpi->purchaseCurrency ?>" />
    <input type="hidden" name="PurchaseCurrencyExponent" value="<?= $mpi->purchaseCurrencyExponent ?>" />
    <input type="hidden" name="OrderID" value="<?= $mpi->orderId ?>" />
    <input type="hidden" name="SignatureMethod" value="<?= $mpi->signatureMethod ?>" />
    <input type="hidden" name="transactionPassword" value="<?= $mpi->transactionPassword ?>" />
    <input type="hidden" name="PurchaseAmt" value="<?= $mpi->amount ?>" />
    <input type="hidden" name="Signature" value="<?= $mpi->requestSignature ?>" />
    <input type="submit" value="" />
</form>
<script>
    $(document).ready(function() {
        $('#bml-integration').submit();
    });
</script>