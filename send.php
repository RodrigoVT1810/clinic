<?php
    require_once('assets/dbconnector.php');
    $con=new dbconn();
    $con->dbconnector();

    $questions = $con->query("SELECT * FROM preguntas WHERE id_estatus = 1");
    $number = 1;
    $valor = 0;
    $response = "";
    while($row = $questions->fetch_assoc()) {
        $pos = strpos($_POST['id_questions'], '-'.$row['id'].'-');
        if($pos !== false){
            $valor += $_POST['pregunta'.$number];
            if($response == ""){
                $response = $row['id'].":".$_POST['pregunta'.$number];
            }else{
                $response = $response.";".$row['id'].":".$_POST['pregunta'.$number];
            }
            $number++;
        }
    }

    $title_diagnostic = "";
    $text_diagnostic = "";

    if($valor >= 0 && $valor <=20){
        $title_diagnostic = "No tiene depresión";
        $text_diagnostic = "Eres fiel a ti mismo. Cuidas la relación que mantienes contigo. No sientes tensión.
        Tus músculos faciales están relajados y sus movimientos son fluidos. Sonríes con autenticidad y tu mirada brilla.
        Pones atención a tu cuerpo. Tu sistema inmunológico está determinado por tu actitud emocional. Confías y te quieres. Tu salud te lo agradece.
        Tu mente permanece en silencio. Tienes la mente y el corazón en paz. Expresas acciones y pensamientos pacíficos.
        Te sientes responsable de lo que piensas y sientes en cada momento. Atraes personas y fomentas situaciones positivas.";
    }else if($valor >= 21 && $valor <=40){
        $title_diagnostic = "Depresión Leve";
        $text_diagnostic = "Presenta baja del estado de ánimo y dos o tres manifestaciones más, como fatiga, alteraciones del sueño, del apetito, de la atención o concentración. Pero no afecta sus actividades de la vida diaria.";
    }else if($valor >= 41 && $valor <=60){
        $title_diagnostic = "Depresión Moderada";
        $text_diagnostic = "Presenta baja del estado de ánimo de forma importante, asociado a llanto fácil, agotamiento, molestias físicas, alteraciones del sueño, del apetito. Pensamientos de que “no vale nada”, “todo le sale mal”, aislamiento familiar o social. También se puede asociar ansiedad, nerviosismo.
        Se diferencia de la depresión leve porque afecta las actividades de la vida diaria.";
    }else if($valor >= 61 && $valor <=80){
        $title_diagnostic = "Depresión Intensa";
        $text_diagnostic = "Presentan baja del estado de ánimo de forma severa, llanto, tristeza, aislamiento, pérdida del sueño, del apetito, de interés en todas sus actividades. Piensan que no deben seguir viviendo porque afectan a los demás, que no son capaces de hacer nada, que no valen nada. Por lo tanto, comienzan a planear como podrían quitarse la vida.
        Se diferencia de la depresión moderada porque se afectan por completo todas sus actividades de la vida diaria. Les incapacita.";
    }

    if($_POST['id_patient'] != 0){
        $con->query("INSERT INTO test(id_paciente,response,diagnostico,id_estatus,creator_user_id) 
            VALUES(".$_POST['id_patient'].",'".$response."','".$title_diagnostic."',1,1)");
    }
?>
<?php include('header.php'); ?>
<div id="send">
    <div class="content-send">
        <div class="headers-send">
            <div class="header-send header-active" data-id="diagnostico">Diágnostico</div>
            <div class="header-send" data-id="informacion">Información</div>
        </div>
        <div class="section-information">
            <div id="diagnostico" class="content-information information-active">
                <?php
                    echo '<div class="title-diagnostic">'.$title_diagnostic.'</div>';
                    echo '<div class="text-diagnostic">'.$text_diagnostic.'</div>';
                ?>
            </div>
            <div id="informacion" class="content-information">
                <?php 
                    if($_POST['id_patient'] != 0){
                        $sql = $con->query("SELECT * FROM pacientes WHERE id = ".$_POST['id_patient']);
                        $patient = $con->fetcharray($sql);
                        echo '<div class="name-patient">Paciente: '.$patient['nombre'].' '.$patient['ape_paterno'].' '.$patient['ape_materno'].'</div>';
                    } else {
                        echo '<div class="name-patient">Paciente: No registrado</div>';
                    }
                    echo '<div class="section-questions">';
                    $questions = $con->query("SELECT * FROM preguntas WHERE id_estatus = 1");
                    $number = 1;
                    while($row = $questions->fetch_assoc()) {
                        $pos = strpos($_POST['id_questions'], '-'.$row['id'].'-');
                        if($pos !== false){
                            echo '<div class="text-question"><span>'.$number.'.- </span>'.$row['pregunta'].'</div>';
                            switch($_POST['pregunta'.$number]){
                                case 1:{
                                    echo '<div class="text-response">Raramente o ninguna vez (menos de un día)</div>';
                                }break;
                                case 2:{
                                    echo '<div class="text-response">Alguna o pocas veces</div>';
                                }break;
                                case 3:{
                                    echo '<div class="text-response">Ocasionalmente o una buena parte del tiempo (3-4 días)</div>';
                                }break;
                                case 4:{
                                    echo '<div class="text-response">La mayor parte o todo el tiempo (5-7 días)</div>';
                                }break;
                            }
                            
                            $number++;
                        }
                    }
                    echo '</div>';
                ?>
            </div>
        </div>
        <div class="footer-send">
            <a class="btn-back" href="./">Regresar</a>
        </div>
    </div>
</div>
<script>
    $(document).ready(function(){
        $('.header-send').click(function(){
            $('.header-send').removeClass('header-active');
            $('.content-information').removeClass('information-active');
            var id = $(this).data('id');
            $(this).addClass('header-active');
            $('#'+id).addClass('information-active');
        });
    });
</script>
<?php include('footer.php'); ?>