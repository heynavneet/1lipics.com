<?php 

header("Content-type: text/xml");
echo '<?xml version="1.0" encoding="UTF-8"?>';
include '../config/dbc.php';
?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
    <url>
        <loc>https://1lipics.com/</loc>
        <priority>1.00</priority>
    </url>
    <url>
        <loc>https://1lipics.com/login</loc>
        <priority>1.00</priority>
    </url>
    <url>
        <loc>https://1lipics.com/register</loc>
        <priority>1.00</priority>
    </url>
    <url>
        <loc>https://1lipics.com/pics</loc>
        <priority>1.00</priority>
    </url>
    <url>
        <loc>https://1lipics.com/recent</loc>
        <priority>1.00</priority>
    </url>

    <?php

    $sql = "SELECT * FROM image where approved=1 ORDER BY id ASC";
    $rs_result = mysqli_query($connection, $sql); 
    while ($row = mysqli_fetch_assoc($rs_result)) { 
    ?>
    <url>
        <loc>https://1lipics.com/image?name=<?php echo $row['img_url']; ?></loc>
        <changefreq>monthly</changefreq>
        <priority>0.5</priority>
    </url>
 <?php } ?>
 <?php

    $sql = "SELECT * FROM usermanagement ORDER BY id ASC";
    $rs_result = mysqli_query($connection, $sql); 
    while ($row = mysqli_fetch_assoc($rs_result)) { 
    ?>
    <url>
        <loc>https://1lipics.com/profile?username=<?php echo $row['username']; ?></loc>
        <changefreq>monthly</changefreq>
        <priority>0.5</priority>
    </url>
 <?php } ?>
</urlset>