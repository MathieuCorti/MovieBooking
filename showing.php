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

<div class="card content" id="presentation">
    <div class="content_container">
        <h3 class="card_title">Seats and prices</h3>
        <div class="card_txt">
            <p>
                We currently offer three types of seats :
            </p>

            <ul>
                <li>Standard</li>
                <li>First Class</li>
                <li>Bean Bags</li>
            </ul>

            <p>
                Here is a list of our prices :
            </p>

            <img src="res/prices.png" alt="Prices" style="width:60%;">

        </div>
    </div>
</div>

<!-- Here's what our last "developer" left us, hope it helps! <i>- Silverado crew -->
<!-- Starting form code sourced and adapted from https://titan.csit.rmit.edu.au/~e54061/wp/silverado-test.php -->
<form id="booking_form" method="post" action="cart.php?action=add">

    <fieldset>
        <legend>Booking Form</legend>

        <p>
            <label>Movie</label>
            <select id="movies" id="movie" name="movie">
            </select>

        </p>

        <p>
            <label>Session</label>
            <select class="sessions" id="session" name="session">

            </select>
        </p>

        <!-- SEATS -->
        <fieldset>
            <legend>Seats</legend>

            <!-- STANDARDS -->
            <fieldset>
                <legend>Standard</legend>

                <p>
                    <label>Adult - <span id="SF_price"></span>$</label>
                    <input type="hidden" value="" name="SF_inner" id="SF_inner"/>
                    <select class="numbers" id="SF" name="SF"></select>
                </p>

                <p>
                    <label>Concession - <span id="SP_price"></span>$</label>
                    <input type="hidden" value="" name="SP_inner" id="SP_inner"/>
                    <select class="numbers" id="SP" name="SP"></select>
                </p>

                <p>
                    <label>Child - <span id="SC_price"></span>$</label>
                    <input type="hidden" value="" name="SC_inner" id="SC_inner"/>
                    <select class="numbers" id="SC" name="SC"></select>
                </p>
            </fieldset>

            <!-- FIRST CLASS -->
            <fieldset>
                <legend>First Class</legend>

                <p>
                    <label>Adult - <span id="FA_price"></span>$</label>
                    <input type="hidden" value="" name="FA_inner" id="FA_inner"/>
                    <select class="numbers" id="FA" name="FA"></select>
                </p>

                <p>
                    <label>Child - <span id="FC_price"></span>$</label>
                    <input type="hidden" value="" name="FC_inner" id="FC_inner"/>
                    <select class="numbers" id="FC" name="FC"></select>
                </p>
            </fieldset>

            <!-- BEAN BAGS -->
            <fieldset>
                <legend>Bean Bags</legend>

                <p>
                    <label>Adult - <span id="BA_price"></span>$</label>
                    <input type="hidden" value="" name="BA_inner" id="BA_inner"/>
                    <select class="numbers" id="BA" name="BA"></select>
                </p>

                <p>
                    <label>Family - <span id="BF_price"></span>$</label>
                    <input type="hidden" value="" name="BF_inner" id="BF_inner"/>
                    <select class="numbers" id="BF" name="BF"></select>
                </p>

                <p>
                    <label>Child - <span id="BC_price"></span>$</label>
                    <input type="hidden" value="" name="BC_inner" id="BC_inner"/>
                    <select class="numbers" id="BC" name="BC"></select>
                </p>
            </fieldset>

        </fieldset>

        <p>
            <input type="submit" value="Add to cart" class="button"/>
        </p>

    </fieldset>
</form>
<!-- End of Starting form code -->

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script>

    var mPrices = {
        "cheap": {
            "SF":12.5,
            "SP":10.5,
            "SC":8.5,
            "FA":25,
            "FC":20,
            "BA":22,
            "BF":20,
            "BC":20
        },
        "expensive": {
            "SF":18.5,
            "SP":15.5,
            "SC":12.5,
            "FA":30,
            "FC":25,
            "BA":33,
            "BF":30,
            "BC":30
        }
    };

    var mSessions = {

        "Inside Out": {
            "Monday - 1pm":"cheap",
            "Tuesday - 1pm":"cheap",
            "Wednesday - 6pm":"expensive",
            "Thursday - 6pm":"expensive",
            "Friday - 6pm":"expensive",
            "Saturday - 12pm":"expensive",
            "Sunday - 12pm":"expensive"
        },
        "Intouchables": {
            "Monday - 6pm":"cheap",
            "Tuesday - 6pm":"cheap",
            "Saturday - 3pm":"expensive",
            "Sunday - 3pm":"expensive"
        },
        "Valentine's day": {
            "Monday - 9pm":"cheap",
            "Tuesday - 9pm":"cheap",
            "Wednesday - 1pm":"cheap",
            "Thursday - 1pm":"cheap",
            "Friday - 1pm":"cheap",
            "Saturday - 6pm":"expensive",
            "Sunday - 6pm":"expensive"
        },
        "Kingsman": {
            "Wednesday - 9pm":"expensive",
            "Thursday - 9pm":"expensive",
            "Friday - 9pm":"expensive",
            "Saturday - 9pm":"expensive"
        }
    };

    function fillSessions() {
        var selectedMovie = $("#movies").val();
        var selectedSessions = $(".sessions");
        selectedSessions.empty();

        // Add sessions
        var movie = mSessions[selectedMovie];
        for (var session in movie) {
            if (movie.hasOwnProperty(session)) {
                selectedSessions.append($('<option></option>').val(session).html(session));
            }
        }
        setPrices();
    }

    function setPrices() {
        var selectedMovie   = $("#movies").val();
        var selectedSession = $("#session").val();
        var currPriceType   = mSessions[selectedMovie][selectedSession];

        // Add prices
        for (var price in mPrices[currPriceType]) {
            if (mPrices[currPriceType].hasOwnProperty(price)) {
                var seatType = price + "_price";
                var inner = document.getElementById(price + "_inner");
                document.getElementById(seatType).innerHTML = mPrices[currPriceType][price];
                inner.innerHTML =  mPrices[currPriceType][price];
                inner.value =  mPrices[currPriceType][price];

            }
        }
    }

    $('#movies').change(function () {
        fillSessions();
    });

    $('#session').change(function () {
        setPrices();
    });

    $(document).ready(function () {

        // Add numbers
        var selectNumbers = $(".numbers");
        for (i = 0; i <= 10; i++) {
            selectNumbers.append($('<option></option>').val(i).html(i));
        }

        var selectedMovies = $("#movies");
        var movies = [
            "Inside Out",
            "Intouchables",
            "Valentine's day",
            "Kingsman"
        ];

        for (i = 0; i < movies.length; ++i) {
            selectedMovies.append($('<option></option>').val(movies[i]).html(movies[i]));
        }

        fillSessions();

    });

</script>

</body>

<?php include 'footer.php';?>

</html>

<div style="display: none;">
    <?php include_once("/home/eh1/e54061/public_html/wp/debug.php"); ?>
</div>