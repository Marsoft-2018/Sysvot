<table class='table table-striped' style='width:45%;margin:0 auto;'>
   <thead>                    
       <tr>
           <th colspan='2'><h1>TOTAL VOTOS FALTANTES</h1></th>
       </tr>
       <tr class='TITULO'>
           <th>GENERO</th>
           <th>TOTAL VOTOS</th>
       </tr>
   </thead>
   <tbody>
    <?php 

    $totalg = 0;

    foreach ($objConteo->abstencion() as $value) {
        if ($value['gender'] != ""){
        ?>
        <tr> 
           <td class='centrar'><h4><?php echo $value['gender'] ?></h4></td>
           <td class=''><h4><?php echo $value['Votos'] ?></h4></td>
    			             	            
           </td>	           
        </tr>
    <?php 
        
            $totalg =   $totalg + $value['Votos'];
            
        }
    }   
    ?>  
   </tbody>
   <tfoot>
       <tr style="background-color:rgba(101, 174, 217,0.5);color:#000;">
           <td >TOTAL</td>
           <td class='centrar'><h4><?php echo $totalg ?></h4></td>
       </tr>
   </tfoot>
</table>