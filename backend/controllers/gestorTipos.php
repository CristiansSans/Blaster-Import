<?php 
	
	class gestorTiposController{

		public function vistaTipos(){
			$resultado = gestorTiposModel::gestorTipos("tipos");

			foreach ($resultado as $row => $item) {
				
				?>
				<tr>
			      	<td style="text-align: center;"><?php echo $item['nombreTipo'] ?></td>
			        <td style="text-align: center;"><?php echo $item['precioTipo'] ?></td>
			        <td class="editarTipos" style="font-size: 18px;cursor: pointer;text-align: center;"> <input type="text" value="<?php echo $item['nombreTipo'] ?>" hidden> <input type="text" value="<?php echo $item['precioTipo'] ?>" hidden> <i class="fas fa-edit"></i></td>
			        <td class="EliminarTipos" style="font-size: 18px;cursor: pointer;text-align: center;"> <input type="text" value="<?php echo $item['id'] ?>" hidden>  <i class="fas fa-trash"></i></td>
			     </tr>
				<?php

			}
			?>
				<tr>
			      	<td style="text-align: center;"></td>
			      	<td style="text-align: center;"></td>
			        <td style="text-align: center;"></td>
			        <td class="newGene" style="font-size: 18px;cursor: pointer;text-align: center;">Nuevo <i class="fas fa-plus"></i></td>
			     </tr>
				<?php
		}
	}
	
 ?>