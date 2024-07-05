<?php
function strClean($cadena)
{
    // Reemplaza múltiples espacios por uno solo y elimina espacios al inicio y al final
    $string = preg_replace(['/\s+/','/^\s|\s$/'], [' ',''], $cadena);
    
    // Elimina espacios en blanco (u otros caracteres) del inicio y final de la cadena
    $string = trim($string);
    
    // Quita las barras invertidas de una cadena
    $string = stripslashes($string);
    
    // Elimina etiquetas de script y palabras clave de SQL para prevenir inyecciones
    $string = str_ireplace('<script>', '', $string);
    $string = str_ireplace('</script>', '', $string);
    $string = str_ireplace('<script type=>', '', $string);
    $string = str_ireplace('<script src>', '', $string);
    $string = str_ireplace('SELECT * FROM', '', $string);
    $string = str_ireplace('DELETE FROM', '', $string);
    $string = str_ireplace('INSERT INTO', '', $string);
    $string = str_ireplace('SELECT COUNT(*) FROM', '', $string);
    $string = str_ireplace('DROP TABLE', '', $string);
    
    // Elimina patrones comunes usados en ataques de inyección SQL
    $string = str_ireplace("OR '1'='1", '', $string);
    $string = str_ireplace('OR ´1´=´1', '', $string);
    $string = str_ireplace('IS NULL', '', $string);
    $string = str_ireplace('LIKE "', '', $string);
    $string = str_ireplace("LIKE '", '', $string);
    $string = str_ireplace('LIKE ´', '', $string);
    $string = str_ireplace('OR "a"="a', '', $string);
    $string = str_ireplace("OR 'a'='a", '', $string);
    $string = str_ireplace('OR ´a´=´a', '', $string);
    
    // Elimina otros caracteres potencialmente peligrosos
    $string = str_ireplace('--', '', $string);
    $string = str_ireplace('^', '', $string);
    $string = str_ireplace('[', '', $string);
    $string = str_ireplace(']', '', $string);
    $string = str_ireplace('==', '', $string);
    
    // Devuelve la cadena limpia
    return $string;
}