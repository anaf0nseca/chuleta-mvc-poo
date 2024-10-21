<?php foreach($rows_tipos as $row){ ?> 
    <li><a href="produtos_por_tipo.php?id_tipo=<?php echo $row[0].'&rotulo='.$row[2] ?>"> <?php echo $row[2] ?></a></li>
                            
<?php }?>