<?php
/*
Plugin Name: Text Me, honey
Plugin URI: http://facebook.com
Description: This is contact form plugin for stupid WP
Version: 1.0
Author: Stupid Assholes LLC
Author URI: https://spktt.ru
*/

function html_form_code() {
    ?>
    <form method="post" onsubmit="submitMe(); return false">
        <p>Your Name (required) <br/>
            <input type="text" id="name" name="cf-name" pattern="[a-zA-Z0-9]+" size="40" />
        </p>
        <p>Your Email (required) <br/>
            <input type="email" id="email" name="cf-surname" size="40" />
        </p>
        <p>Subject (required) <br/>
            <input type="text" id="subject" name="cf-subject" size="40" />
        </p>
        <p>Subject (required) <br/>
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
}

function load_db_messages(){
    ?>
    <h1>Last messages</h1><div id='messes'></div>
    <script>
            jQuery(function($) {
                $.ajax( {
                    url : "../wp-content/plugins/SAH/messages_act.php?act=0",
                    type : "GET",
                    data: {
                        "act": 1
                    },
                    success : function(data) {
                        console.log(data)
                        document.getElementById('messes').innerHTML = data
                        //alert (data); //or use data string to show something else
                    },
                    error: function (request, status, error) {
                        alert(request.responseText);
                    }
                });
            })
    </script>
<?php
}

function admin_console_load(){
    add_menu_page( 'Manage contact messages', 'Messages', 'manage_options', 'test-plugin', 'load_db_messages' );
}
function plugin_run() {
    ob_start();
    html_form_code();
    return ob_get_clean();
}
add_action('admin_menu', 'admin_console_load');
add_shortcode( 'text_me_honey_form', 'plugin_run' );

?>