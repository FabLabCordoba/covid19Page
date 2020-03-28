<?php
if (isset($_POST) && isset($_POST['provincia']) && isset($_POST['amount']) && isset($provincias[$_POST['provincia']])) {
    $key = $provincias[$_POST['provincia']];

    if(isset($_POST['custom_amount']) && is_numeric($_POST['custom_amount']))
        $_POST['amount'] = $_POST['custom_amount'];

    require 'vendor/autoload.php';

    // Agrega credenciales
    MercadoPago\SDK::setAccessToken($key);
    
    // Crea un objeto de preferencia
    $preference = new MercadoPago\Preference();
    
    // Crea un ítem en la preferencia
    $item = new MercadoPago\Item();
    $item->title = 'Donación para '.$_POST['provincia'];
    $item->quantity = 1;
    $item->unit_price = intval($_POST['amount']);
    $preference->items = array($item);
    $preference->save();

    // Redir. a MercadoPago
    header("Location: " . $preference->init_point);

}


?>
<div class="background-container">
    <form action="" method="POST" class="container">
        <div class="section">
            <div class="section--title">
                Elegí a que comunidad aportar:
                <span class="section--title--decorator"></span>
            </div>
            <div class="section--info">
                <select class="select-css" name="provincia">
                    <?php
                    foreach ($provincias as $provincia => $key) {
                        echo '<option value="'.$provincia.'">'.$provincia.'</option>';
                    }
                    ?>
                </select>
            </div>
        </div>
        <div class="section">
            <div class="section--title">
                Elegí cuanto aportar
                <span class="section--title--decorator"></span>
            </div>
            <div class="section--info">
                <div class="options">
                    <?php foreach ($montos as $monto) {
                    if (is_numeric($monto)) { ?>
                    <div class="option-radio">
                        <input type="radio" id="<?php echo $monto; ?>" name="amount" value="<?php echo intval($monto); ?>">
                        <label for="<?php echo $monto; ?>">$<?php echo $monto; ?></label><br>
                    </div>
                    <?php } else { ?>
                    <div class="option-radio">
                        <label for="custom">Otro:</label>
                        <input type="number" id="custom" name="custom_amount"><br>
                    </div>
                    <?php }} ?>
                </div>


            </div>
            <div class="section--button">
                <button class="button button_inverted">Donar</button>
            </div>
        </div>
    </form>
</div>