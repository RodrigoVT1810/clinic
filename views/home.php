<?php
/**
 * Es la vista del home al momento de acceder por el welcome
 * 
 * Dentro de esta pantalla esta el contenido de toda la información importante acerca de la página
 * ¿Qué encontrarás aquí?
 * Síntomas
 * Diagnosticos
 * 
 * Podremos ver los redireccionamientos para realizar la prueba de TEST
 */
?>
<div id="home" class="none-home">
    <div class="header">
        <div class="top-header">
            <div class="circle-img">
                <img src="assets/img/doctores.jpg" alt="Mi imagen">
            </div>
            <div class="name">
                <span class="color-blue">CLINIC</span>
                <span class="color-black">DETECT</span>
            </div>
        </div>
        <div class="menu">
            <ul>
                <li><a href="#encontrarasAqui">Encontrarás Aquí</a></li>
                <li><a href="#sintomas">Síntomas</a></li>
                <li><a href="#diagnostico">Diagnóstico</a></li>
                <li><a href="login.php">Realizar Test</a></li>
            </ul>
        </div>
    </div>
    <div class="content">
        <div id="encontrarasAqui" class="encontraras-aqui">
            <div class="container">
                <div class="section-encontraras-aqui">
                    <div class="img-section">
                        <img src="assets/img/main.jpg" alt="Imagen">
                    </div>
                    <div class="section-information">
                        <div class="content-information">
                            <div class="title">¡HOLA BIENVENID@!</div>
                            <div class="subtitle">¿Qué encontrarás aquí?</div>
                            <div class="text">El sitio web CLINIC DETECT ofrece información sobre los síntomas de la depresión y un programa para poder detectarlo mediante un agente inteligente. Aquí podrás aprender cuáles son los síntomas de depresión, evaluar si los tienes y qué hacer para eliminarlo. </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div id="sintomas" class="sintomas">
            <div class="container">
                <div class="section-sintomas">
                    <div class="title">SÍNTOMAS</div>
                    <div class="section-information">
                        <div class="text">
                            Si has experimentado por lo menos cinco de los siguientes síntomas, la mayor parte del tiempo, al menos durante las últimas dos semanas es probable que tengas algún grado de depresión.
                        </div>
                        <div class="information-formation">
                            <div class="icon-formation"><i class="fas fa-frown"></i></div>
                            <div class="title-formation">TRISTEZA</div>
                            <div class="text-formation">Sentir tristeza, desgano o sentimiento de vacío.</div>
                        </div>
                        <div class="information-formation">
                            <div class="icon-formation"><i class="fas fa-meh"></i></div>
                            <div class="title-formation">DESINTERÉS</div>
                            <div class="text-formation">Pérdida de interés por las cosas que antes se disfrutaban.</div>
                        </div>
                        <div class="information-formation">
                            <div class="icon-formation"><i class="fas fa-utensils"></i></div>
                            <div class="title-formation">COMIDA</div>
                            <div class="text-formation">Problemas de apetito, es decir, comer mucho o carencia de hambre.</div>
                        </div>
                        <div class="information-formation">
                            <div class="icon-formation"><i class="fas fa-bed"></i></div>
                            <div class="title-formation">DORMIR</div>
                            <div class="text-formation">Dificultad para dormir.</div>
                        </div>
                        <div class="information-formation">
                            <div class="icon-formation"><i class="fas fa-tired"></i></div>
                            <div class="title-formation">CANSANCIO</div>
                            <div class="text-formation">Movimientos lentos, sentir el cuerpo pesado o sentir intranquilidad.</div>
                        </div>
                        <div class="information-formation">
                            <div class="icon-formation"><i class="fas fa-grimace"></i></div>
                            <div class="title-formation">FATIGA</div>
                            <div class="text-formation">Sentir apatía, fatiga o poca energía.</div>
                        </div>
                        <div class="information-formation">
                            <div class="icon-formation"><i class="fas fa-dizzy"></i></div>
                            <div class="title-formation">CULPABILIDAD</div>
                            <div class="text-formation">Sentimientos de culpa, impotencia o inutilidad.</div>
                        </div>
                        <div class="information-formation">
                            <div class="icon-formation"><i class="fas fa-meh-rolling-eyes"></i></div>
                            <div class="title-formation">DESCONCENTRACIÓN</div>
                            <div class="text-formation">Dificultad para concentrarse.</div>
                        </div>
                        <div class="information-formation">
                            <div class="icon-formation"><i class="fas fa-sad-tear"></i></div>
                            <div class="title-formation">SOLEDAD</div>
                            <div class="text-formation">Pensar mucho en la muerte.</div>
                        </div>
                        <div class="text">
                            Si reconoces al menos cinco de estos síntomas y con frecuencia dejas de hacer algunas de tus actividades cotidianas por sentirte de esta manera, es posible que tengas un grado importante de depresión, en cuyo caso, este programa te puede ayudar.
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div id="diagnostico" class="diagnostico">
            <div class="container">
                <div class="section-diagnostico">
                    <div class="title">DIAGNÓSTICO</div>
                    <div class="information-about">
                        <div class="content-about">
                            <div class="text-about">
                                <p>CLINIC DETECT está diseñado para completarse en un periodo aproximado de diez minutos, dependiendo del tiempo que necesite cada usuario. No tienes que pagar, tanto la inscripción como el uso del programa son GRATUITOS. Para acceder a él sólo tienes que registrarte.</p>
                                <p>El test, se compone de cuatro módulos. Cada módulo se compone de preguntas acerca de:</p>
                                <ul>
                                    <li>Familia</li>
                                    <li>Amigos</li>
                                    <li>Escuela</li>
                                    <li>Personales</li>
                                </ul>
                                <p>No es necesario estudiar antes de empezar el test, ya que el test no se reprueba ni se aprueba, puesto que la finalidad es conocer si el usuario sufre de depresión o no.</p>
                                <small>Una vez empezado el test se recomienda no dejarlo incompleto.</small>
                                <div class="btn-login">
                                    <a href="login.php">Realizar Test</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>