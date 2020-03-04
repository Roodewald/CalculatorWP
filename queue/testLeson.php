<?php
/*
Plugin Name: Test Leson
Plugin URI: http://wordpress.org/plugins/hello-dolly/
Description: Плагин для записи на пробное занятие
Author: Pavel Savchenko
Version: 1.7.2
Author URI: https://github.com/Roodewald
*/

function html_code(){
    ?>
    <form method="post" onsubmit="JustDoIt(); return false">
    <p>Ф.И.О Пример: Иванов Иван Иванович <br/>
        <input type="FIO" id="FIO" name="FIO" pattern="^[А-Яа-яЁё]+\s^[А-Яа-яЁё]+\s^[А-Яа-яЁё]+" size="40" />
    </p>
    <p>Возраст<br/>
        <input type="age" id="age" name="age" size="40" />
    </p>
    <p>E-mail <br/>
        <input type="mail" id="mail" name="mail" size="40" />
    </p>
    <p>Телефон<br/>
        <input type="phone" id="phone" name="phone" size="40" pattern="[0-9]{,11}"/>
    </p>
    <p>Курс<br/>
        <input type="kurse" id="kurse" name="kurse" size="40" />
    </p>
    <p><input type="submit" name="cf-submitted" value="Send"></p>
</form>
<?php 
};
function admin_console_load(){
    add_menu_page( 'Manage contact messages', 'Модуль записи на пробное занятие', 'manage_options', 'test-plugin', 'load_db_messages' );
}

add_action('admin_menu', 'admin_console_load');
add_shortcode('testLeson','html_code');
?>