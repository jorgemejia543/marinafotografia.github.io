<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <!-- agregar favicon -->
    <link rel="shortcut icon" href="../img/logo/Black and White Minimalist Illustrative Photographer Logo (1).png" type="image/x-icon">
    <title>Marina fotografia - nosotros</title>
</head>

<body>
<script>
window.addEventListener('mouseover', initLandbot, { once: true });
window.addEventListener('touchstart', initLandbot, { once: true });
var myLandbot;
function initLandbot() {
  if (!myLandbot) {
    var s = document.createElement('script');s.type = 'text/javascript';s.async = true;
    s.addEventListener('load', function() {
      var myLandbot = new Landbot.Livechat({
        configUrl: 'https://storage.googleapis.com/landbot.online/v3/H-2553431-RLM44DQO39QT653K/index.json',
      });
    });
    s.src = 'https://cdn.landbot.io/landbot-3/landbot-3.0.0.js';
    var x = document.getElementsByTagName('script')[0];
    x.parentNode.insertBefore(s, x);
  }
}
</script>
    <!-- Cabecera -->
    <header class="header">
        <img src="../img/logo/Sin título (1920 x 720 px) (1920 x 480 px).jpg" alt="" class="logo">
        <!-- Navegación -->
        <nav>
            <ul class="menu-horizontal">
                <li><a class="fuenteb" href="../index.php">Inicio</a></li>
               
                <li>
                    <a class="fuenteb" href="./promociones.php">Promociones</a>

                </li>
                <li><a class="fuenteb" href="./contactenos.php">Contáctenos  </a></li>
        <li><a class="fuenteb" href="./nosotros.php">Nosotros</a></li>
        <li><a class="fuenteb" href="./ubicacion.php">Ubicación</a></li>
        <li><a href="./Ejercicio5.php"><img src="../img/Nav/Saludo.png" style="width: 40px;height: 40px;"></a></li>
        <li><a ><img src="../img/Nav/carcom.jpg" style="width: 40px;height: 40px;"></a></li>

        </ul>
        </nav>
    </header>
    <!-- Contenido Inicio -->
    <br>
    <div class="main">
        <section class="servicio-al-cliente">
            <div class="content">
                <h1 class="nosotros" > Soy MARINA MEJIA una fotógrafa apasionada que se dedica a capturar momentos memorables y contar historias a través de imágenes. 
                Con una amplia experiencia en diversos tipos de fotografía, mi enfoque se centra en crear trabajos visualmente impactantes que emocionen y cautiven a mi audiencia.
                </h1>
                <br>
                    <img  src="../img/Nosotros/Diseño sin título (7).jpg" alt="" class="img-Chiken">
                  
                <br>
                <h2 class="servicio_cliente">Servicio al cliente</h2>
                <br>
                <img src="../img/contactenos/1.png" alt="servicio" class="img-servicio">
            </div>
        </section>
        <br>
        <section class="redes-sociales">
            <div class="content">
                <br>
                <h2 class="redes_sociales">Redes sociales</h2>
                <br>
                <img src="../img/contactenos/3.png" alt="Instagram" class="ig">
                <img src="../img/contactenos/2.png" alt="Facebook" class="fb">
            </div>
        </section>
        <br>
        <section class="ubicacion">
            <div class="content">
                <br>
                <br>
                
            </div>
        </section>
        <br>
        <hr>
        <!-- Pie de página -->
        <footer class="footer">
            <div class="footer_content">
                <div class="footer_link">
                    <br>
                    <h3 class="link_title">Acerca de MARINA FOTOGRAFIA</h3>
                    <br>
                    <a href="./contactenos.php" style="margin-left: 30px;">Contáctenos</a>
                </div>
                <div class="right">
                    <br>
                    
                    <h3 class="frase">"Capturando momentos, creando recuerdos."</h3>
                </div>
                <div class="siguenos_footer">
                    <br>
                    <h3>Síguenos</h3>
                    <div class="imagen_social">
                        <img src="../img/siguenos/facebook.png" alt="Facebook" class="facebook">
                        <img src="../img/siguenos/twitter.png" alt="Twitter" class="twitter">
                    </div>
                </div>
            </div>
            <hr>
            <br>
            <div class="copyright">
                <h2 class="copyright_text">© 2024 Marina Fotografia. Todos los derechos reservados.</h2>
                <h2>CLISMAN VALDEZ</h2>
            </div>
        </footer>
</body>

</html>