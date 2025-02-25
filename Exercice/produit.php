<?php
$cnx = new PDO('mysql:host=localhost;dbname=produittest', 'root', '');
$rp = $cnx->prepare(("insert into produit (Name, Price, stock) values ('dell dv7', 1000, 10), ('hp pavilion', 1200, 15), ('lenovo', 1500, 20)"));
$rp = $cnx->prepare("Delete from produit where id = 10");
$rp->execute();
?>