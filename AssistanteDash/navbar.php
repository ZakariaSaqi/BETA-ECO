<aside class="left-sidebar ">
      <!-- Sidebar scroll-->
      <div>
        <div class="brand-logo d-flex align-items-center justify-content-between">
          <a href="../index.php" class="text-nowrap logo-img pt-4 px-4">
            <img src="../images/website/iconText.png" width="140" alt="" />
          </a>
          <div class="close-btn d-xl-none d-block sidebartoggler cursor-pointer" id="sidebarCollapse">
            <i class="ti ti-x fs-8"></i>
          </div>
        </div>
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav scroll-sidebar" data-simplebar="">
          <ul id="sidebarnav">
          <li class="nav-small-cap">
              <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
              <span class="hide-menu">Système</span>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="assistants.php" aria-expanded="false">
                <span>
                  <i class="fa-solid fa-users"></i>
                </span>
                <span class="hide-menu">Assistants</span>
              </a>
            </li>
            <li class="nav-small-cap">
              <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
              <span class="hide-menu">Cabinet comptable</span>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="clients.php" aria-expanded="false">
                <span>
                  <i class="fa-solid fa-users"></i>
                </span>
                <span class="hide-menu">Clients</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="annonces.php" aria-expanded="false">
                <span>
                  <i class="fa-sharp fa-solid fa-bullhorn"></i>
                </span>
                <span class="hide-menu">Annonces</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="services.php" aria-expanded="false">
                <span>
                  <i class="fa-sharp fa-solid fa-list"></i>
                </span>
                <span class="hide-menu">Services</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="commentaires.php" aria-expanded="false">
                <span>
                  <i class="fa-solid fa-comment"></i>
                </span>
                <span class="hide-menu">Commentaires</span>
              </a>
            </li>
            <li class="nav-small-cap">
              <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
              <span class="hide-menu">Cours soutien</span>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="etudiant.php" aria-expanded="false">
                <span>
                  <i class="fa-solid fa-users"></i>
                </span>
                <span class="hide-menu">Etudiants</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="cours.php" aria-expanded="false">
                <span>
                  <i class="fa-solid fa-book"></i>
                </span>
                <span class="hide-menu">Cours</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="seances.php" aria-expanded="false">
                <span>
                <i class="fa-sharp fa-solid fa-calendar"></i>
                </span>
                <span class="hide-menu">Séance</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="absences.php" aria-expanded="false">
                <span>
                <i class="fa-solid fa-user-slash"></i>
                </span>
                <span class="hide-menu">Absences</span>
              </a>
            </li>
          </ul>
        </nav>
        <!-- End Sidebar navigation -->
      </div>
      <!-- End Sidebar scroll-->
    </aside>
    <!--  Sidebar End -->
    <!--  Main wrapper -->
    <div class="body-wrapper">
      <!--  Header Start -->
      <header class="app-header">
        <nav class="navbar navbar-expand-lg navbar-light">
          <ul class="navbar-nav">
            <li class="nav-item d-block d-xl-none">
              <a class="nav-link sidebartoggler nav-icon-hover" id="headerCollapse" href="javascript:void(0)">
                <i class="ti ti-menu-2"></i>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link nav-icon-hover" href="index.php">
                <i class="fa-solid fa-house"></i>
                 </a>
            </li>
            <li class="nav-item">
              <a class="nav-link nav-icon-hover" href="javascript:void(0)">
                <i class="fa-solid fa-bell"></i>
                <div class="notification bg-primary rounded-circle"></div>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link nav-icon-hover" href="conversation.php">
                <i class="fa-solid fa-message"></i>
                <div class="notification bg-primary rounded-circle"></div>
              </a>
            </li>
          </ul>
          <div class="navbar-collapse justify-content-end px-0" id="navbarNav">
            <ul class="navbar-nav flex-row ms-auto align-items-center justify-content-end">
              <li class="nav-item dropdown">
                <a class="nav-link nav-icon-hover" href="javascript:void(0)" id="drop2" data-bs-toggle="dropdown"
                  aria-expanded="false">
                  <i class="fa-solid fa-user"></i>
                </a>
                <div class="dropdown-menu dropdown-menu-end dropdown-menu-animate-up" aria-labelledby="drop2">
                  <div class="message-body">
                    <a href="profil.php" class="d-flex align-items-center gap-2 dropdown-item">
                      <i class="ti ti-mail fs-6"></i>
                      <p class="mb-0 fs-3">My Account</p>
                    </a>
                    <a href="./authentication-login.html" class="btn btn-outline-primary mx-3 mt-2 d-block">Logout</a>
                  </div>
                </div>
              </li>
            </ul>
          </div>
        </nav>
      </header>