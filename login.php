<?php
/**
 * Página de Login, donde el usuario podrá registrarse como paciente para que se pueda otorgar los permisos para poder guardar su diágnostico
 * asi como también se le pueda dar un seguimiento.
 * 
 * De igual manera si el usuario no desea registrarse puede realizar el test como invitado, cabe mencionar que no se le podrá dar un seguimiento.
 */
?>
<?php include('header.php'); ?>
<div id="login">
    <div class="content-login">
        <div class="section-image">
            <div class="circle-top"></div>
            <div class="circle-img">
                <img src="assets/img/doctores.jpg" alt="Mi imagen">
            </div>
            <div class="circle-bottom"></div>
        </div>
        <div class="section-login">
            <div class="title">CLINIC DETECT</div>
            <div class="text">Registrate par darte un mejor seguimiento</div>
            <form id="form_login" method="POST" action="test.php">
                <label for="varchar">Nombre</label>
                <input type="text" name="nombre" class="nombre" required />
                <label for="varchar">Apellido Paterno</label>
                <input type="text" name="ape_paterno" class="ape_paterno" required />
                <label for="varchar">Apellido Materno</label>
                <input type="text" name="ape_materno" class="ape_materno" required />
                <label for="varchar">Fecha Nacimiento</label>
                <input type="date" name="fecha_nacimiento" class="fecha_nacimiento" required />
                <label for="varchar">Género</label>
                <select name="genero" id="genero">
                    <option value="Masculino">Masculino</option>
                    <option value="Femenino">Femenino</option>
                </select>
                <label for="varchar">Correo Electrónico</label>
                <input type="email" name="email" class="email" required />
                <button class="btn-register" type="submit">Registrar</button>
            </form>
            <button class="btn-invitado">Invitado</button>
        </div>
    </div>
</div>
<script>
    $(document).ready(function(){
        $('.btn-invitado').click(function(){
            window.location.href = 'test.php';
        });
    });
</script>
<?php include('footer.php'); ?>