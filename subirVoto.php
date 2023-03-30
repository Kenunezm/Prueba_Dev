<?php
    #Includes
    include 'conexion.php';

    echo '<label><a href="index.php">Volver al Formulario</a></label>';
    
    #Se definen variables POST para cargar la consulta SQL con los datos de index.php
    $nombreApellido=isset($_POST['nombreApellido']) ? $_POST['nombreApellido'] : 'DEFAULT_VALUE';
    $Alias=isset($_POST['Alias']) ? $_POST['Alias'] : 'DEFAULT_VALUE';
    $Rut=isset($_POST['Rut']) ? $_POST['Rut'] : 'DEFAULT_VALUE';
    $Email=isset($_POST['Email']) ? $_POST['Email'] : 'DEFAULT_VALUE';
    $Region=isset($_POST['Region']) ? $_POST['Region'] : 'DEFAULT_VALUE';
    $Comuna=isset($_POST['Comuna']) ? $_POST['Comuna'] : 'DEFAULT_VALUE';
    $Candidato=isset($_POST['Candidato']) ? $_POST['Candidato'] : 'DEFAULT_VALUE';
    $viaEntrada=isset($_POST['viaEntrada']) ? $_POST['viaEntrada'] : 'DEFAULT_VALUE';

    #Se genera la consulta SQL para insertar datos en la Base de datos
    $sql="INSERT INTO voto (NombreApellido,Alias,Rut,Email,Region,Comuna,Candidato,ViaEntrada) VALUES('$nombreApellido','$Alias','$Rut','$Email',(SELECT nombre FROM regiones WHERE codigo='$Region'),(SELECT nombre FROM comunas WHERE codigoInterno='$Comuna'),(SELECT nombre FROM candidato WHERE id='$Candidato'),'$viaEntrada')";
    $execute=mysqli_query($conn,$sql);

    if(!$execute){
        mysqli_close($conn);
    };
?>