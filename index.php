<!-- Php Session  -->
<?php
// Starting session
session_start();
?>

<!DOCTYPE html>

<html lang="en">

<?php include 'header.php';?>

<!-- Page Body -->
<body>

<!-- Main Page -->
		<main>

            <div class="card content" id="presentation">
                <div class="content_container">
                    <h3 class="card_title">Brand new screening room</h3>
                    <p class="card_txt">
                        After being closed a few months for renovation, the Silverado is proud to present its new infrastructures!<br>
                        This mythical room proposes a programming mainly in VOST and, most often, a preview before the public every week.
                    </p>
                </div>
            </div>

            <div class="card content" id="comfort">
                <div class="content_container">
                  <h3 class="card_title">Breathtaking sensations</h3>
                  <p class="card_txt">
                      The comfort of our air-conditioned rooms makes it possible to enjoy an exceptional moment and the brand new Dolby Sound system equipment renders remarkably the intensity of the projected films.
                  </p>
                </div>
            </div>

            <div class="card content" id="gourmet">
                <div class="content_container">
                  <h3 class="card_title">Peckish ?</h3>
                  <p class="card_txt">
                      In the gourmet space, enjoy crisp popcorn, good ice-cream, chocolate or a cool drink. Our confectionery shop offers you a wide choice of products, sweet or savoury, for all your little hungry!
                  </p>
                </div>
            </div>

            <div class="end"></div>

        </main>

	</body>

<?php include 'footer.php';?>

</html>

<div style="display: none;">
    <?php include_once("/home/eh1/e54061/public_html/wp/debug.php"); ?>
</div>
