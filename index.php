<!-- <HTML>
    <HEAD>
        <title>Wdpai</title>
        <meta charset = "UTF-8">
        <meta name = "keywords" content = "PHP, HTML, Docker">
        <meta name = "description" content = "Wdpai project">
        <meta name = "author" content = "Mateusz Płużek">

    </HEAD>

    <BODY> -->
        <?php
            require "Routing.php";

            $path = trim($_SERVER['REQUEST_URI'], '/');
            $path = parse_url($path, PHP_URL_PATH);

            Routing::get('index', 'DefaultController');
            Routing::get('menu', 'DefaultController');
            
            Routing::run($path);
            
        ?>
    <!-- </BODY>

</HTML> -->

