<div>
    <h1>Administracion de alumnos</h1>
    <p>
        En esta seccion vamos a administrar a los alumnos
    </p>
    <p>
        Lorem ipsum dolor sit amet consectetur adipisicing elit. Laudantium pariatur excepturi, dolorem voluptate provident numquam distinctio neque libero minus rem inventore tenetur laborum quibusdam porro nam, blanditiis perspiciatis vitae consequatur.
        Lorem ipsum dolor sit amet consectetur adipisicing elit. Repudiandae rem voluptatem ipsam architecto quos tempora animi dicta corporis minima rerum explicabo laboriosam, adipisci labore, omnis repellat fuga accusamus facere reiciendis.
        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nemo aspernatur commodi vero quasi quidem. Alias provident, eius ipsum officiis, quo nostrum atque dolorem velit aliquam maiores aut earum laborum nobis.
    </p>
    <table border="1">
        <thead>
            <tr>
                <td>Nombre</td>
                <td>Apellidos</td>
                <td>Edad</td>
                <td>Correo</td>
            </tr>
        </thead>
        <tbody>
            <?php
                foreach($datos as $dato){
                    echo "<tr>";
                    echo "<td>". $dato['nombre'] ."</td>";
                    echo "<td>". $dato['apellido'] ."</td>";
                    echo "<td>". $dato['edad'] ."</td>";
                    echo "<td>". $dato['correo_electronico'] ."</td>";
                    echo "</tr>";
                }
            ?>
        </tbody>
    </table>
</div>