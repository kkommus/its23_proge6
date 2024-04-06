<?php
// Ühendame andmebaasiga
include("config.php");

// Kontrollime ühendust
if (!$yhendus) {
    die("Ei saa ühendust andmebaasiga");
}
?>

<!doctype html>
<html lang="et">
<head>
    <title>Drooniralli</title>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta
        name="viewport"
        content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />

    <!-- Bootstrap CSS v5.2.1 -->
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
        rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
        crossorigin="anonymous"
    />
</head>

<body>

<div class="container">
    <h1>Drooniralli</h1>
	<br>

    <h2>Esimesed 10 Võistlejat</h2>
	<br>
    <div class="row row-cols-1 row-cols-md-3 g-4">
        <?php
        // Kuvame ainult esimesed kümme võistlejat
        $paring = "SELECT * FROM drooniralli LIMIT 10";
        $valjund = mysqli_query($yhendus, $paring);
        while($rida = mysqli_fetch_assoc($valjund)) {
            print_r('<div class="col">
                <div class="card">
                  <div class="card-body">
                    <h5 class="card-title">'.$rida['nimi'].'</h5>
                    <p class="card-text">Linn: '.$rida['asukoht'].'<br>Mudel: '.$rida['mudel'].'<br>Aeg: '.$rida['aeg'].'</p>
                  </div>
                </div>
              </div>');
        }
        ?>
    </div>
	<br>

    <h2>Võistlejad Haapsalust mudeliga "Model 500"</h2>
	<br>
    <div class="row row-cols-1 row-cols-md-3 g-4">
        <?php
        // Kuvame võistlejad Haapsalust mudeliga "Model 500" ja sorteerime tulemused aja järgi
        $paring_haapsalu = "SELECT * FROM drooniralli WHERE asukoht = 'Haapsalu' AND mudel = 'Model 500' ORDER BY aeg";
        $valjund_haapsalu = mysqli_query($yhendus, $paring_haapsalu);
        while($rida_haapsalu = mysqli_fetch_assoc($valjund_haapsalu)) {
            print_r('<div class="col">
                <div class="card">
                  <div class="card-body">
                    <h5 class="card-title">'.$rida_haapsalu['nimi'].'</h5>
                    <p class="card-text">Linn: '.$rida_haapsalu['asukoht'].'<br>Mudel: '.$rida_haapsalu['mudel'].'<br>Aeg: '.$rida_haapsalu['aeg'].'</p>
                  </div>
                </div>
              </div>');
        }
        ?>
    </div>
	<br>

    <h2>Võistluste arv igas klassis</h2>
	<br>
    <div class="row row-cols-1 row-cols-md-3 g-4">
        <?php
        // Kuvame võistluste arvu igas mudelis
        $paring_voistlused = "SELECT mudel, COUNT(*) AS voistlused FROM drooniralli GROUP BY mudel";
        $valjund_voistlused = mysqli_query($yhendus, $paring_voistlused);
        while($rida_voistlused = mysqli_fetch_assoc($valjund_voistlused)) {
            print_r('<div class="col">
                <div class="card">
                  <div class="card-body">
                    <h5 class="card-title">Klass: '.$rida_voistlused['mudel'].'</h5>
                    <p class="card-text">Võistluste arv: '.$rida_voistlused['voistlused'].'</p>
                  </div>
                </div>
              </div>');
        }
        ?>
    </div>
	<br>

    <h2>Auhinnatud Võistlejad</h2>
	<br>
    <div class="row">
        <?php
        // Loosime 3 võistlejat, kes saavad auhinna
        $paring_auhinnatud = "SELECT nimi FROM drooniralli ORDER BY RAND() LIMIT 3";
        $valjund_auhinnatud = mysqli_query($yhendus, $paring_auhinnatud);
        $i = 1;
        while($rida_auhinnatud = mysqli_fetch_assoc($valjund_auhinnatud)) {
            print_r('<div class="col">
                <div class="card">
                  <div class="card-body">
                    <h5 class="card-title">'.$i.'. koht</h5>
                    <p class="card-text">'.$rida_auhinnatud['nimi'].'</p>
                  </div>
                </div>
              </div>');
            $i++;
        }
        ?>
    </div>
</div>
<!-- Bootstrap JavaScript Libraries -->
<script
    src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
    integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
    crossorigin="anonymous"
></script>

<script
    src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
    integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+"
    crossorigin="anonymous"
></script>
</body>
</html>
