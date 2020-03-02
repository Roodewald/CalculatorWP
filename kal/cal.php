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
        <p>Ваше имя <br/>
            <input type="text" id="name" name="cf-name" size="40" />
        </p>
        <p>Почта для связи <br/>
            <input type="email" id="email" name="cf-surname" size="40" />
        </p>
        <p>Предпочетаемное имя (required) <br/>
            <input type="text" id="subject" name="cf-subject" size="40" />
        </p>
        <p>Пожелание (required) <br/>
            <textarea rows="10" id="text" cols="35" name="cf-message"></textarea>
        </p>
        <p><input type="submit" name="cf-submitted" value="Send"></p>
    </form>
    <script>
        function submitMe() {
            jQuery(function($) {
                $.ajax( {
                    url : "wp-content/plugins/SAH/messages_act.php?act=0",
                    type : "POST",
                    data: {
                        "cf-name": document.getElementById('name').value,
                        "cf-mail": document.getElementById('email').value,
                        "cf-subject": document.getElementById('subject').value,
                        "cf-message": document.getElementById('text').value
                    },
                    success : function(data) {
                        console.log(data)
                        alert (data);
                    },
                    error: function (request, status, error) {
                        alert(error);
                        console.log(request);
                        console.log(status);
                    }
                });
            })
        }
    </script>
    <?php
};

function plugin_run() {
    html_to_code();
};

add_shortcode( 'text_me_honey_cal', 'plugin_run' );

?>
