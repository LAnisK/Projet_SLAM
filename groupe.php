
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Groupe</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }
        header {
            background-color: #333;
            padding: 10px 0;
            text-align: center;
        }
        header ul {
            list-style: none;
            padding: 0;
        }
        header ul li {
            display: inline;
            margin-right: 20px;
        }
        header ul li a {
            color: white;
            text-decoration: none;
        }
        .container {
            max-width: 1000px;
            margin: 20px auto;
            background-color: white;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h1, h2 {
            color: #333;
        }
        .code-area {
            margin-top: 20px;
        }
        textarea {
            width: 100%;
            height: 150px;
        }
        button {
            background-color: #4CAF50;
            color: white;
            padding: 10px 15px;
            border: none;
            cursor: pointer;
        }
        button:hover {
            background-color: #45a049;
        }
        .output {
            background-color: #333;
            color: white;
            padding: 10px;
            margin-top: 10px;
            white-space: pre-wrap;
            font-family: monospace;
        }
        .upload-section {
            margin-bottom: 20px;
        }
        .pdf-list {
            margin-top: 20px;
        }
        .pdf-list ul {
            list-style: none;
            padding: 0;
        }
        .pdf-list ul li {
            margin-bottom: 10px;
        }
        .pdf-list ul li a {
            color: #007BFF;
            text-decoration: none;
        }
        .pdf-list ul li a:hover {
            text-decoration: underline;
        }
        img {
    max-width: 100%;
        }
            .slider-container {
            max-width: 800px;
            position: relative;
            margin: auto;
            height: 350px;
            overflow: hidden;
        }
            .menu {
            position: absolute;
            left: 0;
            z-index: 11;
            width: 100%;
            bottom: 0;
            text-align: center;
        }
            .menu label {
            cursor: pointer;
            display: inline-block;
            width: 10px;
            height: 10px;
            background: #ccc;
            border-radius: 50px;
            margin: 0 0.2em 1em;
        }
            .menu label:hover,.menu label:focus {
            background: #1c87c9;
        }
            .slide-input{
            opacity: 0;
        }
            .slide-img {
            width: 100%;
            height: 300px;
            position: absolute;
            top: 0;
            left: 100%;
            z-index: 10;
            transition: left 0s 0.75s;
        }
            [id^="slide"]:checked + .slide-img {
            left: 0;
            z-index: 100;
            transition: left 0.65s ease-out;
        }

    </style>
</head>
<body>

<header>
    <ul>
        <li><a href="#">Accueil</a></li>
        <li><a href="#">École</a></li>
        <li><a href="#">Groupe</a></li>
        <li><a href="#">Entreprise</a></li>
        <li><a href="#">Cours</a></li>
        <li><a href="#">Contact</a></li>
    </ul>
</header>

<div class="container">
    <h1>Cours</h1>
    <p>Nous sommes un groupe d'étudiants alternants en BTS SIO option SLAM à l'école IRIS.</p>
    <div class="slider">
        <h2>Voici notre groupe</h2>
        <div class="menu">
                <label for="slide-dot-1"></label>
                <label for="slide-dot-2"></label>
                <label for="slide-dot-3"></label>
                <label for="slide-dot-4"></label>
            </div>

            <input class="slide-input" id="slide-dot-1" type="radio" name="slides" checked>
            <img class="slide-img" src="C:/Users/anisk/Desktop/Projet SLAM/images/Theo.jpeg">

            <input class="slide-input" id="slide-dot-2" type="radio" name="slides">
            <img class="slide-img" src="C:/Users/anisk/Desktop/Projet SLAM/images/Chems.jpeg">

            <input class="slide-input" id="slide-dot-3" type="radio" name="slides">
            <img class="slide-img" src="C:/Users/anisk/Desktop/Projet SLAM/images/Rayane.jpeg">

            <input class="slide-input" id="slide-dot-4" type="radio" name="slides">
            <img class="slide-img" src="C:/Users/anisk/Desktop/Projet SLAM/images/Anis.jpeg">


        </div>
        <hr>
    </div>

    <div class="pdf-list">
        <h2>Fichiers PDF disponibles</h2>
        <ul>
            <?php
            // Chemin du dossier uploads
            $directory = 'uploads/';
            // Ouvre le dossier et parcourt les fichiers
            if ($handle = opendir($directory)) {
                while (false !== ($file = readdir($handle))) {
                    // Vérifie que ce soit bien un fichier PDF
                    if ($file != "." && $file != ".." && pathinfo($file, PATHINFO_EXTENSION) == 'pdf') {
                        echo '<li><a href="'.$directory.$file.'" download>' . $file . '</a></li>';
                    }
                }
                closedir($handle);
            }
            ?>
        </ul>
        <hr>
    </div>

    <!-- Section pour le code en C -->
    <div class="code-area">
        <h2>Exécuter du code C</h2>
        <form method="POST" id="c-code-form">
            <textarea name="c_code" placeholder="Écrivez votre code C ici..."></textarea>
            <button type="button" onclick="executeCCode()">Exécuter le code C</button>
        </form>
        <div id="c-output" class="output"></div>
    </div>

    <!-- Section pour le code en PHP -->
    <div class="code-area">
        <h2>Exécuter du code PHP</h2>
        <form method="POST" id="php-code-form">
            <textarea name="php_code" placeholder="Écrivez votre code PHP ici..."></textarea>
            <button type="button" onclick="executePHPCode()">Exécuter le code PHP</button>
        </form>
        <div id="php-output" class="output"></div>
    </div>
</div>

<script>
    // Fonction JavaScript pour exécuter du code C
    function executeCCode() {
        const cCode = document.querySelector('[name="c_code"]').value;
        const output = document.getElementById('c-output');

        // Simule un appel vers le serveur pour exécuter du code C
        output.innerHTML = 'Résultat du code C:\n' + cCode;
    }

    // Fonction JavaScript pour exécuter du code PHP
    function executePHPCode() {
        const phpCode = document.querySelector('[name="php_code"]').value;
        const output = document.getElementById('php-output');

        // Simule l'exécution de code PHP côté serveur
        output.innerHTML = 'Résultat du code PHP:\n' + phpCode;
    }
</script>

</body>
</html>
