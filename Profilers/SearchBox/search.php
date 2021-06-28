<?php
$conn = mysqli_connect("localhost", "root", "", "kite");
if(isset($_GET['q']))
{
	$q=$_GET['q'];
	$q=htmlentities($q);
	$q=mysqli_real_escape_string($conn,$q);
	$sql="select * from posts where title='$q' or title like '%$q' or title='$q%' or title like '%$q%'";
	$res=mysqli_query($conn,$sql);
	if(mysqli_num_rows($res)>0)
	{
		?>
		<ul class="collection row">
			<?php
				while($x=mysqli_fetch_assoc($res))
				{
					?>
					<li class="collection-item s12">
						<p><a class="blue-text" href=""><?php echo $x['title']; ?></a></p>
						<span class="grey-text"><?php echo $x['author']; ?> on <?php echo $x['publish_date']; ?></span>
					</li>
					<?php
				}
			?>
		</ul>
		<?php
	}
	else
	{
		echo "<p class='red-text'>No Data Found...</p>";
	}
}
else
{
	echo "<p class='red-text'>Bad Request...</p>";
}
?>