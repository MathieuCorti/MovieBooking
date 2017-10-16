<?php
session_start();

file_put_contents("order_".getdate().".txt", print_r($_SESSION["cart"], true));
?>

<!DOCTYPE html>

<html lang="en">

<div id="shopping-cart">
    <?php
    if(isset($_SESSION["cart"])){
        $total = 0;
        ?>
        <p>Name : <?php echo $_GET["name"]; ?></p>
        <p>Email : <?php echo $_GET["email"]; ?></p>
        <p>Phone : <?php echo $_GET["phone"]; ?></p>
        <table cellpadding="10" cellspacing="1" class="cart-table">
            <tbody>
            <tr>
                <th style="text-align:left;"><strong>Movie</strong></th>
                <th style="text-align:left;"><strong>Session</strong></th>
                <th style="text-align:right;"><strong>Seat</strong></th>
                <th style="text-align:right;"><strong>Quantity</strong></th>
                <th style="text-align:right;"><strong>Price</strong></th>
            </tr>
            <?php
            foreach ($_SESSION["cart"] as $i => $item){
                ?>
                <tr>
                    <td style="text-align:left"><strong><?php echo $item["movie"]; ?></strong></td>
                    <td style="text-align:left;"><?php echo $item["session"]; ?></td>
                    <td style="text-align:right;"><?php echo $item["seat"]; ?></td>
                    <td style="text-align:right;"><?php echo $item["quantity"]; ?></td>
                    <td style="text-align:right;"><?php echo $item["price"]."$"; ?></td>
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
        <?php
    }
    ?>
</div>

<div style="display: none;">
    <?php include_once("/home/eh1/e54061/public_html/wp/debug.php"); ?>
</div>

