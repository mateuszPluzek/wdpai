<!DOCTYPE html>
<head>
    <title>My Data page</title>
    <link rel = "stylesheet" type = "text/css" href = "../../public/css/style.css">
    <link rel = "stylesheet" type = "text/css" href = "../../public/css/buttons.css">

</head>

<body>
    <div class = "container-my-data">

        <div class = "data">
            <p>Name</p>
            <p class = "show-data">
                <?php
                    if(isset($user_data)) {
                        echo $user_data[0];
                    }
                ?>
            </p>
            <p>Surname</p>
            <p class = "show-data">
                <?php
                    if(isset($user_data)) {
                    echo $user_data[1];
                    }
                ?>
            </p>
        </div>
        <div class = "data">
            <p>Email</p>
            <p class = "show-data">
                <?php
                    if(isset($user_data)) {
                    echo $user_data[2];
                    }
                ?>
            </p>
        </div>
        <div class = "data">
            <form class = "change-name" action = "alterUser" method="POST">
                <input class = "input-field", type = "text", name = "newName", placeholder = "new name">
                <input class = "input-field", type = "text", name = "newSurname", placeholder="new surname">
                <button type="submit" class = "standard-button-blue">SUBMIT</button>
            </form>
        </div>
        <div class = "data">
            <a href ="/menu" class = "button-link-blue">Go back</a>
        </div>
    </div>
</body>