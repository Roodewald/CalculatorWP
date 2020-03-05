<?php
/*
Plugin Name: Calculator
Plugin URI: http://facebook.com
Description: This is Calculator plugin for stupid WP
Version: 1337.0
Author: Stupid Assholes LLC
Author URI: https://spktt.ru
*/

function html_to_code(){
    ?>
  <form method="post" onsubmit="submitMe(); return false">
    <p>Преподователь <br />
        <input type="radio" id="prepod" name="prepod" value="500">
        Высшей категории 500р/ч <br />
        <input type="radio" id="prepod" name="prepod" value="300">
        Первой категории 300р/ч

    </p>
    <p>Курс<br />
        <input type="radio" class="curse" id="curse" name="curse" value="0.5">
        Для школьников <br />
        <input type="radio" class="curse" id="curse" name="curse" value="0.7">
        Для студентов <br />
        <input type="radio" class="curse" id="curse" name="curse" value="2">
        Для рабочих <br />
        <input type="radio" class="curse" id="curse" name="curse" value="1">
        Для Пенсионеров <br />

    </p>
    <p>Город <br />
        <input type="radio" class="city" id="city" name="city" value="2">
        Ханты-Мансийск <br />
        <input type="radio" class="city" id="city" name="city" value="3">
        Сургут <br>
        <input type="radio" class="city" id="city" name="city" value="1.5">
        Нижневартовск <br />
        <input type="radio" class="city" id="city" name="city" value="1.2">
        Когалым <br>
        <input type="radio" class="city" id="city" name="city" value="1.3">
        Советский <br>
    </p>
    <p>Интенсивность<br />
        <input type="radio" class="Itense" id="intence" name="intence" value="72">
        72 часа <br />
        <input type="radio" class="Itense" id="intence" name="intence" value="144">
        144 часа<br />
        <input type="radio" class="Itense" id="intence" name="intence" value="288">
        288 часов<br />
    </p>
    <p><input type="submit" name="submitted" value="Расчитать"></p>
</form>
<script>
    function submitMe() {

        var coach = document.getElementsByName('prepod');

        for (i = 0; i < coach.length; i++) {
            if (coach[i].checked)
                var1 = coach[i].value
        }

        var course = document.getElementsByName('curse');

        for (i = 0; i < course.length; i++) {
            if (course[i].checked)
                var2 = course[i].value
        }
        var city = document.getElementsByName('city');

        for (i = 0; i < city.length; i++) {
            if (city[i].checked)
            var3 = city[i].value
        }
        var intence = document.getElementsByName('intence');

        for (i = 0; i < intence.length; i++) {
            if (intence[i].checked)
            var4 = intence[i].value
        }

        var finalresult = var1 * var2 * var3 * var4;

        alert("Итоговая стоимотсь всего курса равна: "+ finalresult + " Рублей");

    }
</script>
    <?php
};

function plugin_run() {
    html_to_code();
};

add_shortcode( 'TrueCal', 'plugin_run' );

?>
