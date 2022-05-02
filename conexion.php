<?php

class Conexion{

    public function conectar(){
        $conexion = mysqli_connect("localhost", "root", "", "geodata");
        if(!$conexion){
            die("Error en la conexion a la base de datos".mysqli_connect_error());
        }
        return $conexion;
    }

    public function crearTabla(){
        $tabla = "info_data";
        $sql = "CREATE TABLE IF NOT EXISTS `$tabla` (
            `id` INT NOT NULL AUTO_INCREMENT,
            `ip` VARCHAR(20) NULL,
            `fecha_registro` TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP,
            `pais` VARCHAR(50) NULL,
            `region` VARCHAR(50) NULL,
            `ciudad` VARCHAR(50) NULL,
            `codigo_pais` VARCHAR(50) NULL,
            `latitud` VARCHAR(50) NULL,
            `longitud` VARCHAR(50) NULL,
            `codigo_postal` VARCHAR(50) NULL,
            `zona_horaria` VARCHAR(50) NULL,
            `isp` VARCHAR(255) NULL,
            `dominio` VARCHAR(255) NULL,
            `net_speed` VARCHAR(50) NULL,
            `codigo_area` VARCHAR(50) NULL,
            `mcc` VARCHAR(50) NULL,
            `mnc` VARCHAR(50) NULL,
            `empresa` VARCHAR(50) NULL,
            `tipo` VARCHAR(50) NULL,
            PRIMARY KEY (`id`))
            ENGINE = InnoDB;";
        mysqli_query($this->conectar(), $sql);
    }

    public function guardarDatos($json,$ip){
        $tabla = "info_data";
        $sql = "INSERT INTO `$tabla` (`ip`, `pais`, `region`, `ciudad`, `codigo_pais`, `latitud`, `longitud`, `codigo_postal`, `zona_horaria`, `isp`, `dominio`, `net_speed`, `codigo_area`, `mcc`, `mnc`, `empresa`, `tipo`) VALUES ('".$ip."', '".$json['country_name']."', '".$json['region_name']."', '".$json['city_name']."', '".$json['country_code']."', '".$json['latitude']."', '".$json['longitude']."', '".$json['zip_code']."', '".$json['time_zone']."', '".$json['isp']."', '".$json['domain']."', '".$json['net_speed']."', '".$json['idd_code'] ." - ".$json['area_code']."', '".$json['mcc']."', '".$json['mnc']."', '".$json['mobile_brand']."', '".$json['usage_type']."');";
        mysqli_query($this->conectar(), $sql);
    }
}
