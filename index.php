<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="En nuestra web podrá saber cuál será la próxima película de Marvel! Mantengase al tanto de nuestras actualizaciones. 😁">
    <title>🦸 | Próxima película de Marvel.</title>
    <link rel="stylesheet" href="./styles.css">
</head>
<body>
    <?php
        /* Preparamos la petición: */
        const API_URL = "https://whenisthenextmcufilm.com/api"; 
        $ch = curl_init(API_URL);
        /* Indicamos que queremos recibir el resultado de la petición y no mostrarla en pantalla: */
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        /* Ejecutamos la petición, y guardamos el JSON resultante en un array asociativo: */
        $result = curl_exec($ch);
        $data = json_decode($result, true); 
        /* Cerramos la conexión: */
        curl_close($ch);
    ?>
    <main>
        <section class="movie-img">
            <img src="<?= $data["poster_url"] ?>" alt="Póster de la próxima película de Marvel!" title="Póster de la próxima película de Marvel!" width="300">
        </section>
        <section class="movie-info">
            <h3><?= $data["title"] ?> se estrena en <?= $data["days_until"] ?> días.</h3>
            <p>Fecha de estreno: <?= $data["release_date"] ?></p>
        </section>
        <section class="next-movie">
            <p>La siguiente película será: <?= $data["following_production"]["title"] ?></p>
            <img src="<?= $data["following_production"]["poster_url"] ?>" alt="Póster de la siguiente película de Marvel!" title="Póster de la siguiente película de Marvel!" width="200">
        </section>
    </main>
</body>
</html>