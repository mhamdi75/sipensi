<a class="sidebar-toggle js-sidebar-toggle">
     <i class="hamburger align-self-center"></i>
</a>

<div class="navbar-collapse collapse">
     <ul class="navbar-nav navbar-align">
          <li class="nav-item dropdown">
               <?= $this->include('layout/notifikasi') ?>
          </li>
          <li class="nav-item dropdown">
               <a class="nav-icon dropdown-toggle d-inline-block d-sm-none" href="#" data-bs-toggle="dropdown">
                    <i class="align-middle" data-feather="settings"></i>
               </a>

               <a class="nav-link dropdown-toggle d-none d-sm-inline-block" href="#" data-bs-toggle="dropdown">
                    <img src="<?= base_url('img/user.png') ?>" class="avatar img-fluid rounded me-1" alt="Charles Hall" /> <span class="text-dark"><?= session('nama') ?></span>
               </a>
               <div class="dropdown-menu dropdown-menu-end">
                    <a class="dropdown-item" href="javascript:void(0)"><i class="align-middle me-1" data-feather="user"></i> Profil</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="javascript:void(0)"><i class="align-middle me-1" data-feather="settings"></i> Pengaturan</a>
                    <a class="dropdown-item" href="https://www.stmik-wp.ac.id/"><i class="align-middle me-1" data-feather="help-circle"></i> Help Desk</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="<?= base_url('logout') ?>" onclick="event.preventDefault(); $('#logout').submit();"><i class="align-middle me-1" data-feather="log-out"></i> Log out</a>
                    <form id="logout" action="<?= base_url('logout') ?>" method="post"></form>
               </div>
          </li>
     </ul>
</div>