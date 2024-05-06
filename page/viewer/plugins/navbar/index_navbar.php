<style>
  @font-face {
    font-family: 'Poppins';
    src: url('../../dist/font/poppins/Poppins-Regular.ttf') format('truetype');
  }

  body {
    font-family: 'Poppins', sans-serif;
  }

  /* scrollbar */
  /* width */
  ::-webkit-scrollbar {
    width: 8px;
    height: 8px;
  }

  /* Track */
  ::-webkit-scrollbar-track {
    background: #f1f1f1;
    border-radius: 10px;
  }

  /* Handle */
  ::-webkit-scrollbar-thumb {
    background: #888;
    border-radius: 10px;
  }

  /* Handle on hover */
  ::-webkit-scrollbar-thumb:hover {
    background: #332D2D;
  }
</style>

<!-- Navbar -->
<nav class="main-header navbar navbar-expand-md border-bottom-0" style="background:#292929;">
  <a href="" class="navbar-brand ml-2">
    <img src="../../dist/img/tool-box.png" alt="Repair Record System Logo" class="brand-image" style="opacity: .8">
    <span class="brand-text font-weight-normal text-light" style="color: white;">Repair Record System </span>
  </a>

  <button class="navbar-toggler order-1" type="button" data-toggle="collapse" data-target="#navbarCollapse"
    aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse order-3" id="navbarCollapse">
    <!-- Left navbar links -->
    <!-- <ul class="navbar-nav">
      <li class="nav-item">
        <a href="" class="nav-link active"><i class="fas fa-home"></i> Homepage</a>
      </li>
    </ul> -->
  </div>

  <!-- Right navbar links -->
  <ul class="order-1 order-md-3 navbar-nav navbar-no-expand ml-auto">
    <li class="nav-item mr-2">
      <a href="/repair_record_system/" class="nav-link btn btn-block"
        style="border-radius: 3px;background: #E89F4C;color: #000;box-shadow: 0px 4px 4px 0px rgba(0, 0, 0, 0.25); width:100px;"
        onmouseover="this.style.backgroundColor='#EA922E'; this.style.color='#000';"
        onmouseout="this.style.backgroundColor='#E89F4C'; this.style.color='#000';">
        Login</a>
    </li>
  </ul>
</nav>
<!-- /.navbar -->