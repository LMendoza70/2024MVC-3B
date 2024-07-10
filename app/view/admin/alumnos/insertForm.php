<div>
    <h1>Formulario para insertar un alumno</h1>
    <form action="http://localhost/php-3b/?C=alumnoController&M=insert" method="post">
        <div>
            <label for="nombre">Nombre : </label>
            <input type="text" name="nombre" required>
        </div>
        <div>
            <label for="apellido">Apellido : </label>
            <input type="text" name="apellido" required>
        </div>
        <div>
            <label for="edad">Edad : </label>
            <input type="number" name="edad" required>
        </div>
        <div>
            <label for="correo">Correo : </label>
            <input type="email" name="correo" required>
        </div>
        <div>
            <label for="fecha">Fecha : </label>
            <input type="date" name="fecha" required>
        </div>
        <div>
            <input type="submit" value="ADD">
        </div>
    </form>
</div>