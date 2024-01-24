<!DOCTYPE html>
<head>
    <title>Login page</title>
    <link rel = "stylesheet" type = "text/css" href = "public/css/style.css">
    <link rel = "stylesheet" type = "text/css" href = "public/css/buttons.css">

</head>

<body>
    <div class = "container">

        <div class = "logo">
            <img src = "public/img/logo.svg">
            <h1>Rail finder</h1>
        </div>

        <div class = "login-container">
            <form class = "login" action="loginUser" method="POST" >
                <input name = "email" type = "text" placeholder = "email" class = "input-field">
                <input name = "password" type = "password" placeholder = "password" class = "input-field">
                <button class = "standard-button-blue" type = "submit" >CONTINUE</button>
                <a href = "/register" class = "sign-in">CREATE AN ACCOUNT</a>
                <div class = "error-login">
                    <?php
                        if(isset($messages)) {
                            foreach($messages as $message) {
                                echo $message;
                            }
                        }
                    ?>
                </div>
            </form>
        </div>

    </div>


</body>