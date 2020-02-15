<!-- Navigation -->
<nav class="navbar navbar-expand-lg navbar-light fixed-top py-3" id="mainNav">
    <div class="container">
        <a class="navbar-brand js-scroll-trigger" href="http://localhost/finalEnfasisI/">Inicio</a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto my-2 my-lg-0">
                <li class="nav-item">
                    <a class="nav-link js-scroll-trigger" href="masterpage.php?page=finca">CRUD Fincas</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link js-scroll-trigger" href="masterpage.php?page=vaca">CRUD Vacas</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link js-scroll-trigger" href="masterpage.php?page=depto">CRUD Depto</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link js-scroll-trigger" href="masterpage.php?page=muni">CRUD Municipio</a>
                </li>
                <!-- <li class="nav-item">
                    <a class="nav-link js-scroll-trigger" href="masterpage.php?page=">Log-out</a>
                </li> -->
            </ul>
        </div>
    </div>
    <form name="formularioLogout" action="controller/gestionLogin.php" method="post">
        <table border="0">
            <tr>
                <td>
                    <input type="text" name="type" style="display: none">
                </td>
                <td>
                    <input type="button" value="Desconectar" id="btnDesconectar" onclick="validarLogin(formularioLogout,'desc')">
                </td>
            </tr>
        </table>
    </form>
</nav>