<?php

use SophieCalixto\Serenatto\Model\Product;
use SophieCalixto\Serenatto\Repository\ProductsRepository;

require "vendor/autoload.php";

include "src/database/connection_db.php";

$post = $_POST;

if($_POST['register_product']) {
    $image = uniqid().$_FILES['image']['name'];
    $product = new Product(null, $post['type'], 'img/'.$image, $post['name'], $post['description'], $post['price']);
    $productRepo = new ProductsRepository($pdo);

    move_uploaded_file($_FILES['image']['tmp_name'], 'img/'.$image);
    $productRepo->createProduct($product);

    header("Location: admin.php");
}

?>

<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="css/admin.css">
    <link rel="stylesheet" href="css/form.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="icon" href="img/icone-serenatto.png" type="image/x-icon">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Barlow:wght@400;500;600;700&display=swap" rel="stylesheet">
    <title>Serenatto - Cadastrar Produto</title>
</head>
<body>
<main>
    <section class="container-admin-banner">
        <img src="img/logo-serenatto-horizontal.png" class="logo-admin" alt="logo-serenatto">
        <h1>Cadastro de Produtos</h1>
        <img class= "ornaments" src="img/ornaments-coffee.png" alt="ornaments">
    </section>
    <section class="container-form">
        <form method="post" enctype="multipart/form-data">

            <label for="name">Nome</label>
            <input type="text" id="name" name="name" placeholder="Digite o nome do produto" required>
            <div class="container-radio">
                <div>
                    <label for="coffee">Café</label>
                    <input type="radio" id="coffee" name="type" value="Café" checked>
                </div>
                <div>
                    <label for="almoco">Almoço</label>
                    <input type="radio" id="lunch" name="type" value="Almoço">
                </div>
            </div>
            <label for="description">Descrição</label>
            <input type="text" id="description" name="description" placeholder="Digite uma descrição" required>

            <label for="price">Preço</label>
            <input type="text" id="price" name="price" placeholder="Digite uma descrição" required>

            <label for="image">Envie uma imagem do produto</label>
            <input type="file" name="image" accept="image/*" id="image" placeholder="Envie uma imagem">

            <input type="submit" name="register_product" class="botao-cadastrar" value="Cadastrar produto"/>
        </form>
    
    </section>
</main>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js" type="text/javascript"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-maskmoney/3.0.2/jquery.maskMoney.min.js" integrity="sha512-Rdk63VC+1UYzGSgd3u2iadi0joUrcwX0IWp2rTh6KXFoAmgOjRS99Vynz1lJPT8dLjvo6JZOqpAHJyfCEZ5KoA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="js/index.js"></script>
</body>
</html>