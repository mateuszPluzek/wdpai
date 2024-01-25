<!DOCTYPE html>
<head>
    <title>Main menu</title>
    <link rel = "stylesheet" type = "text/css" href = "public/css/style.css">
    <link rel = "stylesheet" type = "text/css" href = "public/css/buttons.css">

</head>

<body>
    <div class = "container-menu">
        <div class = "use-options">
            <a href = "/show_lines" class = "button-link-white">Search connection</a>
            <a href = "/show_station" class = "button-link-white">Search stations</a>
            <a href = "/show_fav_station" class = "button-link-white">Favorite stations</a>
        </div>
        
        <div class = "menu-options">
            <img src = "public/img/logo.svg">
            <div class = "menu-input-links">
                <a class = "button-link-white" href = "/my_data">My Data</a>
            </div>
            <form class = "menu-input" action ="logOut" method ="POST">
                <button class = "standard-button-blue">LOG OUT</button>
            </form>
        </div>
    </div>

</body>