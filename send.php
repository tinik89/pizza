<?php
require_once "pizza.php";
require_once "sauce.php";
require_once "price.php";
require_once "size.php";

if (isset($_POST['pizza']) && isset($_POST['size'])) {
    $price = new price();
    $pizza = new pizza($_POST['pizza']);
    $size = new size($_POST['pizza'], $_POST['size']);
    $price->addPrice($size->price);
    ?>
    <h3>ЧЕК</h3>
    <p><?= $pizza->getPizzaFullName($_POST['size']) ?></p>
    <?php if (isset($_POST['sauce'])) {
        $sauce = new sauce($_POST['sauce']);
        $price->addPrice($sauce->price);
        echo "<p>Соус:$sauce->name</p>";
    } ?>
    <p><b>Сумма:<?= $price->getPrice() ?>$</b></p>
    <?php
}