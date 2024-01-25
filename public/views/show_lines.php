<!DOCTYPE html>
<head>
    <title>Train connections page</title>
    <link rel = "stylesheet" type = "text/css" href = "public/css/style.css">
    <link rel = "stylesheet" type = "text/css" href = "public/css/buttons.css">

</head>

<body>
    <div class = "container-connections">
        <div class = "top">
            <form class = "login" action ="" method="POST">
                <p>FROM</p>
                <select class = "stations" name = "code">
                    <?php foreach($favStations as $favStation) : ?>
                        <option value = "<?= $favStation->getCode() ;?>"> <?= $favStation->getName() ?> </option>
                    <?php endforeach; ?>
                    <option value = " " disabled>===============</option>
                    <?php foreach($stations as $station) : ?>
                        <option value = "<?= $station->getCode() ;?>"> <?= $station->getName() ?> </option>
                    <?php endforeach; ?>
                </select>
                <p>TO</p>
                <select class = "stations" name = "codeFinal">
                    <?php foreach($favStations as $favStation) : ?>
                        <option value = "<?= $favStation->getCode() ;?>"> <?= $favStation->getName() ?> </option>
                    <?php endforeach; ?>
                        <option value = " " disabled>===============</option>
                    <?php foreach($stations as $station) : ?>
                        <option value = "<?= $station->getCode() ;?>"> <?= $station->getName() ?> </option>
                    <?php endforeach; ?>
                </select>
                <input type = "time" name = "time" class = "input-field">
                <button class = "standard-button-blue" type = "submit">Show connections</button>
            </form>
        </div>

        <div class = "mid">

        </div>

        <div class = "bot">
            <a href ="/menu" class = "button-link-blue">Go back</a>
        </div>

    </div>
</body>