<?php
if(!file_exists("data.csv")) generar_csv();
if(file_exists("data.csv")) leer_csv();


function leer_csv(){
    $archivo = fopen("data.csv", "r");
    $data = array();
    while (($line = fgetcsv($archivo, null, ";")) !== FALSE) {
        echo $line[0] . " " . $line[1] . " " . $line[2] . " " . $line[3] . "<br>";
        echo "-----------------------------------------------<br>";
    }
    fclose($archivo);
    return $data;
}

function generar_csv()
{
    $archivo = fopen("data.csv", "w");
    $data = array(
        array("Equipo 1", "Equipo 1", "58", "4/12/2023 14:00"),
        array("Equipo 2", "Equipo 2", "50", "4/12/2023 14:10"),
        array("Equipo 3", "Equipo 3", "70", "4/12/2023 14:20"),
        array("Equipo 4", "Equipo 4", "55", "4/12/2023 14:30"),
        array("Equipo 5", "Equipo 5", "65", "4/12/2023 14:40"),
        array("Equipo 6", "Equipo 6", "62", "4/12/2023 14:50"),
    );

    foreach ($data as $line) {
        fputcsv($archivo, $line, ';', '"');
    }

    rewind($archivo);
    fclose($archivo);
}
