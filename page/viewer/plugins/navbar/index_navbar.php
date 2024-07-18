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
    <img src="../../dist/img/tool-box.png" alt="Repair Record System Logo" class="brand-image">
    <span class="brand-text font-weight-normal text-light" style="color: white;">REPAIR RECORD SYSTEM</span>
  </a>

  <button class="navbar-toggler order-1" type="button" data-toggle="collapse" data-target="#navbarCollapse"
    aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <!-- Right navbar links -->
  <ul class="order-1 order-md-3 navbar-nav navbar-no-expand ml-auto">
    <li class="nav-item mr-4 pt-3">
      <p style="color: #fff; font-size: 15px;"><i class="fas fa-calendar-check"></i>&nbsp;&nbsp;<span id="datetime"></span></p>
    </li>
    <li class="nav-item mr-2 mt-2">
      <a href="/repair_record_system2/" class="nav-link btn btn-block"
        style="border-radius: 3px;background: #E89F4C;color: #000;box-shadow: 0px 4px 4px 0px rgba(0, 0, 0, 0.25); width:100px;"
        onmouseover="this.style.backgroundColor='#EA922E'; this.style.color='#000';"
        onmouseout="this.style.backgroundColor='#E89F4C'; this.style.color='#000';">
        LOGIN</a>
    </li>
  </ul>
</nav>
<!-- /.navbar -->

<script>
  function refreshDateTime() {
    const datetimeDisplay = document.getElementById("datetime");
    const now = new Date();

    const dateOptions = { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric' };
    const formattedDate = now.toLocaleDateString(undefined, dateOptions);

    const timeOptions = { hour: 'numeric', minute: 'numeric', second: 'numeric' };
    const formattedTime = now.toLocaleTimeString(undefined, timeOptions);

    const formattedDateTime = `${formattedDate} | ${formattedTime}`;

    datetimeDisplay.textContent = formattedDateTime;
  }
  setInterval(refreshDateTime, 1000); 
</script>