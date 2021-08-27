<?php
// Only User Can Access Start Here
session_start();
if(!isset($_SESSION['username'])){
   header("Location:login");
   exit();
}

$pagetitle = 'Upload'; // this define page title
$search_q = '';
$keywords = 'upload,1lipics';
$description = 'Upload Page 1lipics';
$page_url = '';
$image_url = '';

include 'layout/header.php';
include 'layout/search1.php';
include 'fun_img.php';
?>

<?php
$tsms = "Image Under Review, Thank You For Contributing.";
if (isset($_POST['upload'])) {
    //function that create image store folder by year/monts/date
    $y = date('Y');
    $m = date('m');
    $d = date('d'); 

    $dirNameY = 'img/'.$y;
    $dirNameM = 'img/'.$y.'/'.$m;
    $dirNameD = 'img/'.$y.'/'.$m.'/'.$d.'/';

    if(file_exists($dirNameY)){

    }else{
        mkdir("img/" . $y , 0777);
    }

    if(file_exists($dirNameM)){
        
    }else{
        mkdir("img/".$y.'/'.$m , 0777);
    }

    if (file_exists($dirNameD)) {
            
    }else{
    mkdir("img/".$y.'/'.$m.'/'.$d , 0777);
    }

    $tmp_file = $_FILES['image']['tmp_name'];
    

  $ext = pathinfo($_FILES["image"]["name"], PATHINFO_EXTENSION);

  $rand = md5(uniqid().rand());
  
  $lipics = '1lipics.com_Photo_';
  $post_image = $lipics.$rand.".".$ext;

    $path = $dirNameD.$post_image;

    $dirNameThumbD = 'img/thumb/'.$y.'/'.$m.'/'.$d.'/';
    $thumb_file = $dirNameThumbD.$post_image;

    $dirNameSingleD = 'img/single/'.$y.'/'.$m.'/'.$d.'/';
    $single_file = $dirNameSingleD.$post_image;


        $ext = pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);
        $iname = basename($_FILES['image']['name'], ".".$ext);

        $image = $_FILES['image']['name'];
        $itags = $_POST['itags'];


    if (move_uploaded_file($_FILES['image']['tmp_name'], $path)) {

        $oimage =  $dirNameD . $post_image;
        resize(320, $post_image, $oimage);
        resize720(720, $post_image, $oimage);
        $user = getUsername();
        $userID = getUserID();
        $sql = "INSERT INTO `image`(`iname`, `image`, `thumb`, `single`, `itags`, `image_by`) VALUES ('$post_image','$path','$thumb_file','$single_file','$itags','$userID' )";
        mysqli_query($connection, $sql);

        $smsg = "Image Uploaded Successfuly";
    }else {
       $fmsg = "An Error Occure During Upload";
    }
}
$term = 'By Accepting Terms of Upload,  I Only Upload Image on Own Right, I Can Not Uplode Others Images or Photos.' ;
?>


<link rel="stylesheet" href="assets/css/1li-loading.min.css">
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="assets/js/1li-loading.min.js"></script>

   <div class="upload">
        <div class="main-agileits">
                <div class="form-w3agile form1">
                    <h3>Upload Image</h3>
                    <?php if(isset($smsg)){ ?><div class="alert alert-success alert-dismissable" role="alert"><button aria-hidden="true" data-dismiss="alert" class="close" type="button"> × </button> <?php echo $smsg; ?> </div><?php } ?>
                    <?php if(isset($smsg)){ ?><div class="alert alert-success alert-dismissable" role="alert"><button aria-hidden="true" data-dismiss="alert" class="close" type="button"> × </button> <?php echo $tsms; ?> </div><?php } ?>
                    <?php if(isset($fmsg)){ ?><div class="alert alert-danger alert-dismissable" role="alert"><button aria-hidden="true" data-dismiss="alert" class="close" type="button"> × </button> <?php echo $fmsg; ?> </div><?php } ?>

                    <form action="" method="post" enctype="multipart/form-data">
                        <div class="key">
                            <i class="fa fa-picture-o" aria-hidden="true"></i>
                            <input  type="file" id="imgInp" value="Select" name="image" required="required" accept="image/*" onchange="validateFileType()">
                            <div class="clearfix"></div>
                        </div>
                        <!-- Image Show Start -->
                        <div style="margin-bottom: 2em;">
                            <img class="img-responsive" id="preview" src="" alt="" hidden="hidden" />
                        </div>    
                        
                            <!-- Image Show End -->
                        <div class="key">
                            <i class="fa fa-tags" aria-hidden="true"></i>
                            <input type="text" placeholder="Write Some Tags" class="" name="itags" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = '';}">
                            <div class="clearfix"></div>
                        </div>
                        <div style="padding-bottom: 10px;">
                            <label class="checkbox-inline"><input required="required" type="checkbox" name="check" value="">I Agree With <a style="color: green;" data-toggle="tooltip" data-placement="right" title="<?php echo $term; ?>">Terms of Upload</a>  </label>
                        </div>
                        <input class="demo1" type="submit" value="Upload" name="upload" id="uploadButton" >
                    </form>
                </div>

            </div>
        </div>
<script>

$( ".demo1" ).click(function() {
$.showLoading({allowHide: true});  
e.preventDefault();
});

// live view image start
function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#preview')
                        .attr('src', e.target.result);
                };

                reader.readAsDataURL(input.files[0]);
            }
        }

$("#imgInp").change(function(){
    readURL(this);
});
// live view image end

$('INPUT[type="file"]').change(function () {
    var ext = this.value.match(/\.(.+)$/)[1];
    switch (ext) {
        case 'jpg':
        case 'jpeg':
        case 'png':
            $('#uploadButton').attr('disabled', false);
            break;
        default:
            swal('only JPEG, PNG and png File Allowed.');
            this.value = '';
    }
});




$("input[type=file]").checkImageSize();
$('[name=itags]').tagify();

$(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip();
});

</script>
<?php
include 'layout/footer.php';
?>
