<?php 
session_start();
if(!isset($_SESSION['admin_name'])){
   header("Location:signin.php");
}
$admintitle = 'Dashboard';
include 'header.php';
include 'sidebar.php';


?>
        <div id="page-wrapper" class="gray-bg dashbard-1">
<div class="content-main">
   
            <div class="banner">
           
                <h2>
                <a href="./index">Home</a>
                <i class="fa fa-angle-right"></i>
                <span>Dashboard</span>
                </h2>
            </div>
        <div class="content-top">
            
            
            <div class="col-md-2 ">
                <div class="content-top-1">
                <div class="col-md-6 top-content">
                    <?php $ures = mysqli_query($con, "SELECT * FROM usermanagement");  $urows = mysqli_num_rows($ures); ?>
                    <h5><a href="./users">Total Users</a></h5>
                    <label><?php echo $urows ?></label>
                </div>
                 <div class="clearfix"> </div>
                </div>
                <div class="content-top-1">
                <div class="col-md-6 top-content">
                <?php $res = mysqli_query($con, "SELECT * FROM image");  $irows = mysqli_num_rows($res); ?>
                    <h5><a href="./image">Total Images</a></h5>
                    <label><?php echo $irows ?></label>
                </div>
                 <div class="clearfix"> </div>
                </div>
                <div class="content-top-1">
                <div class="col-md-6 top-content">
                <?php $wres = mysqli_query($con, "SELECT * FROM image where approved=0");  $wrows = mysqli_num_rows($wres); ?>
                    <h5><a href="./unapproved.php"> Waiting For Approval</a></h5>
                    <label><?php echo $wrows ?></label>
                </div>
                 <div class="clearfix"> </div>
                </div>
            </div>

            <div class="col-md-2 ">
                <div class="content-top-1">
                <div class="col-md-6 top-content">
                    <?php $ures = mysqli_query($con, "SELECT * FROM usermanagement where DATE(join_date)=CURDATE()");  $urows = mysqli_num_rows($ures); ?>
                    <h5>Today New Users</h5>
                    <label><?php echo $urows ?></label>
                </div>
                 <div class="clearfix"> </div>
                </div>
                <div class="content-top-1">
                <div class="col-md-6 top-content">
                 <?php $tres = mysqli_query($con, "SELECT * FROM image where DATE(date)=CURDATE()");  $trows = mysqli_num_rows($tres); ?>
                    <h5>Today New Images</h5>
                    <label><?php echo $trows ?></label>
                </div>
                 <div class="clearfix"> </div>
                </div>
                <div class="content-top-1">
                <div class="col-md-6 top-content">
                <?php $wres = mysqli_query($con, "SELECT * FROM image where approved=1");  $wrows = mysqli_num_rows($wres); ?>
                    <h5>Approved Images</h5>
                    <label><?php echo $wrows ?></label>
                </div>
                 <div class="clearfix"> </div>
                </div>
            </div>


            </div>

        <div class="col-md-8 content-top-2">
                <!---start-chart -->
                <!-- -->
            <div class="content-graph">
                <div class="content-color">
                    <div class="content-ch"><p><i></i>Chrome </p><span>100%</span>
                    <div class="clearfix"> </div>
                    </div>
                    <div class="content-ch1"><p><i></i>Safari</p><span> 50%</span>
                    <div class="clearfix"> </div>
                    </div>
                </div>
                        <!--graph-->
                <link rel="stylesheet" href="css/graph.css">
                            <script src="js/jquery.flot.js"></script>
                                    <script>$(document).ready(function(){var graphData=[{data:[[6,1300],[7,1600],[8,1900],[9,2100],[10,2500],[11,2200],[12,2000],[13,1950],[14,1900],[15,2000]],color:'#999999'},{data:[[6,500],[7,600],[8,550],[9,600],[10,800],[11,900],[12,800],[13,850],[14,830],[15,1000]],color:'#999999',points:{radius:4,fillColor:'#7f8c8d'}}];$.plot($('#graph-lines'),graphData,{series:{points:{show:true,radius:5},lines:{show:true},shadowSize:0},grid:{color:'#7f8c8d',borderColor:'transparent',borderWidth:20,hoverable:true},xaxis:{tickColor:'transparent',tickDecimals:2},yaxis:{tickSize:1000}});$.plot($('#graph-bars'),graphData,{series:{bars:{show:true,barWidth:.9,align:'center'},shadowSize:0},grid:{color:'#7f8c8d',borderColor:'transparent',borderWidth:20,hoverable:true},xaxis:{tickColor:'transparent',tickDecimals:2},yaxis:{tickSize:1000}});$('#graph-bars').hide();$('#lines').on('click',function(e){$('#bars').removeClass('active');$('#graph-bars').fadeOut();$(this).addClass('active');$('#graph-lines').fadeIn();e.preventDefault();});$('#bars').on('click',function(e){$('#lines').removeClass('active');$('#graph-lines').fadeOut();$(this).addClass('active');$('#graph-bars').fadeIn().removeClass('hidden');e.preventDefault();});function showTooltip(x,y,contents){$('<div id="tooltip">'+contents+'</div>').css({top:y-16,left:x+20}).appendTo('body').fadeIn();} var previousPoint=null;$('#graph-lines, #graph-bars').bind('plothover',function(event,pos,item){if(item){if(previousPoint!=item.dataIndex){previousPoint=item.dataIndex;$('#tooltip').remove();var x=item.datapoint[0],y=item.datapoint[1];showTooltip(item.pageX,item.pageY,y+' visitors at '+x+'.00h');}}else{$('#tooltip').remove();previousPoint=null;}});});</script>
                                <div class="graph-container">
                                    
                                    <div id="graph-lines"> </div>
                                    <div id="graph-bars"> </div>
                                </div>
            </div>
        </div>
        <div class="clearfix"> </div>
<div class="content-mid">
            
            <div style="padding: 20px;" class="col-md-5">
                     <div class="cal1 cal_2"><div class="clndr"><div class="clndr-controls"><div class="clndr-control-button"><p class="clndr-previous-button">previous</p></div><div class="month">July 2015</div><div class="clndr-control-button rightalign"><p class="clndr-next-button">next</p></div></div><table class="clndr-table" border="0" cellspacing="0" cellpadding="0"><thead><tr class="header-days"><td class="header-day">S</td><td class="header-day">M</td><td class="header-day">T</td><td class="header-day">W</td><td class="header-day">T</td><td class="header-day">F</td><td class="header-day">S</td></tr></thead><tbody><tr><td class="day adjacent-month last-month calendar-day-2015-06-28"><div class="day-contents">28</div></td><td class="day adjacent-month last-month calendar-day-2015-06-29"><div class="day-contents">29</div></td><td class="day adjacent-month last-month calendar-day-2015-06-30"><div class="day-contents">30</div></td><td class="day calendar-day-2015-07-01"><div class="day-contents">1</div></td><td class="day calendar-day-2015-07-02"><div class="day-contents">2</div></td><td class="day calendar-day-2015-07-03"><div class="day-contents">3</div></td><td class="day calendar-day-2015-07-04"><div class="day-contents">4</div></td></tr><tr><td class="day calendar-day-2015-07-05"><div class="day-contents">5</div></td><td class="day calendar-day-2015-07-06"><div class="day-contents">6</div></td><td class="day calendar-day-2015-07-07"><div class="day-contents">7</div></td><td class="day calendar-day-2015-07-08"><div class="day-contents">8</div></td><td class="day calendar-day-2015-07-09"><div class="day-contents">9</div></td><td class="day calendar-day-2015-07-10"><div class="day-contents">10</div></td><td class="day calendar-day-2015-07-11"><div class="day-contents">11</div></td></tr><tr><td class="day calendar-day-2015-07-12"><div class="day-contents">12</div></td><td class="day calendar-day-2015-07-13"><div class="day-contents">13</div></td><td class="day calendar-day-2015-07-14"><div class="day-contents">14</div></td><td class="day calendar-day-2015-07-15"><div class="day-contents">15</div></td><td class="day calendar-day-2015-07-16"><div class="day-contents">16</div></td><td class="day calendar-day-2015-07-17"><div class="day-contents">17</div></td><td class="day calendar-day-2015-07-18"><div class="day-contents">18</div></td></tr><tr><td class="day calendar-day-2015-07-19"><div class="day-contents">19</div></td><td class="day calendar-day-2015-07-20"><div class="day-contents">20</div></td><td class="day calendar-day-2015-07-21"><div class="day-contents">21</div></td><td class="day calendar-day-2015-07-22"><div class="day-contents">22</div></td><td class="day calendar-day-2015-07-23"><div class="day-contents">23</div></td><td class="day calendar-day-2015-07-24"><div class="day-contents">24</div></td><td class="day calendar-day-2015-07-25"><div class="day-contents">25</div></td></tr><tr><td class="day calendar-day-2015-07-26"><div class="day-contents">26</div></td><td class="day calendar-day-2015-07-27"><div class="day-contents">27</div></td><td class="day calendar-day-2015-07-28"><div class="day-contents">28</div></td><td class="day calendar-day-2015-07-29"><div class="day-contents">29</div></td><td class="day calendar-day-2015-07-30"><div class="day-contents">30</div></td><td class="day calendar-day-2015-07-31"><div class="day-contents">31</div></td><td class="day adjacent-month next-month calendar-day-2015-08-01"><div class="day-contents">1</div></td></tr></tbody></table></div></div>
                      <!-- Calender -->
                    <link rel="stylesheet" href="css/clndr.css" type="text/css" />
                    <script src="js/underscore-min.js" type="text/javascript"></script>
                    <script src= "js/moment-2.2.1.js" type="text/javascript"></script>
                    <script src="js/clndr.js" type="text/javascript"></script>
                    <script src="js/site.js" type="text/javascript"></script>
                    <!-- End Calender -->
            </div>
            <div style="padding: 20px;" class="col-md-7 mid-content-top">
                <div class="middle-content"><h3>Latest Images</h3>
                    <div id="owl-demo" class="owl-carousel text-center">
                        <?php 
                        $res = mysqli_query($con, "SELECT * FROM image ORDER BY date DESC LIMIT 21");
                        while ($row=mysqli_fetch_array($res)) {
                        ?><div class="item"><a target="_blank" href="edit.php?id=<?php echo $row['id'] ?>"><img class="lazyOwl img-responsive" data-src="../<?php echo $row['thumb'] ?>" width="280px" height="100px"  alt="name"></a></div><?php  } ?></div></div></div>
        <link href="css/owl.carousel.css" rel="stylesheet">
        <script src="js/owl.carousel.js"></script>
            <script>
                $(document).ready(function() {
                    $("#owl-demo").owlCarousel({
                        items : 3,
                        lazyLoad : true,
                        autoPlay : false,
                        pagination : true,
                        nav:true,
                    });
                });
            </script>
            </div>
            <div class="clearfix"> </div>
        </div>     
<?php
include 'footer.php';
?>

