<div class="category-nav show-on-click" style="cursor: pointer">
					<span class="category-header">Departments <i class=""></i></span>
					<ul class="category-list">
						<?php 
							global $connection;
							$categoryQ = "SELECT * FROM categories";
							$getCategory = mysqli_query($connection, $categoryQ);
							while ($row = mysqli_fetch_assoc($getCategory)) {
								$c_id = $row["c_id"];
								$c_cat = $row["c_cat"];
							
							?>
								
								

						<li class="dropdown side-dropdown">
							<a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true"><?=$c_cat; ?><i class="fa fa-angle-right"></i></a>
							<div class="custom-menu">
								<div class="row">
									<div class="col-md-12">
										<ul class="list-links">
											<?php 
												$subCategories = "SELECT * FROM subcategories where sc_cid = $c_id";
												$getSubCategory = mysqli_query($connection, $subCategories);
												while($subCatRow = mysqli_fetch_assoc($getSubCategory))
												{
													$sc_id = $subCatRow["sc_id"];
													$sc_title = $subCatRow["sc_title"];
												
											?>
											<li><a href="myproducts.php?cid=<?=$sc_id; ?>"><?=$sc_title; ?></a></li>
											
												<?php 
							}
												?>
										</ul>
									</div>
									
								
							</div>
						</li>
						<?php } ?>
						
					</ul>
				</div>