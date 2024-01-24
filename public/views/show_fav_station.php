<!DOCTYPE html>
<head>
    <title>Favourite stations page</title>
    <link rel = "stylesheet" type = "text/css" href = "public/css/style.css">
    <link rel = "stylesheet" type = "text/css" href = "public/css/buttons.css">

</head>

<body>
    <div class = "container">
        <div class = "logo">
            <h1>Favourite stations</h1>
        </div>

        <div class = "stations-container">
            <form class = "stations-select" action="addFavouriteStation">
                <select class = "stations">
                    <?php foreach($favStations as $favStation) : ?>
                        <option value = "<?= $favStation->getIdStation();?>"> <?= $favStation->getName() ?> </option>
                    <?php endforeach; ?>
                </select>
                <button class = button-link-blue type = "submit">Remove from favourites</button>
            </form>
        </div>

        <div class = "go-back-container">
            <a href ="/menu" class = "button-link-blue">Go back</a>
        </div>
    </div>
</body>