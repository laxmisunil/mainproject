<div class='wrapper'>
    								<a href='#demo-modal".$row["productID"]." style='border:2px solid black;border-radius:4px;background-color:#060714;color:white;padding:4px;'>View more</a>
								</div>
                                <div id='demo-modal".$row["productID"]." class='modal'>
    								<div class='modal__content'>
									<h1>Booking Details</h1>
													<table>
										<?php
										
										?>
        											
														<tr>
															<th>Product Name</th>
															<td>".$row["productName"]."</td>
														</tr>
														<tr>
															<th>Product Subname</th>
															<td>".$row["productSubname"]."</td>
														</tr>
														<tr>
															<th>Category</th>
															<td>".$row["productCategory"]."</td>
														</tr>
														<tr>
															<th>Subcategory</th>
															<td>".$row["productSubcategory"]."</td>
														</tr>
													
				<?php
 			?>	
			</table>						
								<!--MODAL ENDS-->
   
                                   <a href='#' class='modal__close'>&times;</a>
                                 </div>
                                </div>
                            







