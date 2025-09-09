<?php include('header.php'); ?>
<body class="bg-light d-flex align-items-center justify-content-center min-vh-100">
    <div class="card shadow-lg border-0 rounded-4 p-4 text-center" style="max-width: 420px; width: 100%; background-color: #fff;">
        <h1 class="text-purple fw-bold mb-2" style="color: #6a1b9a;">Horóscopo</h1>
        <p class="text-muted mb-4 fs-5">O que o horóscopo tem a dizer sobre você?</p>

        <form id="signo-form" method="POST" action="show_zodiac_sign.php">
            <div class="mb-3 text-start">
                <label for="data_nascimento" class="form-label text-secondary">Data de Nascimento</label>
                <input type="date" class="form-control" id="data_nascimento" name="data_nascimento" required>
            </div>
            <button type="submit" class="btn w-100 py-2" style="background-color: #6a1b9a; color: white;">Enviar</button>
        </form>

        <footer class="mt-4">
            <p class="text-muted small mb-0">
                <a href="https://github.com/soadse" target="_blank" style="color: #6a1b9a;">@soadse</a>
            </p>
        </footer>
    </div>
</body>
