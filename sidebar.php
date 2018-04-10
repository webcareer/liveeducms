<div id="sidebar">

	<!-- Search Widget -->
	<div class="widget widget_search">
		<form action="#" method="get" >
			<input type="text" value="Search" default-value="Search">
		</form>
	</div>

	<!-- Blog Categories Widget -->
	<div class="widget widget_categories">
		<h3>Blog Categories</h3>
		<ul>
			<?php
				$sql = "SELECT * FROM categories";

				$result = mysqli_query($conn, $sql);

				if(mysqli_num_rows($result) > 0){
					while($row = mysqli_fetch_assoc($result)){
						echo "<li><a href='{$row['id']}'>" . $row['categoryname']  . " </a></li>";
					}
				}
				else{
					echo "<li>No Category Defined.</li>";
				}
			?>
		</ul>
	</div>

	<!-- Text Widget -->
	<div class="widget widget_text">
		<h3>Text Widget</h3>
		<div class="textwidget">
			Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras dui orci, dapibus non luctus, ultrices vel nunc. Donec lacinia mattis erat sit amet blandit.
		</div>
	</div>

	<!-- Recent Posts Widget -->
	<div class="widget widget_recent_entries">
		<h3>Recent Posts</h3>
		<ul class="posts">

			<?php
				$sql = "SELECT * FROM `posts` ORDER BY id Desc LIMIT 3";
				$result = mysqli_query($conn, $sql);

				if(mysqli_num_rows($result) > 0){
					while($row = mysqli_fetch_assoc($result)){
					?>
					<li>
						<a href="./post.php?id=<?php echo $row['id']; ?>"><img src="./admin/img/<?php echo $row['postimage'] ?>" alt="<?php echo $row['postimage'] ?>" /></a>
						<div class="entry">
							<a href="./post.php?id=<?php echo $row['id']; ?>"><?php echo substr($row['title'], 0, 25); ?></a>
							<span class="date">July 8th, 2012</span>
						</div>
					</li>
					<?php
					}
				}
				else{


				}
			?>


			<li>
				<a href="blog_post.html"><img src="images/content/project_03.jpg" alt="" /></a>
				<div class="entry">
					<a href="blog_post.html">dumm content</a>
					<span class="date">July 8th, 2012</span>
				</div>
			</li>
		</ul>
	</div>

	<!-- Tabs Widget -->
	<div class="widget pyre_tabs">
		<h3>Tabs Widget</h3>
		<div class="tabs">
			<ul>
				<li><a href="#tabs-1">Recent</a></li>
				<li><a href="#tabs-2">Popular</a></li>
			</ul>
			<div class="tabs-content-wrapper">
				<div id="tabs-1">
					<ul class="posts">
						<li>
							<a href="blog_post.html"><img src="images/content/project_04.jpg" alt="" /></a>
							<div class="entry">
								<a href="blog_post.html">Lorem ipsum dolor sit, consectetuer.</a>
								<span class="date">July 8th, 2012</span>
							</div>
						</li>
						<li>
							<a href="blog_post.html"><img src="images/content/project_05.jpg" alt="" /></a>
							<div class="entry">
								<a href="blog_post.html">Nam ultricies dolor eu velit varius scelerisque.</a>
								<span class="date">July 5th, 2012</span>
							</div>
						</li>
						<li>
							<a href="blog_post.html"><img src="images/content/project_10.jpg" alt="" /></a>
							<div class="entry">
								<a href="blog_post.html">Vestibulum in lacus in felis pretium feugiat. </a>
								<span class="date">July 1th, 2012</span>
							</div>
						</li>
					</ul>
				</div>
				<div id="tabs-2">
					<ul class="posts">
						<li>
							<a href="blog_post.html"><img src="images/content/project_07.jpg" alt="" /></a>
							<div class="entry">
								<a href="blog_post.html">Lorem ipsum dolor sit, consectetuer.</a>
								<span class="date">July 8th, 2012</span>
							</div>
						</li>
						<li>
							<a href="blog_post.html"><img src="images/content/project_08.jpg" alt="" /></a>
							<div class="entry">
								<a href="blog_post.html">Nam ultricies dolor eu velit varius scelerisque.</a>
								<span class="date">July 5th, 2012</span>
							</div>
						</li>
						<li>
							<a href="blog_post.html"><img src="images/content/project_09.jpg" alt="" /></a>
							<div class="entry">
								<a href="blog_post.html">Vestibulum in lacus in felis pretium feugiat. </a>
								<span class="date">July 1th, 2012</span>
							</div>
						</li>
					</ul>
				</div>
			</div>
		</div>
	</div>

	<!-- Accordion Widget -->
	<div class="widget widget_text">
		<h3>Accordion Widget</h3>
		<div class="accordion">
			<a href="#" class="accordion-button">Website Design</a>
			<div class="accordion-content">
				Lorem ipsum dolor sit amet nec, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes.
			</div>
			<a href="#" class="accordion-button">Website Development</a>
			<div class="accordion-content">
				Lorem ipsum dolor sit amet nec, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes.
			</div>
			<a href="#" class="accordion-button">Content Management Systems</a>
			<div class="accordion-content">
				Lorem ipsum dolor sit amet nec, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes.
			</div>
			<a href="#" class="accordion-button">E-Commerce</a>
			<div class="accordion-content">
				Lorem ipsum dolor sit amet nec, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes.
			</div>
		</div>
	</div>

	<!-- Twitter Feed Widget -->
	<div class="widget widget_twitter">
		<h3>Latest Tweets</h3>
		<div id="twitter-feed-sidebar" class="twitter-feed"></div>
	</div>

	<!-- Photo Stream Widget -->
	<div class="widget widget_flickr">
		<h3>Flickr Feed</h3>
		<div class="photo-stream"></div>
	</div>

</div>