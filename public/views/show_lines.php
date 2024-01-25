<!DOCTYPE html>
<head>
    <title>Train connections page</title>
    <link rel = "stylesheet" type = "text/css" href = "public/css/style.css">
    <link rel = "stylesheet" type = "text/css" href = "public/css/buttons.css">

</head>

<body>
    <div class = "container-connections">
        <div class = "top">
            <form class = "login" action ="showConnections" method="POST">
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
                <button class = "standard-button-blue" type = "submit">Show connections</button>
            </form>
        </div>


        <div class = "mid">
            <?php if(isset($routesStart)) for($i = 0; $i < count($routesStart); $i++) :?>
            <?php
                if($distances[$i] < 0)
                    continue;
                $word = $distances[$i] == 1 ? " stacja" : " stacji";
            ?>
            <div class = "train-info">
                <b><p><?= $stationNames[0]; ?> <?= $routesStart[$i]->getDepartureTime() ?></p></b>
                <p><?= $distances[$i].$word?> <?= $trains[$i]->getName()."-".$trains[$i]->getNumber()?> <?= $operators[$i]->getName()?></p>
                <b><p><?= $stationNames[1]; ?> <?= $routesEnd[$i]->getDepartureTime() ?></p></b>
            </div>
            <?php endfor; ?>
        </div>

        <div class = "bot">
            <a href ="/menu" class = "button-link-blue">Go back</a>
        </div>

    </div>
</body>