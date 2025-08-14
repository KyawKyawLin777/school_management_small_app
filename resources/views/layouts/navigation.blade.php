  <style>
      #time-button {
          display: flex;
          align-items: center;
          justify-content: center;
          font-size: 16px;
      }

      .search-icon {
          margin-right: 8px;
          color: white !important;
          mix-blend-mode: difference;
      }

      .btn-clock {
          color: white;
          mix-blend-mode: difference;
          padding: 5px;
          border-radius: 5px;
      }

      .btn-search {
          display: flex;
          align-items: center;
      }

      #time-button {
          display: flex;
          align-items: center;
      }

      #current-time {
          color: white !important;
          mix-blend-mode: difference;
      }

      .user-box .u-text h4,
      .user-box .u-text h6 {
          mix-blend-mode: difference;
          color: white;
      }

      .changelogout {
          background-color: #dc3545;
          color: white;
          border: none;
          border-radius: 5px;
          padding: 8px 12px;
          cursor: pointer;
      }

      .changelogout i {
          color: white;
      }

      .changelogout:hover {
          background-color: #c82333;
      }
  </style>




  <!-- Navbar Header -->
  <nav class="navbar navbar-header navbar-header-transparent navbar-expand-lg border-bottom">
      <div class="container-fluid">
          <nav class="navbar navbar-header-left navbar-expand-lg navbar-form nav-search p-0 d-none d-lg-flex btn-clock">
              <i class="fa fa-clock search-icon nav-search"></i>
              <span class="nav-search" id="current-time">--:--:--</span>
          </nav>

          <ul class="navbar-nav topbar-nav ms-md-auto align-items-center">

              <li class="nav-item topbar-user dropdown hidden-caret">
                  <a class="dropdown-toggle profile-pic" data-bs-toggle="dropdown" href="#" aria-expanded="false">
                      <div class="avatar-sm">
                          <img src="{{ asset('img/user.png') }}" alt="..." class="avatar-img rounded-circle" />
                      </div>
                      <span class="profile-username">
                          <span class="fw-bold">{{ auth()->user()->name }}</span>
                      </span>
                  </a>
                  <ul class="dropdown-menu dropdown-user animated fadeIn">
                      <div class="dropdown-user-scroll scrollbar-outer">
                          <li>
                              <div class="user-box">
                                  <div class="u-text">
                                      <h4>{{ auth()->user()->name }}</h4>
                                      <h6>{{ auth()->user()->email }}</h6>
                                  </div>
                              </div>
                          </li>
                          <li>
                              <div class="dropdown-divider"></div>
                              <form method="POST" action="{{ route('logout') }}"
                                  onsubmit="return confirm('Are you sure you want to logout?');"
                                  class="d-flex justify-content-center">
                                  @csrf
                                  <button type="submit" class="p-1 btn changelogout">
                                      <i class="fa-solid fa-right-from-bracket"></i> Logout
                                  </button>
                              </form>
                          </li>

                      </div>
                  </ul>
              </li>
          </ul>
      </div>
  </nav>
  <script>
      function updateTime() {
          const now = new Date();
          let hours = now.getHours();
          const minutes = String(now.getMinutes()).padStart(2, '0');
          const seconds = String(now.getSeconds()).padStart(2, '0');
          const ampm = hours >= 12 ? 'PM' : 'AM';
          hours = hours % 12;
          hours = hours ? hours : 12;
          const timeString = `${String(hours).padStart(2, '0')}:${minutes}:${seconds} ${ampm}`;
          document.getElementById('current-time').textContent = timeString;
      }

      setInterval(updateTime, 1000);

      updateTime();
  </script>
