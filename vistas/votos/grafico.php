<hr>
<div style='height:200px; width:50%;margin:0 auto;padding:50px;margin-bottom:150px;'>
   <h3>Reporte Gráfico</h3>
   <hr>
    <?php 
        foreach ($objConteo->contar() as $value) {
            @$porcentaje = ($value['Votos']*100)/$totalg;
        ?>
        <table class='grafico'>
            <tr>
                <td class='barra2' width='200'><b><?php echo $value['NOMBRE1']." ".$value['secondName']." ".$value['APELLIDO1']." ".$value['APELLIDO2'] ?></b></td>
                <td class='barra3'  width='40'><?php echo (round($porcentaje,2)) ?>%&nbsp;</td>
                <td width="<?php echo ((round($porcentaje,0))*3) ?>" class='barra1'>&nbsp;</td>
                <td class='barraD'><i><?php echo $value['Votos'] ?></i></td>
            </tr>
        </table>
    <?php 
        }
     ?>
</div>