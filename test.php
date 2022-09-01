<?php
    /**
     * La página de test es el formulario que consta de 20 preguntas para detectar,
     * el nivel de depresión que una persona tiene.
     */

    //Conexión a la BD
    require_once('assets/dbconnector.php');
    $con=new dbconn();
    $con->dbconnector();

    $id = 0;
    if($_POST){
        //Si el usuario se registro guardamos la información
        $con->query("INSERT INTO pacientes(nombre,ape_paterno,ape_materno,fecha_nacimiento,genero,email,id_estatus,creator_user_id) VALUES('".$_POST['nombre']."','".$_POST['ape_paterno']."','".$_POST['ape_materno']."','".$_POST['fecha_nacimiento']."','".$_POST['genero']."','".$_POST['email']."',1,1)");
        $sql = $con->query("SELECT * FROM pacientes ORDER BY id DESC LIMIT 1");
        $patient = $con->fetcharray($sql);
        $id = $patient['id'];
    }

    //Obtenemos todas las preguntas que se realizarán en el cuestionario
    $questions = $con->query("SELECT * FROM preguntas WHERE id_estatus = 1");
    $max_questions = $questions->num_rows;
?>
<?php include('header.php'); ?>
<div id="test">
    <form id="form_test" action="" method="POST">
        <div class="content-test">
            <div class="section-number-question">
                <div class="steps">Pregunta <span class="step">1</span> de <?= $max_questions ?></div>
            </div>
            <div class="section-test">
                <div class="section-questions-reponse">
                    <div class="section-questions">
                        <?php 
                            /**
                             * Las preguntas obtenidas en la parte superior se comienzan a pintar dinamicamente con
                             * su respectivo campo de respuesta.
                             */
                            $number = 1;
                            while($row = $questions->fetch_assoc()) {
                                if($number == 1){
                                    echo '<div class="question question'.$number.' question-active" data-id="'.$row['id'].'">';
                                }else{
                                    echo '<div class="question question'.$number.'" data-id="'.$row['id'].'">';
                                }
                                echo '<div class="text-question"><span>'.$number.'.- </span>'.$row['pregunta'].'</div></div>';
                                $number++;
                            }
                        ?>
                    </div>
                    <div class="section-response">
                        <select name="response" id="response" value="0">
                            <option value="0">-- Seleccione una opción --</option>
                            <option value="1">Raramente o ninguna vez (menos de un día)</option>
                            <option value="2">Alguna o pocas veces (1-2 días)</option>
                            <option value="3">Ocasionalmente o una buena parte del tiempo (3-4 días)</option>
                            <option value="4">La mayor parte o todo el tiempo (5-7 días)</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="section-back-next">
                <div class="btn-back">Regresar</div>
                <div class="btn-next">Siguiente</div>
                <div class="btn-send">Enviar</div>
            </div>
        </div>
    </form>
</div>
<?php
/**
 * Formulario que se comenzara a llenar dinamicamente,
 * para ser enviado al método de guardar toda la información.
 */
?>
<form id="form_send" action="send.php" method="POST">
    <input type="hidden" name="id_patient" id="id_patient" value="<?= $id ?>">
    <input type="hidden" name="id_questions" id="id_questions" value="">
</form>
<script>
    var max_questions = <?= $max_questions ?>;
    var question = 1;
    var id_questions = "";
    $(document).ready(function(){
        $('.btn-next').click(function() {
            /**
             * Acción que se ejecuta a dal clic en el botón de siguiente.
             * Función que guarda la respuesta en el formulario y avanza a la siguiente pregunta.
             */
            var response = $('#response').val();
            if(response != 0){
                var existe = $('#pregunta'+question).val();
                if(!existe){
                    var id = $('.question'+question).data('id');
                    if(id_questions == ""){
                        id_questions = '-'+id.toString()+'-';
                    } else {
                        id_questions = id_questions.toString()+',-'+id.toString()+'-';
                    }
                    $('#id_questions').val(id_questions);
                    $('#form_send').append('<input type="hidden" name="pregunta'+question+'" id="pregunta'+question+'" value="'+response+'">')
                }else{
                    $('#pregunta'+question).val(response);
                }
                $('.btn-back').show();
                $('.question'+question).removeClass('question-active');

                question++;
                var existe = $('#pregunta'+question).val();
                if(!existe){
                    $('#response').val(0);
                }else{
                    $('#response').val($('#pregunta'+question).val());
                }
                $('.step').html(question);
                $('.question'+question).addClass('question-active');
                if(question == max_questions){
                    $('.btn-next').hide();
                    $('.btn-send').show();
                }
            } else {
                alert('Necesitas seleccionar una opción.');
            }
        });
        $('.btn-back').click(() => {
            /**
             * Acción que se ejecuta a dal clic en el botón de anterior.
             * Función que recupera la información y muestra la pregunta anterior con su respuesta ya seleccionada.
             */
            var response = $('#response').val();
            if(response != 0){
                $('#pregunta'+question).val(response);
            }
            $('.btn-next').show();
            $('.btn-send').hide();
            $('.question'+question).removeClass('question-active');
            question--;
            $('#response').val($('#pregunta'+question).val());
            $('.step').html(question);
            $('.question'+question).addClass('question-active');
            if(question == 1){
                $('.btn-back').hide();
            }
        });
        $('.btn-send').click(() => {
            /**
             * Acción que se ejecuta a dal clic en el botón de enviar que se encuentra al final del test,
             * la cual envía la información del formulario creado dinamicamente al método de guardar toda la información.
             */
            var response = $('#response').val();
            if(response != 0){
                var id = $('.question'+question).data('id');
                if(id_questions == ""){
                    id_questions = '-'+id.toString()+'-';
                } else {
                    id_questions = id_questions.toString()+',-'+id.toString()+'-';
                }
                $('#id_questions').val(id_questions);
                $('#form_send').append('<input type="hidden" name="pregunta'+question+'" id="pregunta'+question+'" value="'+response+'">');
                $('#form_send').append('<button type="submit" id="btn_form_send"></button>');
                $('#btn_form_send').click();
            } else {
                alert('Necesitas seleccionar una opción.');
            }
        });
    });
</script>
<?php include('footer.php'); ?>