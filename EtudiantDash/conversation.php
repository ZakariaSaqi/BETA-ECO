<style>
  .card-bordered {
    border: 1px solid #ebebeb;
  }

  .card {
    border: 0;
    border-radius: 0px;
    margin-bottom: 30px;
    -webkit-box-shadow: 0 2px 3px rgba(0, 0, 0, 0.03);
    box-shadow: 0 2px 3px rgba(0, 0, 0, 0.03);
    -webkit-transition: .5s;
    transition: .5s;
  }

  .padding {
    padding: 3rem !important
  }

  body {
    background-color: #f9f9fa
  }

  .card-header:first-child {
    border-radius: calc(.25rem - 1px) calc(.25rem - 1px) 0 0;
  }


  .card-header {
    display: -webkit-box;
    display: flex;
    -webkit-box-pack: justify;
    justify-content: space-between;
    -webkit-box-align: center;
    align-items: center;
    padding: 15px 20px;
    background-color: transparent;
    border-bottom: 1px solid rgba(77, 82, 89, 0.07);
  }

  .card-header .card-title {
    padding: 0;
    border: none;
  }

  h4.card-title {
    font-size: 17px;
  }

  .card-header>*:last-child {
    margin-right: 0;
  }

  .card-header>* {
    margin-left: 8px;
    margin-right: 8px;
  }

  .btn-secondary {
    color: #4d5259 !important;
    background-color: #e4e7ea;
    border-color: #e4e7ea;
    color: #fff;
  }

  .btn-xs {
    font-size: 11px;
    padding: 2px 8px;
    line-height: 18px;
  }

  .btn-xs:hover {
    color: #fff !important;
  }




  .card-title {
    font-family: Roboto, sans-serif;
    font-weight: 300;
    line-height: 1.5;
    margin-bottom: 0;
    padding: 15px 20px;
    border-bottom: 1px solid rgba(77, 82, 89, 0.07);
  }


  .ps-container {
    position: relative;
  }

  .ps-container {
    -ms-touch-action: auto;
    touch-action: auto;
    overflow: hidden !important;
    -ms-overflow-style: none;
  }

  .media-chat {
    padding-right: 64px;
    margin-bottom: 0;
  }

  .media {
    padding: 16px 12px;
    -webkit-transition: background-color .2s linear;
    transition: background-color .2s linear;
  }

  .media .avatar {
    flex-shrink: 0;
  }

  .avatar {
    position: relative;
    display: inline-block;
    width: 36px;
    height: 36px;
    line-height: 36px;
    text-align: center;
    border-radius: 100%;
    background-color: #f5f6f7;
    color: #8b95a5;
    text-transform: uppercase;
  }

  .media-chat .media-body {
    -webkit-box-flex: initial;
    flex: initial;
    display: table;
  }

  .media-body {
    min-width: 0;
  }

  .media-chat .media-body p {
    position: relative;
    padding: 6px 8px;
    margin: 4px 0;
    background-color: #f5f6f7;
    border-radius: 3px;
    font-weight: 100;
    color: #2A3547;
  }

  .media>* {
    margin: 0 8px;
  }

  .media-chat .media-body p.meta {
    background-color: transparent !important;
    padding: 0;
    opacity: .8;
  }

  .media-meta-day {
    -webkit-box-pack: justify;
    justify-content: space-between;
    -webkit-box-align: center;
    align-items: center;
    margin-bottom: 0;
    color: #8b95a5;
    opacity: .8;
    font-weight: 400;
  }

  .media {
    padding: 16px 12px;
    -webkit-transition: background-color .2s linear;
    transition: background-color .2s linear;
  }

  .media-meta-day::before {
    margin-right: 16px;
  }

  .media-meta-day::before,
  .media-meta-day::after {
    content: '';
    -webkit-box-flex: 1;
    flex: 1 1;
    border-top: 1px solid #ebebeb;
  }

  .media-meta-day::after {
    content: '';
    -webkit-box-flex: 1;
    flex: 1 1;
    border-top: 1px solid #ebebeb;
  }

  .media-meta-day::after {
    margin-left: 16px;
  }
  .table thead {
    color: white;
    background-color: #5D87FF;
}

.search {
    position: relative;
    box-shadow: 0 0 40px rgba(51, 51, 51, .1);

}

.search input {

    height: 40px;
    text-indent: 25px;
    border: 1px solid #5D87FF;
    width: 100%;


}

.search input:focus {

    box-shadow: none;
    border: 1px solid #5D87FF;


}

.search button {

    position: absolute;
    top: 0px;
    right: 0px;
    height: 100%;
    border-radius: 0 5px 5px 0;
    background: #5D87FF;

}
  .media-chat.media-chat-reverse {
    padding-right: 12px;
    padding-left: 64px;
    -webkit-box-orient: horizontal;
    -webkit-box-direction: reverse;
    flex-direction: row-reverse;
  }

  .media-chat {
    padding-right: 64px;
    margin-bottom: 0;
  }

  .media {
    padding: 16px 12px;
    -webkit-transition: background-color .2s linear;
    transition: background-color .2s linear;
  }

  .media-chat.media-chat-reverse .media-body p {
    float: right;
    clear: right;
    background-color: #5D87FF;
    color: #fff;
  }

  .media-chat .media-body p {
    position: relative;
    padding: 6px 8px;
    margin: 4px 0;
    background-color: #f5f6f7;
    border-radius: 3px;
  }


  .border-light {
    border-color: #f1f2f3 !important;
  }

  .bt-1 {
    border-top: 1px solid #ebebeb !important;
  }
  .text-info {
    color: #48b0f7 !important;
  }
</style>
<!-- <section id="annonces" class="hero-wrap hero-wrap-2" style="background-image: url('../images/website/etudiant.jpg');"
    data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
      <div class="row no-gutters slider-text align-items-end">
        <div class="col-md-9 ftco-animate pb-5">
          <p class="breadcrumbs mb-2"><span class="mr-2"><a href="index.html">Accueil <i
                  class="ion-ios-arrow-forward"></i></a></span> <span>Conversation <i
                class="ion-ios-arrow-forward"></i></span></p>
          <h1 class="mb-0 bread">Conversation</h1>
        </div>
      </div>
    </div>
  </section> -->
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
                            <input type="text" class="form-control ps-0"
                                placeholder="Taper quelque chose.">
                            <button class="btn btn-primary "><i class="fa fa-paper-plane"></i></button>
                        </div>
                    </div>

        </div>
      </div>

  </div>
</div>