<?php
  include("./connection/DB.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashbord</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
    <!--external css-->
    <link rel="stylesheet" href="quality.css">
    <!-- Font Awesome CSS -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css">    <!--bootstap css-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous"></head>
    <script src="./assets/js/jquery.min.js"></script>
    <script src="./assets/js/bootstrap.min.js"></script>
<body>
    <nav class="navbar fixed-top" style="background-color: rgb(170, 205, 233);">
        <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <form class="d-flex mt-2" role="search">
                <input class="form-control me-1" type="search" placeholder="Search" aria-label="Search" style="width: 300px; background-color:  rgb(231, 235, 238);">
                <button class="btn btn-outline-success" type="submit">Search</button>
            </form>

<!--
  notification
-->
<?php
       $find_notifications = "Select * from inf where active = 1";
       $result = mysqli_query($conn,$find_notifications);
       $count_active = '';
       $notifications_data = array(); 
       $deactive_notifications_dump = array();
        while($rows = mysqli_fetch_assoc($result)){
                $count_active = mysqli_num_rows($result);
                $notifications_data[] = array(
                            "n_id" => $rows['n_id'],
                            "notifications_name"=>$rows['notifications_name'],
                            "message"=>$rows['message']
                );
        }
        //only five specific posts
        $deactive_notifications = "Select * from inf where active = 0 ORDER BY n_id DESC LIMIT 0,5";
        $result = mysqli_query($conn,$deactive_notifications);
        while($rows = mysqli_fetch_assoc($result)){
          $deactive_notifications_dump[] = array(
                      "n_id" => $rows['n_id'],
                      "notifications_name"=>$rows['notifications_name'],
                      "message"=>$rows['message']
          );
        }

     ?>


<ul class="nav navbar-nav navbar-right">
  <li><i class="fa fa-bell"   id="over" data-value ="<?php echo $count_active;?>" style="z-index:-99 !important;font-size:50px;color:white;margin:0.5rem 0.4rem !important;"></i></li>
  <?php if(!empty($count_active)){?>
  <div class="round" id="bell-count" data-value ="<?php echo $count_active;?>"><span><?php echo $count_active; ?></span></div>
  <?php }?>
   
  <?php if(!empty($count_active)){?>
    <div id="list">
     <?php
        foreach($notifications_data as $list_rows){?>
          <li id="message_items">
          <div class="message alert alert-warning" data-id=<?php echo $list_rows['n_id'];?>>
            <span><?php echo $list_rows['notifications_name'];?></span>
            <div class="msg">
              <p><?php 
                echo $list_rows['message'];
              ?></p>
            </div>
          </div>
          </li>
       <?php }
     ?> 
     </div> 
   <?php }else{?>
      <!--old Messages-->
      <div id="list">
      <?php
        foreach($deactive_notifications_dump as $list_rows){?>
          <li id="message_items">
          <div class="message alert alert-danger" data-id=<?php echo $list_rows['n_id'];?>>
            <span><?php echo $list_rows['notifications_name'];?></span>
            <div class="msg">
              <p><?php 
                echo $list_rows['message'];
              ?></p>
            </div>
          </div>
          </li>
       <?php }
     ?>
      <!--old Messages-->
   
   <?php } ?>
   
   </div>
</ul>
            
            <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel" style="background-color: rgb(112, 164, 207); color : white; width: 300px;">
                <div class="offcanvas-header">
                    <img src="img/logo.png" alt="Logo" width="200" height="60">
                    <h3 class="offcanvas-title" id="offcanvasNavbarLabel">Store</h3>
                    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>
                <div class="offcanvas-body">
                    <ul class="navbar-nav justify-content-start flex-grow-1 pe-3">
                    
                        <li class="nav-item">
                            <i class="fas fa-box"></i>
                            <a class="nav-link" href="newProduct.php">New Products</a>
                        </li>
              
    
                        <li class="nav-item">
                            <i class="fas fa-tasks"></i>
                            <a class="nav-link" href="dashbord.html">Checked Product</a>
                        </li>

                        <li class="nav-item">
                            <i class="fas fa-chart-bar"></i>
                            <a class="nav-link" href="dashbord.html">Report</a>
                        </li>
                        <li class="nav-item">
                      
                          <i class="fa-solid fa-user"></i>
                          <a class="nav-link" href="QualityProfile.html">Profile</a>
                      </li>
                        
                        <li class="nav-item">
                            <i class="fas fa-sign-out-alt"></i>
                            <a class="nav-link" href="#">Log out</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>
<!-- Modal to display user profile -->
<div class="modal fade" id="profileModal" tabindex="-1" role="dialog" aria-labelledby="profileModalLabel" aria-hidden="true">
  <div class="modal-dialog custom-modal-lgg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="profileModalLabel">Quality Checker</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <iframe src="StoreManagerProfile.html" style="width: 100%; height: 500px; border: none;"></iframe>
      </div>
    </div>
  </div>
</div>



<script>
  function profile() {
    $('#profileModal').modal('show');
  }
</script>
<script>
$(document).ready(function(){
    var ids = new Array();
    $('#over').on('click',function(){
           $('#list').toggle();  
       });

   //Message with Ellipsis
   $('div.msg').each(function(){
       var len =$(this).text().trim(" ").split(" ");
      if(len.length > 12){
         var add_elip =  $(this).text().trim().substring(0, 65) + "…";
         $(this).text(add_elip);
      }
     
}); 


   $("#bell-count").on('click',function(e){
        e.preventDefault();

        let belvalue = $('#bell-count').attr('data-value');
        
        if(belvalue == ''){
         
          console.log("inactive");
        }else{
          $(".round").css('display','none');
          $("#list").css('display','block');
          
          // $('.message').each(function(){
          // var i = $(this).attr("data-id");
          // ids.push(i);
          
          // });
          //Ajax
          $('.message').click(function(e){
            e.preventDefault();
              $.ajax({
                url:'./connection/deactive.php',
                type:'POST',
                data:{"id":$(this).attr('data-id')},
                success:function(data){
                 
                    console.log(data);
                    location.reload();
                }
            });
        });
     }
   });

   $('#notify').on('click',function(e){
        e.preventDefault();
        var name = $('#notifications_name').val();
        var ins_msg = $('#message').val();
        if($.trim(name).length > 0 && $.trim(ins_msg).length > 0){
          var form_data = $('#frm_data').serialize();
        $.ajax({
          url:'./connection/insert.php',
                type:'POST',
                data:form_data,
                success:function(data){
                    location.reload();
                }
        });
        }else{
          alert("Please Fill All the fields");
        }
      
       
   });
});
</script>
    <!--bootsrap js-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>

