<!DOCTYPE html>
<html>

<body>

    <?php
    $pagina = 41;
    $totalpaginas = 42;

//Arreglo de los liks
    $rangoinicio = 0;
    $rangofin = 0;
    $y = 1;
    $z = 10;
    if ($pagina >= $y && $pagina <= $z) {
        $rangoinicio = $y;
        $rangofin = $z;
        for ($i = $rangoinicio; $i <= $rangofin; $i++) {
            print(" " . $i . " ");
        }
    } else {
        $a = 10;
        $bandera = True;
        while ($bandera == True) {
            if ($pagina >= ($y + $a) && $pagina <= ($z + $a)) {
                $rangoinicio = ($y + $a);
                $rangofin = ($z + $a);
                if ($rangofin > $totalpaginas) {
                    $rangofin = $totalpaginas;
                }
                //$rangofin = $totalpaginas;
                for ($i = $rangoinicio; $i <= $rangofin; $i++) {
                    print(" " . $i . " ");
                }
                break;
            } else {
                $a = $a + 10;
            }
        }
    }
    //Fin del areglo
    ?>
</body>

</html>