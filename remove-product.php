<?php

use SophieCalixto\Serenatto\Repository\ProductsRepository;

require "vendor/autoload.php";

include "src/database/connection_db.php";

$getProductList = new ProductsRepository($pdo);

$removeProduct = $getProductList->deleteProduct($_POST['id']);

header("Location: admin.php");
exit();