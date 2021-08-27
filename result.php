<?php
session_start();

$title = ' - Search on - ';
$search_q = $_GET['search']; // search in result page value
$iet = $_GET['search'] ;
$pagetitle = $iet . $title;
$keywords = '';
$description = '';
$page_url = '';
$image_url = '';
include 'layout/header.php';
include 'layout/search1.php';
?>
<style>.pagination > li > a {
  color: #202020;
}</style>

<link href="assets/css/justified.css" rel="stylesheet">
<link rel="stylesheet" href="assets/css/511df6df1a0db59adce6f010e720c802.css">
<!-- search result from sponsher -->
<div class="grid-container" style="overflow: hidden; " >
<div style=" margin:auto;padding:10px 20px 16px" >

	<div data-id='5aab9512979925ee212e4c5a' style='position: relative; width: 100%; height: 400px;' class='sstk_widget'><script type='text/javascript'>window._wdata = window._wdata || [];_wdata.push({widget_id: '5aab9512979925ee212e4c5a', cdn_prefix: '//d3qrz9uuaxc8ej.cloudfront.net', width: '1800', height: '400', src: '//widget.shutterstock.com/widget/5aab9512979925ee212e4c5a', border: false, url: document.URL});(function () {if (typeof (widget) !== 'undefined') return;var nwjs = document.createElement('script'); nwjs.type = 'text/javascript'; nwjs.async = true;nwjs.id = 'widget_script';nwjs.src = '//widget.shutterstock.com/content/js/embed_widget.js';var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(nwjs, s);})();</script></div>
</div>
</div>
<!-- search result from sponsher -->




<div style="min-height: 700px;" >
<div id="grid-container" style="padding: 20px;" >
<?php

if (isset($_GET['search'])) {
	$get = $_GET['search'];
}else {
	$get = "";
}

// empty search -> No result
$str = array(' ',',','-','_');

if ($get =='' or $get ==$str[0] or $get==$str[1]){	
	echo "<div class='container'>Your Search :- <b>".$get."</b> - Don't match any Images. <br><br> <b>Search Suggestions:</b> <br><ul style='margin-left:20px;margin-bottom:2em'><li>Make sure that all words are spelled correctly.</li><li>Try different keywords.</li><li>Try fewer keywords.</li></ul></div>";
}
// this else for search result
else {
	//for pagination 
	$limit = 41;  
	if (isset($_GET["page"])) { $page  = $_GET["page"]; } else { $page=1; };  
	$start_from = ($page-1) * $limit;  
	
	$search = mysqli_real_escape_string($connection, $_GET['search']);
	$sql = "SELECT * FROM image WHERE approved=1 AND itags LIKE '%$get%' or image LIKE '%$get%' and image_by LIKE '%$get%' ORDER BY date DESC LIMIT $start_from, $limit";
	$res = mysqli_query($connection, $sql);
	$queryResult = mysqli_fetch_assoc($res);

// search result for:example
if ($queryResult >0) {
	echo "<p style='margin-left: 7px;'>Search result for: $get</p>";
}else {
	// do nothing
}


// if query find then get result
	if ($queryResult > 0) {
		while ($row = mysqli_fetch_assoc($res)) {

?>

<a href="image.php?name=<?php echo $row['img_url']; ?>" class="grid-item img-responsive" >
 <img src="<?php echo $row['thumb'] ?>" alt="<?php echo $row['iname'] ?>" title="<?php echo $row['iname'] ?>" >
</a>

<?php
    }
	} else {
		echo "<div class='container'>Your Search :- <b>$get</b> - Don't match any Images. <br><br> <b>Search Suggestions:</b> <br><ul style='margin-left:20px;margin-bottom:2em'><li>Make sure that all words are spelled correctly.</li><li>Try different keywords.</li><li>Try fewer keywords.</li></ul></div>";
	}

}
?>

</div>

<!-- pagination start here -->
<?php 
//this query for If Image is less than 40 image then don't show pagination else show pagination

$count_sql = "SELECT * FROM image where approved=1 AND itags LIKE '%$get%' or image LIKE '%$get%' and image_by LIKE '%$get%'";  
$count_result = mysqli_query($connection, $count_sql);  
$count_answer = mysqli_num_rows($count_result);

if ($count_answer < 41) {
  //Do Nothing
}else {
 ?>

            <div class="text-center" >
              <?php  
              $sql = "SELECT COUNT(id) FROM image where approved=1 AND itags LIKE '%$get%' or image LIKE '%$get%' and image_by LIKE '%$get%'";  
              $rs_result = mysqli_query($connection, $sql);  
              $row = mysqli_fetch_row($rs_result);  
              $total_records = $row[0];  
              $total_pages = ceil($total_records / $limit);  
              $pagLink = "<nav style='margin-top: 10px;'><ul class='pagination' style='display:inline-block'>";  
              for ($i=1; $i<=$total_pages; $i++) {  
                           $pagLink .= "<li><a href='result?search=".$get."&page=".$i."'>".$i."</a></li>";    
              };  
              echo $pagLink . "</ul></nav>";  
              
              ?>
           </div><?php } ?>
<!-- pagination ends here --> 

<div style="margin: auto;"></div>


</div>

<script src="assets/js/imagesloaded.pkgd.min.js"></script>
      <script src="assets/js/justified.min.js"></script>
      <script src="assets/js/511df6df1a0db59adce6f010e720c802.js"></script>
<script>
        var parameters = {
          gridContainer: '#grid-container',
          gridItems: '.grid-item',
          enableImagesLoaded: true
        };
        var grid = new justifiedGrid(parameters);
    $('body').imagesLoaded( function() {
       grid.initGrid();
});
</script>
<!-- pagfination js -->
<script type="text/javascript">
$(document).ready(function(){
$('.pagination').pagination({
items: <?php echo $total_records;?>,
itemsOnPage: <?php echo $limit;?>,
cssStyle: 'light-theme',
currentPage : <?php echo $page;?>,
hrefTextPrefix : 'result?search=<?php echo $get ?>&page='
});
});
</script>

<?php
include 'layout/footer.php';
?>
