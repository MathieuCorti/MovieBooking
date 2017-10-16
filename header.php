<?php
echo '<!-- Page Head -->
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="style.css">

        <!-- Add font families -->
        <link href="https://fonts.googleapis.com/css?family=Anton|Roboto" rel="stylesheet">
    </head>

<!-- Page Header -->
    <header>
        <div>
            <img src="res/icon.png" alt="Silverado" style="width:100px;height:100px;float:left;margin:10px;">
            <h1>Silverado</h1>
        </div>
        <h2>Finally all your movies at affordable prices!</h2>
    </header>

<!-- Nav Bar-->
        <nav>
            <ul class="topnav">';

if ($_SERVER['PHP_SELF'] == "/index.php") {
    echo '<li><a class="active" href="index.php">Home</a></li>
          <li><a href="showing.php">Now Showing</a></li>
          <li><a href="cart.php">Cart</a></li>
          <li><a href="#">About</a></li>';
} else if ($_SERVER['PHP_SELF'] == "/showing.php") {
    echo '<li><a href="index.php">Home</a></li>
          <li><a class="active" href="showing.php">Now Showing</a></li>
          <li><a href="cart.php">Cart</a></li>
          <li><a href="#">About</a></li>';
} else if ($_SERVER['PHP_SELF'] == "/cart.php") {
    echo '<li><a href="index.php">Home</a></li>
          <li><a href="showing.php">Now Showing</a></li>
          <li><a class="active" href="cart.php">Cart</a></li>
          <li><a href="#">About</a></li>';
} else {
    echo '<li><a href="index.php">Home</a></li>
          <li><a href="showing.php">Now Showing</a></li>
          <li><a href="cart.php">Cart</a></li>
          <li><a href="#">About</a></li>';
}
echo '</ul></nav>';

