    <?php
    header('Content-Type: application/json');

    $techo = $_POST['techo'];
    $lluvia = $_POST['lluvia'];
    $eficiencia = $_POST['eficiencia'] / 100;
    $tanque = $_POST['tanque'];
    $consumo = $_POST['consumo'];

    $agua_captada = $techo * ($lluvia / 1000) * $eficiencia * 1000;

    if ($agua_captada > $tanque) {
        $agua_captada = $tanque;
    }

    $dias_abastecimiento = floor($agua_captada / $consumo);

    $niveles_tanque = [];
    $nivel_actual = $agua_captada;
    for ($i = 0; $i < $dias_abastecimiento; $i++) {
        $niveles_tanque[] = $nivel_actual;
        $nivel_actual -= $consumo;
    }

    echo json_encode([
        "agua_captada" => round($agua_captada, 2),
        "dias_abastecimiento" => $dias_abastecimiento,
        "niveles_tanque" => $niveles_tanque
    ]);
    ?>
