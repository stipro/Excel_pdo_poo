<?php 
include('conexion.php');
$jtabla=$_POST['mydata'];
try 
    {
       
        $tabla=json_decode($jtabla);
        //var_dump ($tabla);
        $ejecutar = "";
    

        $nuevoUsuario = $conexion -> prepare("INSERT INTO avance_vendedor (zona, vendedor, v_bruta,  n_credito, n_neta, cuota, porcentaje, t_clientes, cobertura, cobrado, t_x_cobrar, morosidad, moroso) 
        VALUES (
            :selection_0,
            :selection_1,
            :selection_3,
            :selection_4,
            :selection_5,
            :selection_6,
            :selection_7,
            :selection_8,
            :selection_9,
            :selection_10,
            :selection_11,
            :selection_12)");
        $nuevoUsuario -> bindParam(':selection_0', $character->Selection0, PDO::PARAM_STR);
        $nuevoUsuario -> bindParam(':selection_1', $character->Selection1, PDO::PARAM_STR);
        $nuevoUsuario -> bindParam(':selection_2', $character->Selection2, PDO::PARAM_STR);
        $nuevoUsuario -> bindParam(':selection_3', $character->Selection3, PDO::PARAM_STR);
        $nuevoUsuario -> bindParam(':selection_4', $character->Selection4, PDO::PARAM_STR);
        $nuevoUsuario -> bindParam(':selection_5', $character->Selection5, PDO::PARAM_STR);
        $nuevoUsuario -> bindParam(':selection_6', $character->Selection6, PDO::PARAM_STR);
        $nuevoUsuario -> bindParam(':selection_7', $character->Selection7, PDO::PARAM_STR);
        $nuevoUsuario -> bindParam(':selection_8', $character->Selection8, PDO::PARAM_STR);
        $nuevoUsuario -> bindParam(':selection_9', $character->Selection9, PDO::PARAM_STR);
        $nuevoUsuario -> bindParam(':selection_10', $character->Selection10, PDO::PARAM_STR);
        $nuevoUsuario -> bindParam(':selection_11', $character->Selection11, PDO::PARAM_STR);
        $nuevoUsuario -> bindParam(':selection_12', $character->Selection12, PDO::PARAM_STR);
 
    foreach ($tabla as $character) 
        {
            $ejecutar = $nuevoUsuario -> execute(); 
        }
    } 
catch (PDOException $error) 
    { /// MENSAJE POR SI SURGE ALGÚN ERROR
         print 'ERROR: '. $error->getMessage();
         $mensaje='<div class="alert alert-danger alert-dismissable col-md-offset-4 col-md-3 text-center">
         <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
         <strong>ERROR AL REGISTRAR DATOS</strong></div>';
    }
    if($ejecutar) // MENSAJE DE EXITO
    {
       $mensaje='<div class="alert alert-success alert-dismissable col-md-offset-4 col-md-3 text-center">
       <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
       <strong>DATOS REGISTRADO CORRECTAMENTE</strong></div>';
    }
    ?>
