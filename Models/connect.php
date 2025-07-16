<?php

function OpenDb()
{
    return mysqli_connect("127.0.0.1:3308", "root", "", "DBProyecto");
}

function CloseDb($context)
{
    return mysqli_close($context);
}
?>