class UaFooter extends HTMLElement{
    connectedCallback(){
        this.innerHTML =`
        <footer id="footer">
        <div class="footer-top">
          <div class="container">
            <div class="row">
    
              <div class="col-lg-3 col-md-6">
                <div class="footer-info">
                  <h3>Última Alianza<span>.</span></h3>
     
                  <div class="social-links mt-3">
                    <a href="https://discordapp.com/invite/RFwnP6d" class="discord"><i class="bx bxl-discord"></i></a>
                    <a href="https://twitter.com/uasphere" class="twitter"><i class="bx bxl-twitter"></i></a>
                            <a href="https://www.youtube.com/user/UASphereStaff" class="youtube"><i class="bx bxl-youtube"></i></a>
                    <a href="https://www.instagram.com/alianza_uo/" class="instagram"><i class="bx bxl-instagram"></i></a>
                            <a href="https://www.tiktok.com/@ultima.alianza" class="tiktok"><i class="bx bxl-tiktok"></i></a>
                            <a href="https://www.twitch.tv/devpiruz" class="twitch"><i class="bx bxl-twitch"></i></a>
                            <a href="https://www.facebook.com/pages/UASphere/113901315347603" class="facebook"><i class="bx bxl-facebook"></i></a>
                  </div>
                  <div id="server_status_footer" class="mt-4">
                    <iframe src="../estado.php" frameborder="0" allowtransparency="true" class="iframe_estado"></iframe>
                  </div>
                </div>
              </div>
    
              <div class="col-lg-2 col-md-6 footer-links">
                <h4>Vínculos UA</h4>
                <ul>
                  <li><i class="bx bx-chevron-right"></i> <a href="../index.html">Inicio</a></li>
                  <li><i class="bx bx-chevron-right"></i> <a href="https://ultima-alianza.com/wiki/index.php/P%C3%A1gina_principal">Wiki</a></li>
                  <li><i class="bx bx-chevron-right"></i> <a href="../status.php">Estado del Servidor</a></li>
                  <li><i class="bx bx-chevron-right"></i> <a href="https://ultima-alianza.com/foro/">Foro</a></li>
                  <li><i class="bx bx-chevron-right"></i> <a href="../index.html#team">Staff</a></li>
                  <li><i class="bx bx-chevron-right"></i> <a href="#">Bestiario</a></li>
                  <li><i class="bx bx-chevron-right"></i> <a href="#">Mapas</a></li>
                  <li><i class="bx bx-chevron-right"></i> <a href="#">Torneos</a></li>
                  <li><i class="bx bx-chevron-right"></i> <a href="https://discordapp.com/invite/RFwnP6d">Chat - Discord</a></li>
                </ul>
              </div>
    
              <div class="col-lg-3 col-md-6 footer-links">
                <h4>Redes Sociales</h4>
                <ul>
                  <li><i class="bx bx-chevron-right"></i> <a href="https://discordapp.com/invite/RFwnP6d">Discord</a></li>
                  <li><i class="bx bx-chevron-right"></i> <a href="https://twitter.com/uasphere">X (Twitter)</a></li>
                  <li><i class="bx bx-chevron-right"></i> <a href="https://www.youtube.com/user/UASphereStaff">Youtube</a></li>
                  <li><i class="bx bx-chevron-right"></i> <a href="https://www.instagram.com/alianza_uo/">Instagram</a></li>
                  <li><i class="bx bx-chevron-right"></i> <a href="https://www.tiktok.com/@ultima.alianza">TikTok</a></li>
                  <li><i class="bx bx-chevron-right"></i> <a href="https://www.twitch.tv/devpiruz">Twitch</a></li>
                        <li><i class="bx bx-chevron-right"></i> <a href="https://www.facebook.com/pages/UASphere/113901315347603">Facebook</a></li>
                </ul>
              </div>
    
              <div class="col-lg-4 col-md-6 footer-newsletter">
                <!--<h4>Newsletter - No te pierdas nada</h4>
                <p>Prometemos spamear poco, un correo al mes como mucho... y todas las news tienen premio!</p>
                <form action="" method="post">
                  <input type="email" name="email"><input type="submit" value="Subscribe">
                </form>
                -->
    
              </div>
    
            </div>
          </div>
        </div>
    
        <div class="container">
          <div class="copyright">
            &copy; Copyright <strong><span>Última Alianza</span></strong>. All Rights Reserved
          </div>
          <div class="credits">
            <!-- All the links in the footer should remain intact. -->
            <!-- You can delete the links only if you purchased the pro version. -->
            <!-- Licensing information: https://bootstrapmade.com/license/ -->
            <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/gp-free-multipurpose-html-bootstrap-template/ -->
            Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
          </div>
        </div>
        </footer>

        <div id="preloader"></div>
        <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>     
        `
    }
}

class UaHeader extends HTMLElement{     

  connectedCallback(){
      var current = this.getAttribute("current");
      var inner = this.getAttribute("inner");

      this.innerHTML = `
        <header id="header" class="fixed-top ${inner ? "header-inner-pages" : ""}">
        <div class="container d-flex align-items-center justify-content-lg-between">
          <a href="../index.html" class="logo ml-4"><img src="../assets/img/logo/ua_blanco.png" alt=""></a>
          <h1 class="logo me-auto me-lg-0 pl-4"><a href="../index.html">Última Alianza<span>.</span></a></h1>
          <!-- Uncomment below if you prefer to use an image logo -->
          

          <nav id="navbar" class="navbar navbar-expand-lg navbar-dark order-last order-lg-0 pr-2">
            <ul>
              <li><a class="nav-link scrollto ${current === "index" ? "active" : ""}" href="../index.html#hero">Inicio</a></li>
              <li><a class="nav-link scrollto ${current === "servidor" ? "active" : ""}" href="../index.html#servidor">Servidor</a></li>
              <li><a class="nav-link scrollto ${current === "jugar" ? "active" : ""}" href="../index.html#juega">Jugar</a></li>
              <li><a class="nav-link scrollto ${current === "normas" ? "active" : ""}" href="../normas.html">Normas</a></li>
              <li><a class="nav-link scrollto ${current === "donaciones" ? "active" : ""}" href="../donacion.html">Donaciones</a></li>          
              <li class="dropdown"><a href="#"><span>Enlaces Básicos</span> <i class="bi bi-chevron-down"></i></a>
                <ul>
                  <li><a href="https://ultima-alianza.com/wiki/index.php/P%C3%A1gina_principal">Wiki</a></li>
                  <li class="dropdown"><a href="#"><span>Comenzar a jugar</span> <i class="bi bi-chevron-right"></i></a>
                    <ul>
                      <li><a href="https://youtube.com/playlist?list=PLaDgNzny6fa7O2RqKcG-OP_y3HWtoiwCH">Tutoriales Youtube</a></li>
                      <li><a href="https://ultima-alianza.com/wiki/index.php/Empezando_a_Jugar">Guia para Novatos</a></li>
                      <li><a href="#">Profesiones</a></li>
                      <li><a href="#">Habilidades</a></li>
                    </ul>
                  </li>
                  <li><a href="https://ultima-alianza.com/foro/">Foro</a></li>
                  <li><a href="../changelog/index.html">Changelog</a></li>
                  <li><a href="../clave.html">Recuperar Contraseña</a></li>
                  <li><a href="">Recuperar Cuenta</a></li>
                  <li><a href="../index.html#team">Staff</a></li>
                </ul>
              </li>
              <li><a class="nav-link scrollto" href="index.html#team">Contacto</a></li>
            </ul>
            <i class="bi bi-list mobile-nav-toggle"></i>
          </nav><!-- .navbar -->
          <img src="../estado_icon.php" alt="online" longdesc="online" class="ml-4 d-none d-lg-block"/>
          <a href="#juega" class="get-started-btn scrollto">¡Juega Gratis Ya!</a>

        </div>
      </header>
      `
  }
}

customElements.define('ua-footer', UaFooter)
customElements.define('ua-header', UaHeader)