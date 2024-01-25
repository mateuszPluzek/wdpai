<!DOCTYPE html>
<head>
    <title>Admin panel page</title>
    <link rel = "stylesheet" type = "text/css" href = "public/css/style.css">
    <link rel = "stylesheet" type = "text/css" href = "public/css/buttons.css">
</head>

<body>
    <div class = "container-admin">

        <div class = "corner" id = "top-left">
            <form class = "station-add" action ="addStation" method="POST">
                <input class = "input-field" name = "stationName" type = "text" placeholder="station name">
                <input class = "input-field" name = "stationCode" type = "text" placeholder="station code">
                <button class="standard-button-blue" type="submit">Add</button>
            </form>
            <form class = "station-del" action ="delStation" method="POST">
                <select class = "stations" name = "code">
                    <?php foreach($stations as $station) : ?>
                        <option value = "<?= $station->getCode();?>"> <?= $station->getName() ?> </option>
                    <?php endforeach; ?>
                </select>
                <button class = "standard-button-blue" type = "submit">Delete</button>
            </form>
            <a href ="/menu" class = "button-link-blue" id = "go-back">Go back</a>
        </div>

        <div class = 'corner' id = 'top-right'>
            <form class = "route-add" action = "addRoute" method="POST">
                <input class = "input-field" name = "routeCode" type = "text" placeholder="route code">
                <select class = "stations" name = "number">
                    <?php foreach($trains as $train) : ?>
                        <option value = "<?= $train->getNumber();?>"> <?= $train->getName()."-".$train->getNumber() ?> </option>
                    <?php endforeach; ?>
                </select>
                <button class = "standard-button-blue" type = "submit">Add</button>
            </form>
            <form class = "route-del" action ="delRoute" method="POST">
                <select class = "stations" name = "routeCode">
                    <?php foreach($routes as $route) : ?>
                        <option value = "<?= $route->getCode();?>"> <?= $route->getCode() ?> </option>
                    <?php endforeach; ?>
                </select>
                <button class = "standard-button-blue" type = "submit">Delete</button>
            </form>
        </div>

        <div class = 'corner' id = 'bot-left'>
            <form class = "route-station-add" action ="addStationRoute" method="POST">
                <select class = "stations" name = "code">
                    <?php foreach($stations as $station) : ?>
                        <option value = "<?= $station->getCode();?>"> <?= $station->getName() ?> </option>
                    <?php endforeach; ?>
                </select>
                <select class = "stations" name = "codeNext">
                    <?php foreach($stations as $station) : ?>
                        <option value = "<?= $station->getCode();?>"> <?= $station->getName() ?> </option>
                    <?php endforeach; ?>
                </select>
                <select class = "stations" name = "routeCode">
                    <?php foreach($routes as $route) : ?>
                        <option value = "<?= $route->getCode();?>"> <?= $route->getCode() ?> </option>
                    <?php endforeach; ?>
                </select>
                <input class = "input-field" name = "order" type = "number" placeholder="station order">
                <input class = "input-field" name = "arr" type = "time" placeholder="arrival">
                <input class = "input-field" name = "dep" type = "time" placeholder="departure">
                <button class = "standard-button-blue" type = "submit">Add</button>
            </form>
        </div>

        <div class = 'corner' id = 'bot-right'>
            <form class = "train-add" action = "addTrain" method="POST">
                <input class = "input-field" name = "trainName" type = "text" placeholder="train name">
                <input class = "input-field" name = "trainNumber" type = "number" placeholder="train number">
                <select class = "stations" name = "operator_id">
                    <?php foreach($operators as $operator) : ?>
                        <option value = "<?= $operator->getIdOperator();?>"> <?= $operator->getName() ?> </option>
                    <?php endforeach; ?>
                </select>
                <button class = "standard-button-blue" type = "submit">Add</button>
            </form>
            <form class = "train-del" action = "delTrain" method="POST">
                <select class = "stations" name = "number">
                    <?php foreach($trains as $train) : ?>
                        <option value = "<?= $train->getNumber();?>"> <?= $train->getName()."-".$train->getNumber() ?> </option>
                    <?php endforeach; ?>
                </select>
                <button class = "standard-button-blue" type = "submit">Delete</button>
            </form>
        </div>

    </div>
</body>