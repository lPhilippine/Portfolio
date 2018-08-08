


<?php
/* Set e-mail recipient */
$myemail = "philippine_l@live.fr";

/* Check all form inputs using check_input function */
$name = check_input($_POST['inputName'], "Votre Prenom");
$email = check_input($_POST['inputEmail'], "Votre adresse E-mail");
$subject = check_input($_POST['inputSubject'], "Le sujet du message");
$message = check_input($_POST['inputMessage'], "Votre message");

/* If e-mail is not valid show error message */
if (!preg_match("/([\w\-]+\@[\w\-]+\.[\w\-]+)/", $email)) {
    show_error("Adresse E-mail invalide");
}
/* Let's prepare the message for the e-mail */

$subject = "Someone has sent you a message";

$message = "

Someone has sent you a message using your contac form:

Name: $name
Email: $email
Subject: $subject

Message:
$message

";

/* Send the message using mail() function */
mail($myemail, $subject, $message);

/* Redirect visitor to the thank you page */
header('Location: index.php');

exit();

/* Functions we used */

function check_input($data, $problem = '') {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    if ($problem && strlen($data) == 0) {
        show_error($problem);
    }
    return $data;
}

function show_error($myError) {
    ?>
    <html>
        <head>
            
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">
        
        <link rel="shortcut icon" type="image/x-icon" href="favicon.ico" />
        <title>Portfolio de Philippine Loiseau : Développeuse Informatique</title>

        <!-- Bootstrap Core CSS -->
        <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">

        <!-- Custom Fonts -->
        <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
        <link href='https://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css" type="text/css">

        <!-- Plugin CSS -->
        <link rel="stylesheet" href="css/magnific-popup.css" type="text/css">

        <!-- Custom CSS -->
        <link rel="stylesheet" href="css/creative.css" type="text/css">

        <link rel="stylesheet" href="css/circle.css">
        <link rel="stylesheet" href="css/timeline.css">

            
        </head>
        
        <body>
            
            <section>
            <div class="header-content">
            <div class="alert alert-danger text-center header-content" style="margin:0 auto; width:500px">
                <strong>Erreur !</strong> <br>
                Veuillez fournir des informations exact : <br>
            <strong><?php echo $myError; ?></strong>
            <br>
            <br>
       <a href="index.php"><button type="button" class="btn btn-primary btn-lg text-center">Revenir au formulaire de contact</button></a>
            
            </div>
            </div>
            </section>
        </body>
    </html>
    
    
    <?php
    exit();
}
?>