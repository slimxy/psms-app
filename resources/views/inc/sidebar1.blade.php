<div class="sidebar  mb-5">
        <div class="sidebar_container">
          <div class="sidebar_item">
            <i class="fas fa-th-large" id="dash" onclick="tog()"></i>
            <a href="/admin/index"> <p>Dashboard</p> </a>
          </div>
          <div class="sidebar_item">
            <i class="fas fa-link"></i>
            <a href="{{route('station')}}"> <p>Stations</p></a>
          </div>
          <div class="sidebar_item">
            <i class="fas fa-users"></i>
            <a href="/admin/managers">   <p>Managers</p> </a>
          </div>
          <div class="sidebar_item">
            <i class="fas fa-book"></i>
            <a href="/admin/managers">   <p>Records</p> </a>
          </div>
          <div class="sidebar_item">
            <i class="fas fa-eye"></i>
            <a href="/admin/manager/{manager}"> <p>Activities</p> </a>
          </div>
                  <div class="sidebar_item">
            <i class="fas fa-id-card"></i>
            <a href="/admin/profile"><p>Profile</p></a>
          </div>
        </div>
    </div>
