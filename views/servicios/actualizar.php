<h1 class="nombre-pagina">Actualizar Servicio</h1>

<p class="descripcion-pagina">Modifica Los Valores Del Formulario</p>

<?php include_once __DIR__ . '/../templates/barra.php'; ?>
<?php include_once __DIR__ . '/../templates/alertas.php'; ?>

<form method="POST" class="formulario">
    <?php include_once __DIR__ . '/formulario.php' ?>

    <input type="submit" value="Actualizar Servicio" class="boton">
</form>