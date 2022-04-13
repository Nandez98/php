<?php
    session_start();
    $host="localhost";
    $user="user_cli";
    $password="Cliente1!";        
    $database="conexiones_clientes";
    @$mysqli=new mysqli($host,$user,$password,$database);
        
    if($mysqli->connect_errno){
        echo "<p>El error ".$mysqli->connect_error." conectando a la base de datos tienda.";
    }

    $consulta_empresas="select NOMBRE from empresas";
    $result=$mysqli->query($consulta_empresas);
    $sw=0;
?>

<html>
    <head>CONEXION A CLIENTES</head>
    <body>
        <div name="botones">
            <fieldset title="CONEXIÓN E INSERCCIÓN CLIENTES">
                <form action="<?php echo $_SERVER["PHP_SELF"];?>" method="POST">
                    <p>
                        Ver datos empresa:
                        <select name="datos_emp" id="datos_emp">
                            <?php
                                while($consulta=$result->fetch_array()){
                                echo "<option value=".$consulta['NOMBRE']." selected>".$consulta['NOMBRE']."</option>";
                                }
                            ?>
                        </select>
                        <input type="Submit" id="datos_empresa" name="datos_empresa" value="Mostrar datos"/>
                    </p>
                    <p>
                        Nueva empresa: <input type="text" id="nombre_emp" name="nombre_emp"/>
                        <input type="submit" id="ins_emp" name="ins_emp" value="Insertar"/>
                    </p>
                    <P>
                        Borrar empresa: <input type="text" id="nom_emp" name="nom_emp"/>
                        <input type="submit" id="borrar_emp" name="borrar_emp" value="Borrar"/>
                    </P>
                    <p>
                        Modificar conexión: <input type="text" id="nom_mod" name="nom_mod"/>
                        <input type="submit" id="ins_con" name="ins_con" value="Insertar"/>
                        <input type="submit" id="mod_con" name="ins_con" value="Modificar"/>
                        <input type="submit" id="eli_con" name="ins_con" value="Eliminar"/>
                    </p>
                </form>
            </fieldset>
        </div>
    <!-- INSERCIÓN DE EMPRESAS -->
    <?php if((isset($_POST['ins_emp']) && $_POST['nombre_emp'])){ 
        $_SESSION['nombre_emp']=ucfirst($_POST['nombre_emp']);
    ?>

        <div name="comp_emp">
            <fieldset title="NUEVA EMPRESA">
                <form action="<?php echo $_SERVER["PHP_SELF"];?>" method="POST">
                    <p>
                        <value for="web">Web: </value>
                        <input type="text" name="web" id="web"/>
                    </p>
                    <p>
                        <value for="contacto">Contacto: </value>
                        <input type="text" name="contacto" id="contacto"/> (se puede añadir junto al nombre del contacto)
                    </p>
                    <p>
                        <value for="contacto2">Segundo contacto: </value>
                        <input type="text" name="contacto2" id="contacto2"/>
                    </p>
                    <p>
                        <value for="mail">Mail:</value>
                        <input type="text" name="mail" id="mail"/>
                    </p>
                    -------------------------------------------------------------------------</br>
                    <p>
                        <value for="comp_emp">Guardar: </value><input type="submit" name="comp_emp" id="comp_emp" value="ENVIAR"/>         
                        <value for="limpiar">Limpiar formulario: </value><input type="reset" name="limpiar" id="limpiar" value="LIMPIAR"/>
                    </p>
                </form>
            </fieldset>
        </div>
    
    <?php } 
        # INSERCCIÓN DE DATOS EN LA TABLA EMPRESAS

    if(isset($_POST['comp_emp'])){

        if(isset($_POST['web'])){
            $_SESSION['$web']=$_POST['web'];
        }else{
            $_SESSION['$web']='';
        }

        if(isset($_POST['contacto'])){
            $_SESSION['$contacto']=$_POST['contacto'];
        }else{
            $_SESSION['$contacto']='';
        }

        if(isset($_POST['contacto2'])){
            $_SESSION['$contacto2']=$_POST['contacto2'];
        }else{
            $_SESSION['$contacto2']='';
        }

        if(isset($_POST['mail'])){
            $_SESSION['$mail']=$_POST['mail'];
        }else{
            $_SESSION['$mail']='';
        }
    
        echo "<fieldset title='NUEVA EMPRESA'>";
        echo "La empresa tiene los siguientes campos: </br>";
        echo "NOMBRE: ".$_SESSION['nombre_emp'];
        if($_SESSION['$web'] != ''){echo " - WEB: ". $_SESSION['$web'];}
        if($_SESSION['$contacto'] != ''){echo " - CONTACTO: ". $_SESSION['$contacto'];}
        if($_SESSION['$contacto2'] != ''){echo " - CONTACTO 2: ". $_SESSION['$contacto2'];}
        if($_SESSION['$mail'] != ''){echo " - MAIL: ". $_SESSION['$mail']."</br>";}        
    ?>  

        <form method="POST">
            <value for="insertar_emp">Guardar: </value><input type="submit" name="insertar_emp" id="insertar_emp" value="Confirmar"/>
        </form>

    <?php
        echo "</fieldset>";
        }
        if(isset($_POST['insertar_emp'])){
            $insertar_empresa="insert into empresas(NOMBRE, WEB, CONTACTO, CONTACTO2, MAIL) values('".$_SESSION['nombre_emp']."','".$_SESSION['$web']."','".$_SESSION['$contacto']."','".$_SESSION['$contacto2']."','".$_SESSION['$mail']."')";
            $mysqli->query($insertar_empresa);
            echo "La empresa: <b>".$_SESSION['nombre_emp']."</b> se ha añadido correctamente.";
        }
        # FIN INSERCCIÓN EMPRESAS
        # INICIO BORRADO DE EMPRESAS
        if(isset($_POST['borrar_emp']) && $_POST['nom_emp']){
            $_SESSION['nombre_borrar_emp']=$_POST['nom_emp'];
            $borrar_empresa_datos="select * from empresas where NOMBRE='".$_SESSION['nombre_borrar_emp']."';";
            $result=$mysqli->query($borrar_empresa_datos);
            echo "<fieldset name='Borrado empresa'>";
                echo "Los datos de la empresa que vas a borrar son:</br>";
                while($row=$result->fetch_array()){
                    echo "Nombre: ".$row['NOMBRE']." - Web: ".$row['WEB']." - Contacto: ".$row['CONTACTO']." - Contacto2: ".$row['CONTACTO2']." - Mail: ".$row['MAIL']."</br>";
                ?>
                <form method="POST">
                    <input type="submit" name="conf_borrar" id="conf_borrar" value="Confirmar borrado"/>
                </form>
        <?php
                }
        }
        if(isset($_POST['conf_borrar'])){
            $conf_borrar_empresa="delete from empresas where NOMBRE like '".$_SESSION['nombre_borrar_emp']."';";
            $mysqli->query($conf_borrar_empresa);
            echo "La empresa: <b>".$_SESSION['nombre_borrar_emp']."</b> se ha borrado correctamente.";        
            echo "</fieldset>";
        }
        # FIN BORRADO DE EMPRESAS
        # INICIO MOSTRAR DATOS EMPRESA
        if(isset($_POST['datos_empresa'])){
        echo "<fieldset title='DATOS EMPRESA'>";
            $_SESSION['datos_emp']=$_POST['datos_emp'];
            $cons_datos_empresa="select * from empresas where NOMBRE='".$_SESSION['datos_emp']."';";
        ?>
        <h2>DATOS EMPRESA</h2>
        <table border="1">
            <tr>
                <th>NOMBRE</th><th>WEB</th><th>CONTACTO</th><th>CONTACTO2</th><th>MAIL</th>
            </tr>
        <?php
            $result=$mysqli->query($cons_datos_empresa);
            while($row=$result->fetch_array()){
                echo "<tr>";
                echo "<td>".$row['NOMBRE']."</td>"."<td>".$row['WEB']."</td>"."<td>".$row['CONTACTO']."</td>"."<td>".$row['CONTACTO2']."</td>"."<td>".$row['MAIL']."</td>";
            }
        echo "</table>";
        ?>
        </br>
        </br>
        <h2>DATOS CONEXIONES</h2>
        <table border="1">
            <tr>
                <th>NOMBRE</th><th>TIPO_CONEXIÓN</th><th>DIRECCIÓN</th><th>DIRECCIÓN 2</th><th>PUERTO</th><th>USUARIO</th><th>CONTRESEÑA</th><th>OTRA_INFORMACIÓN</th>
            </tr>
    <?php
        $cons_datos_conexiones="select * from conexiones where NOMBRE='".$_SESSION['datos_emp']."';";
        $result=$mysqli->query($cons_datos_conexiones);
        while($row=$result->fetch_array()){
            echo "<tr>";
            echo "<td>".$row['NOMBRE']."</td><td>".$row['TIPO_CONEXION']."</td><td>".$row['DIRECCION']."</td><td>".$row['DIRECCION2']."</td><td>".$row['PUERTO']."</td><td>".$row['USUARIO']."</td><td>".$row['CONTRASEÑA']."</td><td>".$row['OTRA_INFORMACION']."</td>";
        }
        echo "</fieldset>";
        }



        # FIN MOSTRAR DATOS EMPRESA
        # INICIO CREAR / MODIFICAR /ELIMINAR CONEXIÓN
        if((isset($_POST['ins_con'])) || (isset($_POST['mod_con'])) || (isset($_POST['eli_con']))){
            $consult_emp="select NOMBRE from empresas where NOMBRE='".$_POST['nom_mod']."';";
            $nombre_empresa=$mysqli->query($consult_emp);
            $nom_emp=$nombre_empresa->fetch_array();
            $nom_emp2= ucfirst($_POST['nom_mod']);

            if($nom_emp['NOMBRE'] == $nom_emp2){
                if(isset($_POST['ins_con'])){
                    $sw=1;
                    $_SESSION['nom_mod']=$nom_emp2;
                }
                if(isset($_POST['mod_con'])){
                    $sw=2;
                    $_SESSION['nom_mod']=$nom_emp2;
                }
                if(isset($_POST['eli_con'])){
                    $sw=3;
                    $_SESSION['nom_mod']=$nom_emp2;
                }
            }
        }
        # INSERCCIÓN DE CAMPOS
        if($sw == 1){ ?>
        <fieldset title="INSERTAR NUEVA CONEXIÓN">
            <form method="POST">

                <p>
                    <value for="mod_tipcon">Tipo de conexión: </value>
                    <input type="text" name="mod_tipcon" id="mod_tipcon"/>
                </p>   
                <p>
                    <value for="mod_direccion">Dirección: </value>
                    <input type="text" name="mod_direccion" id="mod_direccion"/>
                </p>   
                <p>
                    <value for="mod_direccion2">Dirreción 2: </value>
                    <input type="text" name="mod_direccion2" id="mod_direccion2"/>
                </p>   
                <p>
                    <value for="mod_puerto">Puerto: </value>
                    <input type="text" name="mod_puerto" id="mod_puerto"/>
                </p>   
                <p>
                    <value for="mod_usuario">Usuario: </value>
                    <input type="text" name="mod_usuario" id="mod_usuario"/>
                </p>   
                <p>
                    <value for="mod_contraseña">Contraseña: </value>
                    <input type="text" name="mod_contraseña" id="mod_contraseña"/>
                </p>   
                <p>
                    <value for="mod_informacion">Comentario: </value>
                    <textarea name="mod_informacion" id="mod_informacion" rows="5" cols="40"></textarea>
                </p>   
                <P>
                    <input type="submit" name="mod_conf" id="mod_conf" value="Guardar"/>
                    <input type="reset" name="mod_borr" id="mod_borr" value="Limpiar"/>
                </P>
            </form>
        </fieldset>

    <?php
        }
        if(isset($_POST['mod_conf'])){
            if(isset($_POST['mod_tipcon'])){$_SESSION['mod_tipcon']=$_POST['mod_tipcon'];}else{$_SESSION['mod_tipcon']='';}
            if(isset($_POST['mod_direccion'])){$_SESSION['mod_direccion']=$_POST['mod_direccion'];}else{$_SESSION['mod_direccion']='';}
            if(isset($_POST['mod_direccion2'])){$_SESSION['mod_direccion2']=$_POST['mod_direccion2'];}else{$_SESSION['mod_direccion2']='';}
            if(isset($_POST['puerto'])){$_SESSION['puerto']=$_POST['puerto'];}else{$_SESSION['puerto']='';}
            if(isset($_POST['mod_usuario'])){$_SESSION['mod_usuario']=$_POST['mod_usuario'];}else{$_SESSION['mod_usuario']='';}
            if(isset($_POST['mod_contraseña'])){$_SESSION['mod_contraseña']=$_POST['mod_contraseña'];}else{$_SESSION['mod_contraseña']='';}
            if(isset($_POST['mod_informacion'])){$_SESSION['mod_informacion']=$_POST['mod_informacion'];}else{$_SESSION['mod_informacion']='';}

            var_dump($_SESSION);
            $ins_conexion="insert into conexiones(NOMBRE,TIPO_CONEXION,DIRECCION,DIRECCION2,PUERTO,USUARIO,CONTRASEÑA,OTRA_INFORMACION) VALUES('".$_SESSION['nom_mod']."','".$_SESSION['mod_tipcon']."','
            ".$_SESSION['mod_direccion']."','".$_SESSION['mod_direccion2']."','".$_SESSION['mod_puerto']."','".$_SESSION['mod_usuario']."','".$_SESSION['mod_contraseña']."','".$_SESSION['mod_informacion']."');";
            $mysqli->query($ins_conexion);

            echo "La insercción de conexión en la empresa: <b>".$nom_emp['NOMBRE']."</b> se ha realizado correctamente.";
        }
        
    # FIN INSERCCIÓN DE CAMPOS
    # INICIO MODIFICAR DATOS
    if($sw=2){
        echo "<fieldset title='MODIFICAR CONEXIÓN'>";
        $mod_cons_datos="select * from conexiones where NOMBRE='".$nom_emp."';";
        $mod_cons_datos_array=$mysqli->query($mod_cons_datos);
        echo "<form action='POST'>";
        echo "Selecciona el tipo de conexion: ";
        while($row=$mod_cons_datos_array->fetch_array()){
            echo "<select name='mod_con' id='mod_con'>";
            echo "<option value=".$row['tipo_conexion']." selected>".$row['tipo_conexion']."</option>";
            echo "</select>";
        }
        echo "<input type='submit' id='mod_con' name='mod_con' value='Seleccionar'/>";
        echo "</form>";

        if(isset($_POST['mod_con'])){
            $mod_cons_tipo="select * from conexiones where NOMBRE='".$nom_emp."' and TIPO_CONEXION='".$row['tipo_conexion']."';";
            $mod_cons_tipo_array=$mysqli->query($mod_cons_tipo);

            echo "<table><tr><th>DIRECCIÓN</th><th>DIRECCIÓN 2</th><th>PUERTO</th><th>USUARIO</th><th>CONTRESEÑA</th><th>OTRA INFORMACIÓN</th></tr>";
            while($row=$mod_cons_tipo_array->fetch_array()){
                echo "<tr><td>".$row['DIRECCION']."</td><td>".$row['DIRECCION2']."</td><td>".$row['PUERTO']."</td><td>".$row['USUARIO']."</td><td>".$row['CONTRASEÑA']."</td><td>".$row['OTRA_INFORMACION']."</td></tr>";
            }
            echo "</table>";
        ?>
        <form action="POST">
            <p>
                <value for="mod_direccion">Dirección: </value>
                <input type="text" name="mod_direccion" id="mod_direccion"/>
            </p>   
            <p>
                <value for="mod_direccion2">Dirreción 2: </value>
                <input type="text" name="mod_direccion2" id="mod_direccion2"/>
            </p>   
            <p>
                <value for="mod_puerto">Puerto: </value>
                <input type="text" name="mod_puerto" id="mod_puerto"/>
            </p>   
            <p>
                <value for="mod_usuario">Usuario: </value>
                <input type="text" name="mod_usuario" id="mod_usuario"/>
            </p>   
            <p>
                <value for="mod_contraseña">Contraseña: </value>
                <input type="text" name="mod_contraseña" id="mod_contraseña"/>
            </p>   
            <p>
                <value for="mod_informacion">Comentario: </value>
                <textarea name="mod_informacion" id="mod_informacion" rows="5" cols="40"></textarea>
            </p>   
            <P>
                <input type="submit" name="mod_conf" id="mod_conf" value="Guardar"/>
                <input type="reset" name="mod_borr" id="mod_borr" value="Limpiar"/>
                </P>
        </form>
        <?php
            if(isset($_POST['mod_conf'])){
            if(isset($_POST['mod_tipcon'])){$_SESSION['mod_tipcon']=$_POST['mod_tipcon'];}else{$_SESSION['mod_tipcon']='';}
            if(isset($_POST['mod_direccion'])){$_SESSION['mod_direccion']=$_POST['mod_direccion'];}else{$_SESSION['mod_direccion']='';}
            if(isset($_POST['mod_direccion2'])){$_SESSION['mod_direccion2']=$_POST['mod_direccion2'];}else{$_SESSION['mod_direccion2']='';}
            if(isset($_POST['puerto'])){$_SESSION['puerto']=$_POST['puerto'];}else{$_SESSION['puerto']='';}
            if(isset($_POST['mod_usuario'])){$_SESSION['mod_usuario']=$_POST['mod_usuario'];}else{$_SESSION['mod_usuario']='';}
            if(isset($_POST['mod_contraseña'])){$_SESSION['mod_contraseña']=$_POST['mod_contraseña'];}else{$_SESSION['mod_contraseña']='';}
            if(isset($_POST['mod_informacion'])){$_SESSION['mod_informacion']=$_POST['mod_informacion'];}else{$_SESSION['mod_informacion']='';}
            }
        }
    }    
    ?>
    </body>
</html>