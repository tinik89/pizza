<?php
require_once "pizza.php";
require_once "size.php";
require_once "sauce.php";
?>
<!doctype html>
<html lang="ru" class="responsive-layout">
<head>
    <title>Пицца</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script>
        $(function() {
            $('#order-form').on('submit', function(){
                $.ajax({
                    type: 'POST',
                    url: 'send.php',
                    data: $('#order-form').serialize(),
                    dataType: "html",
                    success: function (msg) {
                        $('.wrapper').html(msg);
                    }
                });
                return false;
            })
        })
    </script>
</head>
<bod>
    <?php
    $pizzaArr = pizza::getAllPizza();
    $sizeArr = size::getAllSize();
    $sauceArr = sauce::getAllSauce();


    ?>
    <div class="wrapper">
    <form method="post" id="order-form">
        <label for="pizza">Выберите пиццу:</label>
        <select name="pizza" id="pizza" required>
            <option></option>
            <?php
            foreach ($pizzaArr as $k => $v) {
                echo '<option value="' . $v['id'] . '">' . $v['name'] . '</option>';
            }
            ?>
        </select>
        <label for="size">Выберите размер (см.):</label>
        <select name="size" id="size" required>
            <option></option>
            <?php
            foreach ($sizeArr as $v) {
                echo "<option>$v[0]</option>";
            }
            ?>
        </select>
        <label for="sauce">Выберите соус:</label>
        <select name="sauce" id="sauce">
            <option></option>
            <?php
            foreach ($sauceArr as $k => $v) {
                echo '<option value="' . $v['id'] . '">' . $v['name'] . '</option>';
            }
            ?>
        </select>
        <button type="submit">Заказать</button>
    </form>
    </div>
</bod>
</html>

