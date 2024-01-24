<!DOCTYPE html>
<head>
    <title>Register page</title>
    <link rel = "stylesheet" type = "text/css" href = "public/css/style.css">
    <link rel = "stylesheet" type = "text/css" href = "public/css/buttons.css">

</head>

<body>
<div class = "container">

    <div class = "logo">
        <h1>Register</h1>
    </div>

    <div class = "register-container">
        <form class = "login" action="register" method="POST" >
            <input name = "email" type = "text" placeholder = "email" class = "input-field">
            <input name = "password" type = "password" placeholder = "password" class = "input-field">
            <input name = "password_repeat" type = "password" placeholder = "repeat password" class = "input-field">
            <input name = "name" type = "text" placeholder = "name" class = "input-field">
            <input name = "surname" type = "text" placeholder = "username" class = "input-field">
            <button class = "standard-button-blue" type = "submit">SIGN UP</button>
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