						<ul class="breadcrumbs">
							<?php 
								foreach ($this->uri->segments as $segment):
							?> 
							<?php 
								$url = substr($this->uri->uri_string,0,strpos($this->uri->uri_string, $segment)). $segment;
								$is_active = $url == $this->uri->uri_string;
							?>
							<!-- <li class="nav-home">
								<a href="#">
									<i class="flaticon-home"></i>
								</a>
							</li>
							<li class="separator">
								<i class="flaticon-right-arrow"></i>
							</li>
							<li class="nav-item">
								<a href="#">Tables</a>
							</li>
							<li class="separator">
								<i class="flaticon-right-arrow"></i>
							</li>
							<li class="nav-item">
								<a href="#">Datatables</a>
							</li> -->
							<li class="breadcrumb-item <?php echo $is_active ? 'active': '' ?>">
					            <!-- <a href="#">Dashboard</a> -->
					            <?php if ($is_active):?>
					            	<?php echo ucfirst($segment); ?>
					        	<?php else: ?>
					        		<a href="<?php echo site_url($url) ?>"><?php echo ucfirst($segment) ?></a>
					        	<?php endif; ?>
					        </li>
							<?php 
								endforeach;
							?>
						</ul>