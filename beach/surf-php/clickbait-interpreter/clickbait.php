<?php
    define("TITLE", "Honest Click Bait Headlines");
    include("functions.php");

    if( isset( $_POST["fix_submit"])) {
        // call the function
        checkForClickBait();
    }
?>

<!DOCTYPE html>

<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <title><?php echo TITLE; ?></title>
        
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="css/bootstrap.css">
        
        
        
    </head>
    <body>
        <div class="container">
            <h1><?php echo TITLE; ?></h1>
            <p class="lead">Hate click bait? Turn those annoying headlines into realistic and host ones using this simple program.</p>
            
            <div class="row">
                <form class="col-sm-8 col-sm-offset-2" action="" method="post">
                    <textarea placeholder="Paste click bait headline here" class="form-control input-lg" name="clickbait_headline"></textarea>
                    <br/>
                    <button type="submit" class="btn btn-primary btn-lg pull-right" name="fix_submit">Make Honest</button>
                </form> 
            </div>
            
            <?php 
                if ( isset($_POST["fix_submit"]) ) {
                    // get first value in array returned by checkForClickBait() function
                    // store it in a variable
                    $clickBait = checkForClickBait()[0];
                    
                    // get second value in array returned by checkForClickBait() function
                    // store it in a variable
                    $honestHeadline = checkForClickBait()[1];
                    
                    // call function
                    // pass two arguments in the function
                    displayHonestHeadline($clickBait, $honestHeadline);
                }
            
            ?>
        </div>
        
        
        <script src="js/bootstrap.js"> </script>
    </body>
        
</html>