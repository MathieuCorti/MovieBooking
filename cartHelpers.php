<?php

function updateIfAlreadyInCart($seat) {
    foreach ($_SESSION["cart"] as $i => $cartItem) {
        if ($cartItem["movie"] == $_POST["movie"] &&
            $cartItem["session"] == $_POST["session"] &&
            $cartItem["seat"] == $seat &&
            $cartItem["price"] == $_POST[$seat . "_inner"]) {

            echo '<script>console.log("PHP Already in cart, updating quantity")</script>';
            $_SESSION["cart"][$i]["quantity"] += $_POST[$seat];
            return true;
        }
    }
    echo '<script>console.log("PHP Not already in cart, adding.")</script>';
    return false;
}

function removeFromCart() {
    foreach($_SESSION["cart"] as $k => $v) {
        if($_GET["row"] == $k) {
            unset($_SESSION["cart"][$k]);
        }
        if(empty($_SESSION["cart"])) {
            unset($_SESSION["cart"]);
        }
    }
}

function emptyCart() {
    unset($_SESSION["cart"]);
}

function addToCart($seats) {
    $items = array();

    // Get all items to add
    foreach ($seats as $seat => $printableSeat) {
        if (isset($_POST[$seat]) && (int)$_POST[$seat] > 0) {
            if (!updateIfAlreadyInCart($seat)) {
                $currentItem = array(
                    "movie"     => $_POST["movie"],
                    "session"   => $_POST["session"],
                    "seat"      => $seat,
                    "quantity"  => $_POST[$seat],
                    "price"     => $_POST[$seat . "_inner"]
                );
                array_push($items, $currentItem);
            }
        }
    }

    // Save them to the session
    if(!empty($_SESSION["cart"])) {
        $_SESSION["cart"] = array_merge($_SESSION["cart"], $items);
    } else {
        $_SESSION["cart"] = $items;
    }
}