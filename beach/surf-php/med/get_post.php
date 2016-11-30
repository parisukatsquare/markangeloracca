<?php
    define("TITLE", "GET &amp; POST");

    $nameError = "";
    $emailError = "";

    if( isset( $_POST['post_submit'] ) ) {

        $name = $_POST['post_name'];
        $email = $_POST['post_email'];
        
        // build a function that validates data
        function validateFormData( $formData ) {
            $formData = trim( stripslashes( htmlspecialchars( $formData )));
            return $formData;
        }
        
        // check to see if inputs are empty
        // create variables with form data
        // wrap the data with our function
        echo "what's up?";
        if( !$_POST['post_name'] ) {
            $nameError = "Please enter your name <br>";
        } else {
            $name = validateFormData( $_POST['post_name']);
        }
        
        if( !$_POST['post_email']) {
            $emailError = "Please enter your email <br>";
        } else {
            $email = validateFormData( $_POST['post_email']);
        }
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
        
        
        <script src="js/jquery.js"> </script>
    </head>
    <body>
        <div class="container">
            <h1><?php echo TITLE; ?></h1>
            
            <h4>Submitted via $_GET</h4>
            <form action="form_get.php" method="get">
                <input type="text" placeholder="Name" name="name">
                <input type="text" placeholder="Email" name="email">
                <input type="submit" name="form_submit">
            </form>
            
            <hr>
            <h4>Submitted via $_POST</h4>
            <form action="form_post.php" method="post">
                <input type="text" placeholder="Name" name="post_name">
                <input type="text" placeholder="Email" name="post_email">
                <input type="submit" name="form_submit">
            </form>
            
             <hr>
            <h4>Submitted to current page</h4>
            <p class="text-danger"> * Required fields</p>
            <form method="post" 
                  action="<?php echo htmlspecialchars( $_SERVER['PHP_SELF']); ?>" >
                
                <small class="text-danger">* <?php echo $nameError; ?></small>
                <input type="text" placeholder="Name" name="post_name"><br><br>
                <small class="text-danger">* <?php echo $emailError; ?></small>
                <input type="text" placeholder="Email" name="post_email"><br><br>
                
                <input type="submit" name="post_submit">
            </form>
            
            <?php
            
                if( isset($_POST['post_submit']) ) {
                    echo "<h4>Your info</h4>";
                    echo "Name: $name <br> Email: $email <br>";
                }
            
            ?>
            
      
            
        </div>
        
        <!-- Bootstrap JS -->
        <script src="js/bootstrap.js"> </script>
    </body>
        
</html>