<?php

?>
<html>
<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
</head>
</html>
<!-- Latest compiled and minified CSS -->
<body>
<div class="container">
    <form class="form-horizontal" action='process.php' method="POST">
        <fieldset>
            <div id="legend">
                <legend class="">Buy Airtime</legend>
            </div>
            <div class="control-group">
                <!-- Username -->
                <label class="control-label"  for="username">Amount to be bought</label>
                <div class="controls">
                    <input type="text" id="amount" name="amount" placeholder="" class="input-xlarge">

                </div>
            </div>


            <div class="control-group">
                <!-- Password-->
                <label class="control-label" for="password">Phone number</label>
                <div class="controls">
                    <input type="text" id="password" name="phone_number" placeholder="" class="input-xlarge">

                </div>
            </div>



            <div class="control-group">
                <!-- Button -->
                <div class="controls">
                    <button class="btn btn-success">Buy Airtime </button>
                </div>
            </div>
        </fieldset>
    </form>
</div>

</body>