<?php
function Conexion()
{
try
{
    $connectionInfo = array("UID" => "balcore@blackpyro", "pwd" => "Djandelo300964", "Database" => "bd_itrio", "LoginTimeout" => 30, "Encrypt" => 1, "TrustServerCertificate" => 0, "CharacterSet" =>"UTF-8");
$serverName = "tcp:blackpyro.database.windows.net,1433";
$conn = sqlsrv_connect($serverName, $connectionInfo);
}
catch (sqlsrv_Exception $e)
{
    print("Error connecting to SQL Server.");
    die(print_r($e));
}

return $conn;
}
?>