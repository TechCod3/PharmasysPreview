<?php

require_once 'SQLconection.php';

function search()
{
    $sqlsrv = Conexion();
    $search = addslashes($_POST['search']);
    $query = "SELECT idproducto, categoria, producto, casa FROM tbproducto, tbcategoria, tbcasa WHERE tbcasa.idcasa = tbproducto.idcasa AND tbcategoria.idcategoria = tbproducto.idcategoria AND (producto LIKE '%$search%' OR categoria LIKE '%$search%' OR casa LIKE '%$search%') ORDER BY categoria";
    $res = sqlsrv_query($sqlsrv, $query);

    echo "<table id='Products_list'>
            <tr>
                    <th id='id_prod'>ID</th>
                    <th id='prod_name'>Producto</th>
                    <th id='OptionBS'>Opción</th>
                </div>
            </tr>";
    while ($row = sqlsrv_fetch_array($res))
    {
        echo "<tr id='Products'>
                <td id='idProd'>".$row['idproducto']."</td>
                <td id='Producto'>".$row['categoria']." - ".$row['producto']. " - ".$row['casa']."</td>
                <td id='EditPurch'><button id='BselectIn' data-id_prod='".$row['idproducto']."'><img src='data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADIAAAAyCAYAAAAeP4ixAAAABHNCSVQICAgIfAhkiAAAAAlwSFlzAAADmwAAA5sBPN8HMQAAABl0RVh0U29mdHdhcmUAd3d3Lmlua3NjYXBlLm9yZ5vuPBoAAABrSURBVGiB7dexDYAgEIbR013cwKEcyaHYwGG0NVY0kD/mvY7myBeaowoAqGXk8P287ve5Hduw+9ZRg2cTkkZIGiFphKQRkkZImq5t9LvFztazNf/mRYSk8UNMIySNkDRC0ghJIySNEAAg0ANXsQw+8BTIYgAAAABJRU5ErkJggg=='></button></td>
            </tr>";
    }
    echo "</table>";
}
search();
?>