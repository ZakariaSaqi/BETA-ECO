<?php
session_start();
if(!isset($_SESSION['ide'])){
  header('location:../login.php');
}else{
  require_once('../connexion.php');
  ?>
<html lang="en">
<head>
  <title>Admin - Cours</title>
  <?php include('links.html') ?>
</head>

<body>
  <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
    data-sidebar-position="fixed" data-header-position="fixed">
    <?php include('navbar.php') ?>
    <div class="container-fluid">
      <div class="page-content container-fluid " id="page-content">
        <div class="">
          <div class="row container d-flex justify-content-center">
            <div class="col-md-12">
              <div class="card card-bordered ">
                <div class="card-header">
                  <h4 class="card-title"><strong>Nous vous répondrons bientôt</strong></h4>
                </div>


                <div class="ps-container ps-theme-default ps-active-y" id="chat-content"
                  style="overflow-y: scroll !important; height:400px !important;">
                  <div class="media media-chat">
                    <img class="avatar" src="../images//website/iconBlue.svg" alt="...">
                    <div class="media-body">
                      <p>Hi</p>
                      <p>How are you ...???</p>
                      <p>What are you doing tomorrow?<br> Can we come up a bar?</p>
                      <p class="meta"><time datetime="2018">23:58</time></p>
                    </div>
                  </div>

                  <div class="media media-meta-day">Today</div>

                  <div class="media media-chat media-chat-reverse">
                    <div class="media-body">
                      <p>Hiii, I'm good.</p>
                      <p>How are you doing?</p>
                      <p>Long time no see! Tomorrow office. will be free on sunday.</p>
                      <p class="meta"><time datetime="2018">00:06</time></p>
                    </div>
                  </div>

                  <div class="media media-chat">
                    <img class="avatar" src="../images//website/iconBlue.svg" alt="...">
                    <div class="media-body">
                      <p>Okay</p>
                      <p>We will go on sunday? </p>
                      <p class="meta"><time datetime="2018">00:07</time></p>
                    </div>
                  </div>

                  <div class="media media-chat media-chat-reverse">
                    <div class="media-body">
                      <p>That's awesome!</p>
                      <p>I will meet you Sandon Square sharp at 10 AM</p>
                      <p>Is that okay?</p>
                      <p class="meta"><time datetime="2018">00:09</time></p>
                    </div>
                  </div>

                  <div class="media media-chat">
                    <img class="avatar" src="../images//website/iconBlue.svg" alt="...">
                    <div class="media-body">
                      <p>Okay i will meet you on Sandon Square </p>
                      <p class="meta"><time datetime="2018">00:10</time></p>
                    </div>
                  </div>

                  <div class="media media-chat media-chat-reverse">
                    <div class="media-body">
                      <p>Do you have pictures of Matley Marriage?</p>
                      <p class="meta"><time datetime="2018">00:10</time></p>
                    </div>
                  </div>

                  <div class="media media-chat">
                    <img class="avatar" src="../images//website/iconBlue.svg" alt="...">
                    <div class="media-body">
                      <p>Sorry I don't have. i changed my phone.</p>
                      <p class="meta"><time datetime="2018">00:12</time></p>
                    </div>
                  </div>

                  <div class="media media-chat media-chat-reverse">
                    <div class="media-body">
                      <p>Okay then see you on sunday!!</p>
                      <p class="meta"><time datetime="2018">00:12</time></p>
                    </div>
                  </div>

                  <div class="ps-scrollbar-x-rail" style="left: 0px; bottom: 0px;">
                    <div class="ps-scrollbar-x" tabindex="0" style="left: 0px; width: 0px;"></div>
                  </div>
                  <div class="ps-scrollbar-y-rail" style="top: 0px; height: 0px; right: 2px;">
                    <div class="ps-scrollbar-y" tabindex="0" style="top: 0px; height: 2px;"></div>
                  </div>
                </div>

                <!-- <div class="publisher bt-1 border-light">
            <i class="fa-sharp fa-solid fa-user" style="color:#2A3547; font-size: 1.3rem;"></i>
              <input class="publisher-input" type="text" placeholder="Taper quelque chose.">
              <a class="publisher-btn text-info" href="#" data-abc="true"><i class="fa fa-paper-plane"></i></a>
            </div> -->
                <div class="col-md-12">
                  <div class="search">
                    <input type="text" class="form-control ps-0" placeholder="Taper quelque chose.">
                    <button class="btn btn-primary "><i class="fa fa-paper-plane"></i></button>
                  </div>
                </div>

              </div>

            </div>
          </div>
        </div>
</body>
</html>
<?php } ?>