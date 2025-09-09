<?php
include('header.php');

$dataNascimento = DateTime::createFromFormat('Y-m-d', $_POST['data_nascimento']);

if (!$dataNascimento) {
    echo "<p>Data de nascimento inválida.</p><a href='index.php'>Voltar</a>";
    exit;
}

$listaSignos = simplexml_load_file('signos.xml');

function pertenceAoIntervalo($data, $inicio, $fim)
{
    $anoAtual = $data->format('Y');
    $inicioFormatado = DateTime::createFromFormat('d/m/Y', "$inicio/$anoAtual");
    $fimFormatado = DateTime::createFromFormat('d/m/Y', "$fim/$anoAtual");

    if ($inicioFormatado > $fimFormatado) {
        if ($data->format('m') == "01") {
            $inicioFormatado->modify('-1 year');
        } else {
            $fimFormatado->modify('+1 year');
        }
    }

    return ($data >= $inicioFormatado && $data <= $fimFormatado);
}

$signoAtual = null;

foreach ($listaSignos as $itemSigno) {
    if (pertenceAoIntervalo($dataNascimento, $itemSigno->dataInicio, $itemSigno->dataFim)) {
        $signoAtual = $itemSigno;
        break;
    }
}
?>

<body>
    <div class="container-fluid main-container mt-4 d-flex align-items-center justify-content-center" style="min-height: 80vh;">
        <div class="content-wrapper text-center p-5" style="background-color: #f3e5f5; border-radius: 15px; box-shadow: 0px 4px 8px rgba(128, 0, 128, 0.2); max-width: 500px;">
            <?php if ($signoAtual): ?>
                <h1 style="color: #6a1b9a;" class="mb-4">Seu signo é: <?= $signoAtual->signoNome ?></h1>
                <p style="color: #8e24aa;" class="mb-5"><?= $signoAtual->descricao ?></p>
            <?php else: ?>
                <p style="color: #d500f9;" class="mb-5">Não foi possível identificar um signo correspondente à data informada.</p>
            <?php endif; ?>
            <a href='index.php' class="btn" style="background-color: #ba68c8; color: white;">Voltar</a>
        </div>
    </div>
</body>
