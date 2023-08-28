<?php

session_start();
include_once("\wamp64\www\ProyectoFarmacia\clases\claseConexion.php");

if (empty($_POST["correo"]) || empty($_POST["contraseña"])) {
           if (isset( $_SESSION['usuario'])) {
            $objeto = new conexion();
            $user = $objeto->Verificar($_SESSION['usuario'], $_SESSION['contraseña']);
            if (empty($user)) {
        
                header("location: /paginas/paginaRegistro/registro.php");
            } else {
                $correoUser = $user['correoelectronico'];
                $contraseñaUser = $user['contrasena'];
                $codigoUser = $user['codigocliente'];
                $_SESSION['usuario']= $user['correoelectronico'];
                $_SESSION['contraseña']= $user['contrasena'];
                
                
                    
                $soyAdmi = false;
                
                if ($correoUser == "administrador@gmail.com" && $contraseñaUser == "12345") {
                // echo "Soy admi";
                    $soyAdmi = true;
                } else {
                    //echo "No soy admi";
                    $soyAdmi = false;
                }

                
            }
           } else {
            
            header("location: ../index.php");           }
           
        //echo "Codigo vacio";
       
} else {
            //echo "Si1";
            $correo = $_POST["correo"];
            $contraseña = $_POST["contraseña"];
            $objeto = new conexion();
            $user = $objeto->Verificar($correo, $contraseña);
            if (empty($user)) {
                header("location: /paginas/paginaRegistro/registro.php");
            } else {
                $correoUser = $user['correoelectronico'];
                $contraseñaUser = $user['contrasena'];
                $codigoUser = $user['codigocliente'];
                $_SESSION['usuario']= $user['correoelectronico'];
                $_SESSION['contraseña']= $user['contrasena'];
                
            }
        
               
                    
                $soyAdmi = false;
               
                if ($correoUser == "administrador@gmail.com" && $contraseñaUser == "12345") {
                // echo "Soy admi";
                    $soyAdmi = true;
                } else {
                    //echo "No soy admi";
                    $soyAdmi = false;
                }

                
            }
            

     
?>
