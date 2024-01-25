<!DOCTYPE html>
<head>
    <title>Favourite stations page</title>
    <link rel = "stylesheet" type = "text/css" href = "public/css/style.css">
    <link rel = "stylesheet" type = "text/css" href = "public/css/buttons.css">

</head>

<body>
<div class = "container-stations">
    <div class = "logo">
        <h1>Stations</h1>
    </div>

    <div class = "stations-container">
        <form class = "stations-select" action="addFavouriteStation" method = "POST">
            <select class = "stations" name = "code">
                <?php foreach($stations as $station) : ?>
                    <option value = "<?= $station->getCode().'|'.$station->getName() ;?>"> <?= $station->getName() ?> </option>
                <?php endforeach; ?>
            </select>
            <button class = "standard-button-blue" type = "submit">Add to favourites</button>
        </form>
    </div>

    <div class = "go-back-container">
        <a href ="/menu" class = "button-link-blue">Go back</a>
        <p>
            <?php
                if(isset($messages)) {
                    foreach($messages as $message) {
                        echo $message;
                    }
                }
            ?>
        </p>
    </div>
</div>
</body>