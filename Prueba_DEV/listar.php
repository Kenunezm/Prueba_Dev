<?php
    #Includes
    include 'conexion.php';

    $sqlRegion="SELECT * FROM regiones";
    $queryRegion=mysqli_query($conn,$sqlRegion);

    #Se genera variable $_POST['region'] la cual tendra el fin de filtrar las comunas con el atributo padre igual al atributo codigo de cada region.
    if(isset($_POST['region']) && trim($_POST['region']) !== "") {
        $sqlComuna="SELECT * FROM comunas where padre =".$_POST['region'];
        $queryComuna=mysqli_query($conn,$sqlComuna);
        echo '<option value="0"> - Escoge una comuna - </option>';
        while($comuna=mysqli_fetch_assoc($queryComuna)){
            echo "<option value='".$comuna["codigoInterno"]."'>".$comuna["nombre"]."</option>";
        }
    }
    #Se genera consulta SQL para traer datos de los candidatos
    $sqlCandidato="SELECT * FROM candidato";
    $queryCandidato=mysqli_query($conn,$sqlCandidato);
    $row=mysqli_fetch_array($queryRegion);
    $cadena="<select id='selectComuna' name='selectComuna'>";
    $cadena."</select>";
    mysqli_close($conn);

?>