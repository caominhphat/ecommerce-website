	<?php 
		$product = new product();
	?>
	<div class="header_bottom">
		<div class="header_bottom_left">
			<div class="section group">
				<?php
				$getLastestDell = $product->getLastestDell();
				if($getLastestDell){
					while($resultdell = $getLastestDell->fetch_assoc()){
				 ?>
				<div class="listview_1_of_2 images_1_of_2">
					<div class="listimg listimg_2_of_1">
						 <a href="?page=details&action=detailscreen&proid=<?php echo $resultdell['productId'] ?>"> <img style="width: 150px;height:150px;" src="admin/uploads/<?php echo $resultdell['image'] ?>" alt="" /></a>
					</div>
				    <div class="text list_2_of_1">
						<h2>DELL</h2>
						 <p><?php echo $resultdell['productName'] ?></p>
						
				   </div>
			   </div>		
			    <?php
						}
					}
			    ?>	

			    <?php
				$getLastestSS = $product->getLastestSamsung();
				if($getLastestSS){
					while($resultss = $getLastestSS->fetch_assoc()){
				 ?>	

				<div class="listview_1_of_2 images_1_of_2">
					<div class="listimg listimg_2_of_1">
						  <a href="?page=details&action=detailscreen&proid=<?php echo $resultss['productId'] ?>"><img style="width: 150px;height:150px;" src="admin/uploads/<?php echo $resultss['image'] ?>" alt="" /></a>
					</div>
					<div class="text list_2_of_1">
						  <h2>Samsung</h2>
						   <p><?php echo $resultss['productName'] ?></p>
						 
					</div>
				</div>
				 <?php
						}
					}
			    ?>
			</div>

			<div class="section group">

				 <?php
				$getLastestOp = $product->getLastestOppo();
				if($getLastestOp){
					while($resultap = $getLastestOp->fetch_assoc()){
				 ?>	
				<div class="listview_1_of_2 images_1_of_2">
					<div class="listimg listimg_2_of_1">
						 <a href="?page=details&action=detailscreen&proid=<?php echo $resultap['productId'] ?>"> <img style="width: 150px;height:150px;" src="admin/uploads/<?php echo $resultap['image'] ?>" alt="" /></a>
					</div>
				    <div class="text list_2_of_1">
						<h2>Oppo</h2>
						 <p><?php echo $resultap['productName'] ?></p>
						
				   </div>
			   </div>	
			    <?php
						}
					}
			    ?>			

			     <?php
				$getLastestHw = $product->getLastestHuawei();
				if($getLastestHw){
					while($resulthw = $getLastestHw->fetch_assoc()){
				 ?>
				<div class="listview_1_of_2 images_1_of_2">
					<div class="listimg listimg_2_of_1">
						  <a href="?page=details&action=detailscreen&proid=<?php echo $resulthw['productId'] ?>"><img style="width: 150px;height:150px;" src="admin/uploads/<?php echo $resulthw['image'] ?>" alt="" /></a>
					</div>
					<div class="text list_2_of_1">
						  <h2>Huawei</h2>
						   <p><?php echo $resulthw['productName'] ?></p>
						  
					</div>
				</div>
				   <?php
						}
					}
			    ?>	
			</div>
		  <div class="clear"></div>
		</div>
			 <div class="header_bottom_right_images">
		   <!-- FlexSlider -->
             
			<section class="slider">
				  <div class="flexslider">
					<ul class="slides">
						<li><img src="images/slider1.jpg" class="slider" alt=""/></li>
						<li><img src="images/slider2.png" class="slider" alt=""/></li>
						<li><img src="images/slider2.jpg" class="slider" alt=""/></li>
						<li><img src="images/slider4.jpg" class="slider" alt=""/></li>
				    </ul>
				  </div>
	      </section>
<!-- FlexSlider -->
	    </div>
	  <div class="clear"></div>
  </div>