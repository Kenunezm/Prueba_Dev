<?php 
    #Includes
    include 'listar.php';
    include 'subirVoto.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" type="text/css" href="./index.css">
        <title>Formulario</title>
        <script
        src="https://code.jquery.com/jquery-3.6.4.js"
        integrity="sha256-a9jBBRygX1Bh5lt8GZjXDzyOB+bWve9EiO7tROUtj/E="
        crossorigin="anonymous"></script>
    </head>
    <body>
        <div>
            <form id="formulario" name="formulario" action="subirVoto.php" method="POST">
                <h1>Formulario de Votacion</h1>
                    <label>Nombre y Apellido <input type="text" name="nombreApellido" id="nombreApellido" placeholder="Indique su nombre y apellido" class="inText" required></label>
                    <br>
                    <label>Alias  <input type="text" name="Alias" id="Alias" placeholder="Indique su Alias" class="inText" required></label>
                    <br>
                    <label>Rut <input type="text" name="Rut" id="Rut" placeholder="Ingrese rut xxxxxxxx-x" class="inText" required></label>
                    <br>
                    <label>Email <input type="text" name="Email" id="Email" placeholder="Indique su correo" class="inText" required></label> 
                    <br>
                    
                    <label>Región 
                    <select name="Region" id="Region">
                        <option value="0"> - Escoge una región - </option>
                        <?php while($row=mysqli_fetch_array($queryRegion)){?>
                        <option value="<?php echo $row['codigo'] ?>">
                            <?php echo $row['nombre']?>
                            <?php } ?>
                    </option>
                    </select></label>
                    <br>
                    <label for="">Comuna
                    <select name="Comuna" id="Comuna">
                    <option value="0"> - Escoge una comuna - </option>
                    </select></label>
                    <br>

                    <label>Candidato 
                    <select name="Candidato" id="Candidato">
                    <option value="0"> - Escoge un candidato - </option>
                    <?php while($row=mysqli_fetch_array($queryCandidato)){?>
                        <option value="<?php echo $row['id'] ?>">
                            <?php echo $row['Nombre']?>
                            <?php } ?>
                        </option>
                    </select></label>
                    <br>
                    <label>Como se enteró de Nosotros 
                        <input type="checkbox" name="viaEntrada1" class="viaEntrada" onclick="validarCheck(viaEntrada1)" value="viaEntrada1"> Web 
                        <input type="checkbox" name="viaEntrada2" class="viaEntrada" onclick="validarCheck(viaEntrada2)" value="viaEntrada2"> TV 
                        <input type="checkbox" name="viaEntrada3" class="viaEntrada" onclick="validarCheck(viaEntrada3)" value="viaEntrada3"> Redes Sociales 
                        <input type="checkbox" name="viaEntrada4" class="viaEntrada" onclick="validarCheck(viaEntrada4)" value="viaEntrada4"> Amigo 
                    </label>
                    <br><br>
                    <input id="btnVotar" type="submit" value="Votar">
                    </form>
        </div>
    </body>
</html>

<script type="text/javascript">

//Funciones

//Validando que el correo sea de formato XXXXX@XXXX.XXX
    $(document).ready(function() {
            $('#formulario').submit(function(){
                if($("#Email").val().indexOf('@', 0) == -1 || $("#Email").val().indexOf('.', 0) == -1) {
                    alert('El correo electrónico introducido no es correcto.');
                    return false;
                }
            });
        });

//Rellenando los Combobox de Comuna filtrado por Region    
    $(document).ready(function(){
        recargarSelect();
        $('#Region').change(function(){
                recargarSelect();
        });
    })

    function recargarSelect(){
        $.ajax({
            type:"POST",
            url:"listar.php",
            data:"region=" + $('#Region').val(),
            success:function(r){
                $('#Comuna').html(r);
            }
        });
    }

//Variables funcion validarCheck()
    var minCheck=2;
    var contador=0;

//Validando la cantidad de Checkbox seleccionados
    function validarCheck(check) {
        if (check.checked==true){
            contador++;
            }
        if (check.checked==false){
            contador--;
        }
    };

//Validando que se hayan seleccionado minimo 2 Checkbox
$("#formulario").submit(function(){
        if (contador>=minCheck){
            return true;
        }
        else{
            alert('Debe seleccionar al menos 2 casillas');
            return false;
        }
    });

//Validando el formato del Rut (XXXXXXXX-X)
    var Fn = {
    validaRut : function (rutCompleto) {
        rutCompleto = rutCompleto.replace("‐","-");
            if (!/^[0-9]+[-|‐]{1}[0-9kK]{1}$/.test(rutCompleto))
                return false;
        var tmp 	= rutCompleto.split('-');
        var digv	= tmp[1]; 
        var rut 	= tmp[0];
            if ( digv == 'K' ) digv = 'k' ;
                return (Fn.dv(rut) == digv );
    },
    dv : function(T){
        var M=0,S=1;
        for(;T;T=Math.floor(T/10))
            S=(S+T%10*(9-M++%6))%11;
        return S?S-1:'k';
    }
    }

//Validando el Rut
    $("#formulario").submit(function(){
        if (Fn.validaRut( $("#Rut").val() )){
            return true;
        } else {
            alert("Rut invalido");
            return false;
        }
    });
    
//Validando que el Combobox region no este vacio
    $("#formulario").submit(function (){
        if($("#Region").val()==0){
            alert("Debe escoger una región");
            return false;
        }
        return true;
    });

//Validando que el Combobox comuna no este vacio
    $("#formulario").submit(function (){
        if($("#Comuna").val()==0){
            alert("Debe escoger una comuna");
            return false;
        }
        return true;
    });

//Validando que el Combobox candidato no este vacio
    $("#formulario").submit(function (){
        if($("#Candidato").val()==0){
            alert("Debe escoger un candidato");
            return false;
        }
        return true;
    });

//Validando que el Alias tenga minimo 5 caracteres
    $("#formulario").submit(function () {  
        if($("#Alias").val().length < 5) {  
            alert("El alias debe tener como mínimo 5 caracteres");  
            return false;  
        }  
    return true;  
    });

//Validando que el Alias tenga solo numeros y letras
    $("#formulario").submit(function(){
        if(/^(?=.*[a-zA-Z])(?=.*\d)[a-zA-Z\d]+$/.test($("#Alias").val())){
            return true;
        }else{
            alert('El alias debe tener solo numeros y letras')
            return false;
        }
    });  
</script>