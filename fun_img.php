<?php 
// Function for clean url
function cl_url ($sString = '')
{
    $sString = preg_replace('/[^\\pL\d_]+/u', '-', $sString);
    $sString = trim($sString, "-");
    $sString = iconv('utf-8', "us-ascii//TRANSLIT", $sString);
    $sString = strtolower($sString);
    $sString = preg_replace('/[^-a-z0-9_]+/', '', $sString);

    return $sString;
}


// resize function for user profile pic update resize image in 150px
function resize_profile($newHeight, $targetFile, $originalFile) {

    $info = getimagesize($originalFile);
    $mime = $info['mime'];

    switch ($mime) {
            case 'image/jpeg':
                    $image_create_func = 'imagecreatefromjpeg';
                    $image_save_func = 'imagejpeg';
                    $new_image_ext = 'jpg';
                    break;
   
            case 'image/png':
                    $image_create_func = 'imagecreatefrompng';
                    $image_save_func = 'imagepng';
                    $new_image_ext = 'png';
                    break;

            case 'image/gif':
                    $image_create_func = 'imagecreatefromgif';
                    $image_save_func = 'imagegif';
                    $new_image_ext = 'gif';
                    break;

            default: 
                    throw new Exception('Unknown image type.');
    }

    $img = $image_create_func($originalFile);
    list($width, $height) = getimagesize($originalFile);

    $newWidth = ($width / $height) * $newHeight;
    $tmp = imagecreatetruecolor($newWidth, $newHeight);
    imagecopyresampled($tmp, $img, 0, 0, 0, 0, $newWidth, $newHeight, $width, $height);

    if (file_exists($targetFile)) {
            unlink($targetFile);
    }
    $image_save_func($tmp, "users/data/profile/$targetFile");   //Directory Where Resize image saved
}


// Upload image resize to thumb function
function resize($newHeight, $targetFile, $originalFile) {
    ini_set('memory_limit', '1024M'); // or you could use 1G

    $info = getimagesize($originalFile);
    $mime = $info['mime'];

    switch ($mime) {
            case 'image/jpeg':
                    $image_create_func = 'imagecreatefromjpeg';
                    $image_save_func = 'imagejpeg';
                    $new_image_ext = 'jpg';
                    break;       
                    
            case 'image/png':
                    $image_create_func = 'imagecreatefrompng';
                    $image_save_func = 'imagepng';
                    $new_image_ext = 'png';
                    break;

            case 'image/gif':
                    $image_create_func = 'imagecreatefromgif';
                    $image_save_func = 'imagegif';
                    $new_image_ext = 'gif';
                    break;

            default: 
                    throw new Exception('Unknown image type.');
    }

    $img = $image_create_func($originalFile);
    list($width, $height) = getimagesize($originalFile);

    $newWidth = ($width / $height) * $newHeight;
    $tmp = imagecreatetruecolor($newWidth, $newHeight);
    imagecopyresampled($tmp, $img, 0, 0, 0, 0, $newWidth, $newHeight, $width, $height);

    if (file_exists($targetFile)) {
            unlink($targetFile);
    }

    //function that create image store folder by year/monts/date
    $y = date('Y');
    $m = date('m');
    $d = date('d'); 

    $dirNameY = 'img/thumb/'.$y;
    $dirNameM = 'img/thumb/'.$y.'/'.$m;
    $dirNameD = 'img/thumb/'.$y.'/'.$m.'/'.$d.'/';

    if(file_exists($dirNameY)){

    }else{
        mkdir("img/thumb/" . $y , 0777, true);
    }

    if(file_exists($dirNameM)){
        
    }else{
        mkdir("img/thumb/".$y.'/'.$m , 0777, true);
    }

    if (file_exists($dirNameD)) {
            
    }else{
    mkdir("img/thumb/".$y.'/'.$m.'/'.$d , 0777, true);
    }

    $image_save_func($tmp, $dirNameD.$targetFile);
}

// Upload Image Resize to Single image Size Page
function resize720($newHeight, $targetFile, $originalFile) {

    $info = getimagesize($originalFile);
    $mime = $info['mime'];

    switch ($mime) {
            case 'image/jpeg':
                    $image_create_func = 'imagecreatefromjpeg';
                    $image_save_func = 'imagejpeg';
                    $new_image_ext = 'jpg';
                    break;     

            case 'image/png':
                    $image_create_func = 'imagecreatefrompng';
                    $image_save_func = 'imagepng';
                    $new_image_ext = 'png';
                    break;

            case 'image/gif':
                    $image_create_func = 'imagecreatefromgif';
                    $image_save_func = 'imagegif';
                    $new_image_ext = 'gif';
                    break;

            default: 
                    throw new Exception('Unknown image type.');
    }

    $img = $image_create_func($originalFile);
    list($width, $height) = getimagesize($originalFile);

    $newWidth = ($width / $height) * $newHeight;
    $tmp = imagecreatetruecolor($newWidth, $newHeight);
    imagecopyresampled($tmp, $img, 0, 0, 0, 0, $newWidth, $newHeight, $width, $height);

    if (file_exists($targetFile)) {
            unlink($targetFile);
    }
    $y = date('Y');
    $m = date('m');
    $d = date('d'); 

    $dirNameY = './img/single/'.$y;
    $dirNameM = './img/single/'.$y.'/'.$m;
    $dirNameD = './img/single/'.$y.'/'.$m.'/'.$d.'/';

    if(file_exists($dirNameY)){

    }else{
        mkdir("./img/single/" . $y , 0777, true);
    }

    if(file_exists($dirNameM)){
        
    }else{
        mkdir("./img/single/".$y.'/'.$m , 0777, true);
    }

    if (file_exists($dirNameD)) {
            
    }else{
    mkdir("./img/single/".$y.'/'.$m.'/'.$d , 0777, true);
    }

    $image_save_func($tmp, $dirNameD.$targetFile);
}
//Image Details Like Camera, ISO, Date Taken Function from url http://php.net/manual/en/function.exif-read-data.php

// This function is used to determine the camera details for a specific image. It returns an array with the parameters.
function cameraUsed($imagePath) {

    // Check if the variable is set and if the file itself exists before continuing
    if ((isset($imagePath)) and (file_exists($imagePath))) {
   
      // There are 2 arrays which contains the information we are after, so it's easier to state them both
      $exif_ifd0 = read_exif_data($imagePath ,'IFD0' ,0);      
      $exif_exif = read_exif_data($imagePath ,'EXIF' ,0);
     
      //error control
      $notFound = "Unavailable";
     
      // Model
      if (@array_key_exists('Model', $exif_ifd0)) {
        $camModel = $exif_ifd0['Model'];
      } else { $camModel = $notFound; }
      // Date
      if (@array_key_exists('DateTimeOriginal', $exif_ifd0)) {
        $camDate = $exif_ifd0['DateTimeOriginal'];
      } else { $camDate = $notFound; }
     //Dimensions

     
      $return = array();
      $return['model'] = $camModel;
      $return['datetaken'] = $camDate;
      return $return;
   
    } else {
      return false;
    }

}
// Pagination function start here
function pagination($query, $per_page = 10,$page = 1, $url = '?'){        
   $link=mysqli_connect("199.79.62.14","tuber6u2_heynav","d09?D!4v?D5%");
    mysqli_select_db($link,"tuber6u2_pics");
    $query = "SELECT COUNT(*) as `num` FROM {$query}";
      $row = mysqli_fetch_array(mysqli_query($link,$query));
      $total = $row['num'];
        $adjacents = "2"; 

      $page = ($page == 0 ? 1 : $page);  
      $start = ($page - 1) * $per_page;               
    
      $prev = $page - 1;              
      $next = $page + 1;
        $lastpage = ceil($total/$per_page);
      $lpm1 = $lastpage - 1;
      
      $pagination = "";
      if($lastpage > 1)
      { 
        $pagination .= "<ul class='pagination pagination-lg'>";
                    $pagination .= "";
        if ($lastpage < 7 + ($adjacents * 2))
        { 
          for ($counter = 1; $counter <= $lastpage; $counter++)
          {
            if ($counter == $page)
              $pagination.= "<li class='active'><a class='current'>$counter</a></li>";
            else
              $pagination.= "<li><a href='{$url}page=$counter'>$counter</a></li>";          
          }
        }
        elseif($lastpage > 5 + ($adjacents * 2))
        {
          if($page < 1 + ($adjacents * 2))    
          {
            for ($counter = 1; $counter < 4 + ($adjacents * 2); $counter++)
            {
              if ($counter == $page)
                $pagination.= "<li><a class='current'>$counter</a></li>";
              else
                $pagination.= "<li><a href='{$url}page=$counter'>$counter</a></li>";          
            }
            $pagination.= "<li><a href='{$url}page=$lpm1'>$lpm1</a></li>";
            $pagination.= "<li><a href='{$url}page=$lastpage'>$lastpage</a></li>";    
          }
          elseif($lastpage - ($adjacents * 2) > $page && $page > ($adjacents * 2))
          {
            $pagination.= "<li><a href='{$url}page=1'>1</a></li>";
            $pagination.= "<li><a href='{$url}page=2'>2</a></li>";
            $pagination.= "<li class='dot'>...</li>";
            for ($counter = $page - $adjacents; $counter <= $page + $adjacents; $counter++)
            {
              if ($counter == $page)
                $pagination.= "<li class='active'><a class='current'>$counter</a></li>";
              else
                $pagination.= "<li><a href='{$url}page=$counter'>$counter</a></li>";          
            }
            $pagination.= "<li class='dot'>..</li>";
            $pagination.= "<li><a href='{$url}page=$lpm1'>$lpm1</a></li>";
            $pagination.= "<li><a href='{$url}page=$lastpage'>$lastpage</a></li>";    
          }
          else
          {
            $pagination.= "<li><a href='{$url}page=1'>1</a></li>";
            $pagination.= "<li><a href='{$url}page=2'>2</a></li>";
            $pagination.= "<li class='dot'>..</li>";
            for ($counter = $lastpage - (2 + ($adjacents * 2)); $counter <= $lastpage; $counter++)
            {
              if ($counter == $page)
                $pagination.= "<li class='active' ><a class='current'>$counter</a></li>";
              else
                $pagination.= "<li><a href='{$url}page=$counter'>$counter</a></li>";          
            }
          }
        }
        
        if ($page < $counter - 1){ 
          $pagination.= "<li><a href='{$url}page=$next'><i class='fa fa-angle-right' aria-hidden='true'></i></a></li>";
                $pagination.= "<li><a href='{$url}page=$lastpage'><i class='fa fa-angle-double-right' aria-hidden='true'></i></a></li>";
        }else{
          $pagination.= "<li><a class='current'><i class='fa fa-angle-right' aria-hidden='true'></i></a></li>";
                $pagination.= "<li class='active'><a class='current'><i class='fa fa-angle-double-right' aria-hidden='true'></i></a></li>";
            }
        $pagination.= "</ul>\n";    
      }
    
    
        return $pagination;
    }
// Pagination function end Here

// related product 
function getRelatedProducts($productName)
{
    $productResults = mysqli_query("SELECT * FROM products WHERE productName = '$productName' LIMIT 0,1");

    $relatedProducts = array();

    if(mysqli_num_rows($productResults) == 1)
    {
        $product = mysqli_fetch_array($productResults);
        $tags = explode(",",$product['tags']);

        $otherProducts = mysqli_query("SELECT * FROM products WHERE productName != '$productName'");

        while($otherProduct = mysqli_fetch_array($otherProducts))
        {
            $otherTags = explode(",",$otherProduct['tags']);
            $overlap = array_intersect($tags,$otherTags);
            if(count($overlap > 1)) $relatedProducts[] = $otherProduct;
        }
    }

    return $relatedProducts;
}



?>