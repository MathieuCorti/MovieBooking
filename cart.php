<?php
session_start();

$seats = array(
    "SF" => "Standard (Adult)",
    "SP" => "Standard (Concession)",
    "SC" => "Standard (Child)",
    "FA" => "First Class (Adult)",
    "FC" => "First Class (Child)",
    "BA" => "Bean Bags (Adult)",
    "BF" => "Bean Bags (Family)",
    "BC" => "Bean Bags (Child)"
);

include_once("cartHelpers.php");

if(!empty($_GET["action"])) {
    switch($_GET["action"]) {
        case "add":
            addToCart($seats);
            break;
        case "remove":
           removeFromCart();
            break;
        case "empty":
            emptyCart();
            break;
    }
}
?>

<!DOCTYPE html>

<html lang="en">

<?php include 'header.php';?>

    <h1 style="text-align: center;">Cart</h1>

    <div id="shopping-cart">
        <?php
        if(isset($_SESSION["cart"])){
            $total = 0;
            ?>
            <table cellpadding="10" cellspacing="1" class="cart-table">
                <tbody>
                <tr>
                    <th style="text-align:left;"><strong>Movie</strong></th>
                    <th style="text-align:left;"><strong>Session</strong></th>
                    <th style="text-align:right;"><strong>Seat</strong></th>
                    <th style="text-align:right;"><strong>Quantity</strong></th>
                    <th style="text-align:right;"><strong>Price</strong></th>
                    <th style="text-align:center;"><strong>Action</strong></th>
                </tr>
                <?php
                foreach ($_SESSION["cart"] as $i => $item){
                    ?>
                    <tr>
                        <td style="text-align:left"><strong><?php echo $item["movie"]; ?></strong></td>
                        <td style="text-align:left;"><?php echo $item["session"]; ?></td>
                        <td style="text-align:right;"><?php echo $seats[$item["seat"]]; ?></td>
                        <td style="text-align:right;"><?php echo $item["quantity"]; ?></td>
                        <td style="text-align:right;"><?php echo $item["price"]."$"; ?></td>
                        <td style="text-align:center;"><a href="cart.php?action=remove&row=<?php echo $i;?>" class="btnRemoveAction">Remove Item</a></td>
                    </tr>
                    <?php
                    $total += ($item["price"] * $item["quantity"]);
                }
                ?>

                <tr>
                    <td colspan="5" align=right><strong>Total:</strong> <?php echo $total."$"; ?></td>
                </tr>
                </tbody>
            </table>
            <div>
                <a id="empty_button" href="cart.php?action=empty" class="button" style="width: 10%; text-align: center; float: left; margin-left: 3%;">Empty Cart</a>
                <a id="empty_button" href="book.php" class="button" style="width: 10%; text-align: center; float: right; margin-right: 3%; background: seagreen;">Book now</a>
            </div>
            <?php
        } else {
            echo '<h3 style="text-align: center;">Your Cart is empty.</h3>';
        }
        ?>
    </div>

<?php include 'footer.php';?>

</html>

<div style="display: none;">
    <?php include_once("/home/eh1/e54061/public_html/wp/debug.php"); ?>
</div>