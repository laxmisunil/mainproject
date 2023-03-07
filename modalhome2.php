<style>
	.wrapper {
 
 /* This part is important for centering the content */
 display: flex;
 align-items: center;
 justify-content: center;
 /* End center */
 
}

.wrapper a {
 display: inline-block;
 text-decoration: none;
 
 background-color: #fff;
 
 text-transform: uppercase;
 color: #585858;
 font-family: 'Roboto', sans-serif;
}

.modal {
 visibility: hidden;
 opacity: 0;
 position: absolute;
 top: 0;
 right: 0;
 bottom: 0;
 left: 0;
 display: flex;
 align-items: center;
 justify-content: center;
 background: rgba(77, 77, 77, .7);
 transition: all .4s;
}

.modal:target {
 visibility: visible;
 opacity: 1;
}

.modal__content {
 border-radius: 4px;
 position: relative;
 width: 500px;
 max-width: 90%;
 background: #fff;
 padding: 1em 2em;
}

.modal__footer {
 text-align: right;
 a {
   color: #585858;
 }
 i {
   color: #d02d2c;
 }
}
.modal__close {
 position: absolute;
 top: 10px;
 right: 10px;
 color: #585858;
 text-decoration: none;
}

	</style>

<td>
								<div class="wrapper">
    								<a href="#demo-modal<?php echo $row["customerID"];?>" style="border:2px solid black;border-radius:4px;background-color:#060714;color:white;padding:4px;">View more</a>
								</div>
								<!--MODAL STARTS...-->

								<div id="demo-modal<?php echo $row["customerID"];?>" class="modal">
    								<div class="modal__content">
									<h1>Booking Details</h1>
													<table>
										<?php
										
										?>
        											
														<tr>
															<th>Customer Name</th>
															<td><?php echo $row["userName"] ?></td>
														</tr>
														<tr>
															<th>Phone</th>
															<td><?php echo $row["userPhone"] ?></td>
														</tr>
														<tr>
															<th>Email</th>
															<td><?php echo $row["userEmail"] ?></td>
														</tr>
														<tr>
															<th>Location</th>
															<td><?php echo $row["houseName"]."&nbsp;(H)".$row["customerTown"]."&nbsp;P.O.&nbsp;".$row["customerPincode"] ?></td>
														</tr>
													
				<?php
 			?>	
			</table>						
								<!--MODAL ENDS-->
   
                                   <a href="#" class="modal__close">&times;</a>
                                 </div>
                                </div>