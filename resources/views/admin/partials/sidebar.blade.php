<nav class="sidebar sidebar-offcanvas" id="sidebar">
  <ul class="nav">
    <li class="nav-item">
      <a class="nav-link" href="{{ route('dashboard') }}">
        <i class="mdi mdi-grid-large menu-icon"></i>
        <span class="menu-title">Dashboard</span>
      </a>
    </li>
    <li class="nav-item nav-category">____________________</li>
    
    <li class="nav-item">
      <a class="nav-link" href="{{ route('index.wilayah') }}">
        <i class="menu-icon mdi mdi-card-text-outline"></i>
        <span class="menu-title">Wilayah</span>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="{{ route('index.hadiah') }}">
        <i class="menu-icon mdi mdi-chart-line"></i>
        <span class="menu-title">Hadiah</span>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="/admin/nasabah">
        <i class="menu-icon mdi mdi-file-document"></i>
        <span class="menu-title">Data Nasabah</span>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="{{ route('dataPemenang') }}">
        <i class="menu-icon mdi mdi-account-circle-outline"></i>
        <span class="menu-title">Data Pemenang</span>
      </a>
    </li>
  </ul>
</nav>