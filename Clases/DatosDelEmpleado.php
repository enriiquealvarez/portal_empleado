<?php
    
    class DatosDelEmpleado
    {   
        //Datos generales del empleado a buscar para reporte de las declraraciones
        public $EnlaceEmpleado=''; 
        public $NombreEmpleado=''; 
        public $EstadoDeclaracionEmpleado=''; 
        public $RFCEmpleado='';
        public $resultadoArreglo='';
        public $resultadoArregloResguardo='';

        //Respuesta de inicio de sesión
        public $ControlDeRespuesta='';
        public $Mensaje='';

        //Variables de los permisos del sistema
        public $Sistema1=''; 
        public $Sistema2=''; 
        public $Sistema3=''; 
        public $Sistema4=''; 
        public $Sistema5=''; 
        public $Sistema6=''; 
        public $Sistema7=''; 
        public $Sistema8=''; 

       //Variables del rol del empleado
        public $Rol1='';
        public $Rol2='';
        public $Rol3='';
        public $Rol4='';
        public $Rol5='';
        public $Rol6='';
        public $Rol7='';
        public $Rol8='';

        //Variables de las acciones que tiene permiso el usuario
        public $Accion1='';
        public $Accion2='';


        //Variables del resguardo de equipos informaticos del empleado
        public $Descripcion='';
        public $Marca='';
        public $Modelo='';
        public $Serie='';
        public $Inventario='';
        public $Tipo_resguardo='';
        public $Estado='';
        public $Ubicacion='';
        public $Observaciones='';
        public $Alta='';


        //Funcion para obtener los datos del empleado a buscar (editar, eliminar, visualizar)
        public function DatosGeneralesEmpleados($idEmpleado)
        {
            include('conexion.php');
            $sqlSelectDatosEmpleado= "SELECT u.id, u.link As Enlace, CONVERT(CONCAT(u.nombre, ' ',u.paterno, ' ',u.materno) USING utf8) AS Empleado, IF(s.closed=2, 'Terminada', 'Pendiente') As Estado
                                        FROM users u
                                        INNER JOIN statements s ON u.id=s.user_id 
                                        WHERE u.link=".$idEmpleado;

            $resultadoArreglo = $mysqlilocal->query($sqlSelectDatosEmpleado);
            $ArregloDatosObtenidos = $resultadoArreglo->fetch_assoc();

            $this->EnlaceEmpleado= $ArregloDatosObtenidos['Enlace'];
            $this->NombreEmpleado= $ArregloDatosObtenidos['Empleado'];
            $this->EstadoDeclaracionEmpleado= $ArregloDatosObtenidos['Estado'];
        }

        //Funcion ppara buscar el correo ingresado al iniciar sesión y validar si existe
        public function DatosInicoDeSesion($email, $password)
        {
            include('conexion.php');
            $sqlUsuarioAbuscar= "SELECT id, contrasena, tipo_usuario, fk_enlace, correo_electronico FROM empleado WHERE correo_electronico= '$email'";

            $resultadoBusquedaDeUsuario = $mysqli->query($sqlUsuarioAbuscar);
            $row= $resultadoBusquedaDeUsuario->fetch_assoc();
            $Usuario = $row['id'];

            if($Usuario>0)
            {
                
                $contraseña_bd = $row['contrasena'];
                //contr_c (variable que significa Contraseña de cifrado, la cual con 'sha1' vamos a cifrar para proteger dicha contraseña)
                $contr_c = sha1($password);

                if($contraseña_bd == $contr_c)
                {
                    session_start();
                    $_SESSION['id']=$row['id'];
                    $_SESSION['nombre']=$row['nombre'];
                    $_SESSION['apellidos']=$row['apellidos'];
                    $_SESSION['tipo_usuario']=$row['tipo_usuario'];
                    $_SESSION['rfc']=$row['rfc'];
                    $_SESSION['fk_enlace']=$row['fk_enlace'];
                    header("Location: nominas.php");
                }else
                {
                    $this->ControlDeRespuesta='1';
                    $this->Mensaje='La contraseña no existe o es incorrecta';
                }
            }else
            {   
                $this->ControlDeRespuesta='2';
                $this->Mensaje='El Usuario no existe o es incorrecto';
            }
        }

        //Obtener los permsiso del empleado para el sistema
        public function PermisosUsoSistema($enlace)
        {
            include('conexion.php');
            $sqlPermisos= "SELECT sistema_1, sistema_2, sistema_3, sistema_4, sistema_5, sistema_6, sistema_7, sistema_8,
            rol_1, rol_2, rol_3, rol_4, rol_5, rol_6, rol_7, rol_8,
            accion_1, accion_2
            FROM empleado WHERE fk_enlace='$enlace' LIMIT 1";

            $resultadoPermiso = $mysqli->query($sqlPermisos);
            $ArregloDeLosPermisos = $resultadoPermiso->fetch_assoc();
            
            //Resultados de los permisos de sistema 
            $this->Sistema1 = $ArregloDeLosPermisos['sistema_1'];
            $this->Sistema2 = $ArregloDeLosPermisos['sistema_2'];
            $this->Sistema3 = $ArregloDeLosPermisos['sistema_3'];
            $this->Sistema4 = $ArregloDeLosPermisos['sistema_4'];
            $this->Sistema5 = $ArregloDeLosPermisos['sistema_5'];
            $this->Sistema6 = $ArregloDeLosPermisos['sistema_6'];
            $this->Sistema7 = $ArregloDeLosPermisos['sistema_7'];
            $this->Sistema8 = $ArregloDeLosPermisos['sistema_8'];

            //Resultados de los perimos de Rol
            $this->Rol1 = $ArregloDeLosPermisos['rol_1'];
            $this->Rol2 = $ArregloDeLosPermisos['rol_2'];
            $this->Rol3 = $ArregloDeLosPermisos['rol_3'];
            $this->Rol4 = $ArregloDeLosPermisos['rol_4'];
            $this->Rol5 = $ArregloDeLosPermisos['rol_5'];
            $this->Rol6 = $ArregloDeLosPermisos['rol_6'];
            $this->Rol7 = $ArregloDeLosPermisos['rol_7'];
            $this->Rol8 = $ArregloDeLosPermisos['rol_8'];
                        
            //Resultados de los permiso de acciones
            $this->Accion1= $ArregloDeLosPermisos['accion_1'];
            $this->accion2= $ArregloDeLosPermisos['accion_2'];
   
        }

        //Obtener información de todos los trabajadores, Nombre, RFC, XML, Nóminas
        public function DatosTodosLosEmpleados()
        {
            include('conexion.php');
            $sql= "SELECT id_cfdi, emp_rfc AS RFC, fk_empleado AS Enlace, CONVERT(CONCAT(emp_nombres, ' ', emp_paterno, ' ', emp_materno) USING utf8) 
            AS Empleado, cfdi_fecha_timbrado, cfdi_mensaje, nom_concepto, cfdi_xml_cfdi, cfdi_pdf_timbrado FROM pri_cfdi 
            INNER JOIN pri_nomina  ON fk_nomina = id_nom_nomina 
            INNER JOIN pri_empleado ON fk_empleado = id_emp_empleado where cfdi_cancelado=0";
            
            $resultadoArreglo = $mysqli->query($sql);
            $this->resultadoArreglo=$mysqli->query($sql);
            $ArregloDatosObtenidos= $resultadoArreglo->fetch_assoc();

            $this->EnlaceEmpleado= $ArregloDatosObtenidos['Enlace'];
            $this->NombreEmpleado= $ArregloDatosObtenidos['Empleado'];
            $this->RFCEmpleado= $ArregloDatosObtenidos['RFC'];
        }

        //Obtener información del trabajador que inició sesión, Nombre, RFC, XML, Nóminas
        public function DatosEmpleadoNominas($enlace)
        {
            include('conexion.php');
            $sql= "SELECT id_cfdi, emp_rfc AS RFC, fk_empleado, CONVERT(CONCAT(emp_nombres, ' ', emp_paterno, ' ', emp_materno) USING utf8) 
            AS Empleado, cfdi_fecha_timbrado, cfdi_mensaje, nom_concepto, cfdi_xml_cfdi, cfdi_pdf_timbrado FROM pri_cfdi 
            INNER JOIN pri_nomina  ON fk_nomina = id_nom_nomina 
            INNER JOIN pri_empleado ON fk_empleado = id_emp_empleado where cfdi_cancelado=0 AND fk_empleado=$enlace";
    
            $resultadoArreglo = $mysqli->query($sql);
            $this->resultadoArreglo=$mysqli->query($sql);
            $ArregloDatosObtenidos  = $resultadoArreglo->fetch_assoc();

            $this->EnlaceEmpleado= $enlace;
            $this->NombreEmpleado= $ArregloDatosObtenidos['Empleado'];
            $this->RFCEmpleado= $ArregloDatosObtenidos['RFC'];
        }

        //Obtener los datos del resguardo de equipos del Empleado
        public function DatosResguardoEquiposInformaticos($enlace)
        {
            include('conexion.php');
            $sql= "SELECT descripcion_tipoequipo AS Descripcion, nombre_marca AS Marca, Modelo, Serie, Inventario, ubicacion_nombre AS Ubicacion, 
            fecha_alta AS Alta, resguardo_nombre AS 'Tipo de Resguardo', Estado_bien_informatico AS Estado, Observacion
            FROM cat_equipos_informaticos 
            INNER JOIN monitor_tipo_equipos ON fk_tipo = id_tip_tipoequipo
            INNER JOIN monitor_marca ON  fk_marca = id_mar_marca
            INNER JOIN resguardo ON  fk_equipo = id_equipo
            INNER JOIN cat_ubicacion ON  fk_ubicacion = id_ubicacion
            INNER JOIN pri_empleado ON  id_emp_empleado = fk_empleado
            INNER JOIN cat_resguardo ON  id_tipo_resguardo = fk_resguardo
            WHERE estado =1 AND fk_empleado =$enlace";
    
            $resultadoArreglo = $mysqli->query($sql);
            $this->resultadoArregloResguardo=$mysqli->query($sql);
            $ArregloDatosObtenidos  = $resultadoArreglo->fetch_assoc();

            $this->EnlaceEmpleado= $enlace;
            $this->Descripcion= $ArregloDatosObtenidos['Descripcion'];
            $this->Marca= $ArregloDatosObtenidos['Marca'];
            $this->Modelo= $ArregloDatosObtenidos['Modelo'];
            $this->Serie= $ArregloDatosObtenidos['Serie'];
            $this->Inventario= $ArregloDatosObtenidos['Inventario'];
            $this->Tipo_resguardo= $ArregloDatosObtenidos['Tipo de Resguardo'];
            $this->Estado= $ArregloDatosObtenidos['Estado'];
            $this->Ubicacion= $ArregloDatosObtenidos['Ubicacion'];
            $this->Observaciones= $ArregloDatosObtenidos['Observacion'];
            $this->Alta= $ArregloDatosObtenidos['Alta'];
        }
    }
?>
