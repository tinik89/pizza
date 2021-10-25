<!doctype html>
<html lang="ru" class="responsive-layout">
<head>
    <title>Пицца</title>
</head>
<bod>
    <?php
    $pizzaArr = [
        'Пепперони' => '20',
        'Деревенская' => '25',
        'Гавайская' => '30',
        'Грибная' => '35',
    ];
    $sizeArr = [
        21 => '1',
        26 => '1.2',
        31 => '1.3',
        45 => '1.4',
    ];
    $sauceArr = [
        'сырный' => '5',
        'кисло-сладкий' => '5',
        'чесночный' => '3',
        'барбекю' => '6',
    ];
    if (isset($_POST['pizza']))  $pizza = htmlspecialchars($_POST['pizza']);
    if (isset($_POST['size']))  $size = htmlspecialchars($_POST['size']);
    if (isset($_POST['sauce']))  $sauce = htmlspecialchars($_POST['sauce']);
    if (!empty($basePrice = $pizzaArr[$pizza]) && !empty($multiplier = $sizeArr[$size])) {
        $price = $basePrice * $multiplier;
        ?>
        <h3>ЧЕК</h3>
        <p><?= $pizza ?> - <?= $size ?>см.</p>
        <?php if (!empty($sauceArr[$sauce])) {
            $price += $sauceArr[$sauce];
            echo "<p>Соус:$sauce</p>";
        } ?>
        <p><b>Сумма:<?=round($price, 2)?>$</b></p>
        <?php
    } else {
        ?>
        <form method="post">
            <label for="pizza">Выберите пиццу:</label>
            <select name="pizza" id="pizza" required>
                <option></option>
                <?php
                foreach ($pizzaArr as $k => $v) {
                    echo "<option>$k</option>";
                }
                ?>
            </select>
            <label for="size">Выберите размер (см.):</label>
            <select name="size" id="size" required>
                <option></option>
                <?php
                foreach ($sizeArr as $k => $v) {
                    echo "<option>$k</option>";
                }
                ?>
            </select>
            <label for="sauce">Выберите соус:</label>
            <select name="sauce" id="sauce">
                <option></option>
                <?php
                foreach ($sauceArr as $k => $v) {
                    echo "<option>$k</option>";
                }
                ?>
            </select>
            <button type="submit">Заказать</button>
        </form>
        <?php
    }
    ?>
</bod>
</html>

