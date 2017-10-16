<?php
session_start();
?>

<!DOCTYPE html>

<html lang="en">

<?php include 'header.php';?>

<h1 style="text-align: center;">Finish your booking</h1>

<script>

    function validateForm() {
        var nameRegex   = /^(?:[A-z]|\s)+$/;
        var phoneRegex  = /04[\d]{8}/;

        if (!nameRegex.test(document.getElementById("name").value)) {
            alert("Please enter a valid name.");
            return false;
        } else if (!phoneRegex.test(document.getElementById("phone").value)) {
            alert("Please enter a valid australian phone number.");
            return false;
        }
        return true;
    }

</script>

<form action="/ticket.php" onsubmit="return validateForm();" style="margin-top: 3%;">
    Full Name:<br>
    <input type="text" name="name" id="name" required>
    <br>
    <br>
    Email:<br>
    <input type="email" name="email" id="email" required>
    <br>
    <br>
    Phone number:<br>
    <input type="tel" name="phone" id="phone" required>
    <br>
    <br>
    <input type="submit" value="Finish booking" class="button">
</form>

<?php include 'footer.php';?>

</html>

<div style="display: none;">
    <?php include_once("/home/eh1/e54061/public_html/wp/debug.php"); ?>
</div>