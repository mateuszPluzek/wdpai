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
            <div class = "show-data">

            </div>
            <p>Surname</p>
            <div class = "show-data">

            </div>
        </div>
        <div class = "data">
            <p>Email</p>
            <div class = "show-data">

            </div>
        </div>
        <div class = "data">
            <form class = "change-name" action = "" type="POST">
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