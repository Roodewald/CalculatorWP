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
    <form method ="post" onsubmit="submitMe(); return false">
        <p>Преподователь <br/>
            <input type="radio" id="prepod1" name="prepod" value="500">
                Высшей категории 500р/ч <br/>
            <input type="radio" id="prepod2" name="prepod" value="300">
                Первой категории 300р/ч 

        </p>
        <p>Курс<br/>
            <input type="radio" id="curse1" name="curse" value="0.5">
                Для школьников <br/>
            <input type="radio" id="curse2" name="curse" value="0.7">
                Для студентов <br/>
            <input type="radio" id="curse3" name="curse" value="2">
                Для рабочих <br/>
            <input type="radio" id="curse4" name="curse" value="1">
                Для Пенсионеров <br/>
            
        </p>
        <p>Город <br/>
            <input type="radio" id="city1" name="city" value="2">
                Ханты-Мансийск <br/>
            <input type="radio" id="city2" name="city" value="3">
                Сургут <br>
            <input type="radio" id="city3" name="city" value="1.5">
                Нижневартовск <br/>
            <input type="radio" id="city4" name="city" value="1.2">
                Когалым <br>
            <input type="radio" id="city5" name="city" value="1.3">
                Советский <br>
        </p>
        <p>Интенсивность<br/>
            <input type="radio" id="intence1" name="intence" value="72">
                72часа <br/>
            <input type="radio" id="intence2" name="intence" value="144">
                144 часа<br/>
            <input type="radio" id="intence3" name="intence" value="288">
                288 часа<br/>
        </p>
        <p><input type="submit" name="submitted" value="Send"></p>
    </form>
    <script>
        function submitMe() {
            var prepod  = document.getElementsByTagName('prepod').value;
            var curse   = document.getElementsByTagName('curse').value;
            var city    = document.getElementsByTagName('city').value;
            var intence = document.getElementsByTagName('intence').value;
            
            var finalresult = prepod * curse * city * intence;

            alert(curse);

        }
    </script>
    <?php
};

function plugin_run() {
    html_to_code();
};

add_shortcode( 'text_me_honey_cal', 'plugin_run' );

?>
