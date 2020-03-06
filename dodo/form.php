<?php
/*
Plugin Name: simpleQueue
Plugin URI: http://wordpress.org/plugins/hello-dolly/
Description: Плагин позволяющий simpleQueue
Author: Павел Савченко
Version: 1.7.2
Author URI: http://github.com/roodewald
*/

function simpleQueue(){
    ?>
    <script src="http://code.jquery.com/jquery-1.8.3.js"></script>
    <form method="post" onsubmit="submitQueue(); return false">
    <p>Выберете очередь</p></br>
    <label><input name="firstInput" type="radio" value="1">Один</label></br>
    <label><input name="firstInput" type="radio" value="2">Два</label></br>
    <label><input name="firstInput" type="radio" value="3">Три</label></br>
    <p>Выберете очередь</p></br>
    <label><input name="secondInput" type="radio" value="4">Четыре</label></br>
    <label><input name="secondInput" type="radio" value="5">Пять</label></br>
    <label><input name="secondInput" type="radio" value="6">Шесть</label></br>

    <input type="submit" value="Расчитать">
    
</form>
<script>
    function submitQueue(){
        firstInput = document.getElementsByName('firstInput')
        for(i=0; i<firstInput.length; i++){
            if(firstInput[i].checked){
                firstInput = firstInput[i].value
            }
        }
        secondInput = document.getElementsByName('secondInput')
        for(i=0; i<secondInput.length; i++){
            if(secondInput[i].checked){
                secondInput = secondInput[i].value
            }
        }
        $.ajax({
            url:'wp-content/plugins/dodo/data.php?=act0',
            type:'POST',
            data:{
                'firstInput': firstInput.value,
                'secondInput': secondInput.value
            },
            success: function(){
                alert('Все заебись');
                console.log(request);
                console.log(status);
            },
            error: function (request, status, error) {
                    alert('error');
                    console.log(request);
                    console.log(status);
            }
        })
    }
</script>
<?php
};

add_shortcode( 'simpleQueue', 'simpleQueue');
?>