<?php ?>

<footer >
<div id="Company">
	<div>
		<ul>
			<p>Company</p>
			<li>About us</li>
			<li>Terms & Conditions</li>
			<li>Careers</li>
		</ul>
	</div>
	<div>
		<ul>
			<p>Services</p>
			<li>Customer care</li>
			<li>Shipping Information</li>
			<li>Return policy</li>
			
		</ul>
	</div>
	<div>
		<ul>
			<p>Our store & you</p>
			<li>Follow us !</li>
			<li>Medias</li>
			<li>Contact us</li>
		</ul>
	</div>

</div>
<div></div>
<div></div>

</footer>

 <?php
 /*
function Pagin(array $listItem = null){

	echo "<div class='numPages' id='numPagesDesktop'>";

	$listItem = ceil(count($listItem) / 10);
	
	for($i = 1; $i <= $listItem; $i++ > 0) {
	   
		if ($i <= 10) {
			echo '<a href='.$_SERVER["PHP_SELF"].'?page='.$i.'><div>' . $i . "</div></a>";
		}
	}
	if ($listItem > 10) {
	   // $numPage + 1;
		echo '<div class=\"nextPage\"><a href=\"#?page='.$i .'title=\"Page suivante\">&GT;</a></div>';
	}

	echo "</div>
<div class='numPages' id='numPagesMobile'>";

	 for($i = 1; $i <= $listItem; $i++ > 0) {
		if ($i <= 10) {
			echo '<a href='.$_SERVER["PHP_SELF"].'?page='.$i.'><div>' . $i . "</div></a>";
		}
	}
	if ($listItem > 4) {
		//$numPage = + 1;
		echo '<div class=\"nextPage\"><a href=\"#/?page = '.$i .'title=\"Page suivante\">&GT;</a></div>';
	}
	
echo"</div>";

}