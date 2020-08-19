<?php
include('modelo/conexion.php');
?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link type="text/css" rel="stylesheet" href="css/materialize.min.css" media="screen,projection" />
  <link type="text/css" rel="stylesheet" href="css/customColors.css" media="screen,projection" />
  <link type="text/css" rel="stylesheet" href="css/ion.rangeSlider.css" media="screen,projection" />
  <link type="text/css" rel="stylesheet" href="css/ion.rangeSlider.skinFlat.css" media="screen,projection" />
  <link type="text/css" rel="stylesheet" href="css/index.css" media="screen,projection" />
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Formulario</title>
</head>

<body>
  <div class="contenedor">
    <div class="card rowTitulo">
      <h1>Bienes Intelcost</h1>
    </div>
    <div class="colFiltros">
      <form action="#" method="post" id="formulario">
        <div class="filtrosContenido">
          <div class="tituloFiltros">
            <h5>Filtros</h5>
          </div>
          <div class="filtroCiudad input-field">
            <p><label for="selectCiudad">Ciudad:</label><br></p>
            <select name="ciudad" id="selectCiudad">
              <option value="" selected>Elige una ciudad</option>
              <?php
              error_reporting(0);
              $data = file_get_contents("ciudades.json");
              $ciudades = json_decode($data, true);
              foreach ($ciudades as $ciudad) {
              ?>
                <option name='ciudades' class="opcion_clase" value="<?php echo $ciudad['Ciudad'] ?>"><?php echo $ciudad['Ciudad'] ?></option>
              <?php
              }
              ?>
            </select>
          </div>
          <div class="filtroTipo input-field">
            <p><label for="selecTipo">Tipo:</label></p>
            <br>
            <select name="tipo" id="selectTipo">
              <option value="">Elige un tipo</option>
              <?php
              $data = file_get_contents("tipo.json");
              $tipos = json_decode($data, true);
              foreach ($tipos as $tipo) {
              ?>
                <option name='tipo' class="opcion_clase" value="<?php echo $tipo['tipo'] ?>"><?php echo $tipo['tipo'] ?></option>
              <?php
              }
              ?>
            </select>
          </div>
          <div class="filtroPrecio">
            <label for="rangoPrecio">Precio:</label>
            <input type="text" id="rangoPrecio" name="precio" value="" />
          </div>
          <div class="botonField">
            <input type="submit" class="btn white" value="Buscar" id="submitButton">
          </div>
        </div>
      </form>
    </div>
    <div id="tabs" style="width: 75%;">
      <ul>
        <li><a href="#tabs-1">Bienes disponibles</a></li>
        <li><a href="#tabs-2">Mis bienes</a></li>
      </ul>
      <div id="tabs-1">
        <div class="colContenido" id="divResultadosBusqueda">
          <div class="tituloContenido card" style="justify-content: center;">
            <h5>Resultados de la búsqueda:</h5>
            <?php
            $ciudades = $_POST['ciudades'];
            $tipo = $_POST['tipo'];
            $data = file_get_contents("data-1.json");
            $bienes = json_decode($data, true);
            foreach ($bienes as $bien) {
              if ($ciudades == "" && $tipo == "") {
            ?>
                <div class="divider">
                  <div class="divider_img">
                    <img src="img/home.jpg" alt="">
                  </div>
                  <div class="divider_texto">
                    <form action="modelo/addBien.php" method="post">
                      <div class="texto">
                        <div class="titulo">Dirección: </div>
                        <div class="parrafo_titulo"><?php echo $bien['Direccion']; ?></div>
                        <input type="hidden" name="direccion" value="<?php echo $bien['Direccion'] ?>">
                      </div>
                      <div class="texto">
                        <div class="titulo">Ciudad: </div>
                        <div class="parrafo_titulo"><?php echo $bien['Ciudad']; ?></div>
                        <input type="hidden" name="ciudad" value="<?php echo $bien['Ciudad'] ?>">
                      </div>
                      <div class="texto">
                        <div class="titulo">Teléfono: </div>
                        <div class="parrafo_titulo"><?php echo $bien['Telefono']; ?></div>
                        <input type="hidden" name="telefono" value="<?php echo $bien['Telefono'] ?>">
                      </div>
                      <div class="texto">
                        <div class="titulo">Código Postal: </div>
                        <div class="parrafo_titulo"><?php echo $bien['Codigo_Postal']; ?></div>
                        <input type="hidden" name="postal" value="<?php echo $bien['Codigo_Postal'] ?>">
                      </div>
                      <div class="texto">
                        <div class="titulo">Tipo: </div>
                        <div class="parrafo_titulo"><?php echo $bien['Tipo']; ?></div>
                        <input type="hidden" name="tipo" value="<?php echo $bien['Tipo'] ?>">
                      </div>
                      <div class="texto">
                        <div class="titulo">Precio: </div>
                        <div class="parrafo_titulo"><?php echo $bien['Precio']; ?></div>
                        <input type="hidden" name="precio" value="<?php echo $bien['Direccion'] ?>">
                      </div>
                      <div class="form_guardar">
                        <button type="submit">Guardar</button>
                      </div>
                  </div>
                  </form>
                </div>
              <?php
              } elseif ($ciudades == $bien['Ciudad'] && $tipo == "") {
              ?>
                <div class="divider <?php echo strtr($bien['Tipo'], " ", "_");; ?>">
                  <div class="divider_img">
                    <img src="img/home.jpg" alt="">
                  </div>
                  <div class="divider_texto">
                    <div class="texto">
                      <div class="titulo">Dirección: </div>
                      <div class="parrafo_titulo"><?php echo $bien['Direccion']; ?></div>
                    </div>
                    <div class="texto">
                      <div class="titulo">Ciudad: </div>
                      <div class="parrafo_titulo"><?php echo $bien['Ciudad']; ?></div>
                    </div>
                    <div class="texto">
                      <div class="titulo">Teléfono: </div>
                      <div class="parrafo_titulo"><?php echo $bien['Telefono']; ?></div>
                    </div>
                    <div class="texto">
                      <div class="titulo">Código Postal: </div>
                      <div class="parrafo_titulo"><?php echo $bien['Codigo_Postal']; ?></div>
                    </div>
                    <div class="texto">
                      <div class="titulo">Tipo: </div>
                      <div class="parrafo_titulo"><?php echo $bien['Tipo']; ?></div>
                    </div>
                    <div class="texto">
                      <div class="titulo">Precio: </div>
                      <div class="parrafo_titulo"><?php echo $bien['Precio']; ?></div>
                    </div>
                  </div>
                </div>
              <?php
              } elseif ($tipo == $bien['Tipo'] && $ciudades == "") {
              ?>
                <div class="divider <?php echo strtr($bien['Tipo'], " ", "_");; ?>">
                  <div class="divider_img">
                    <img src="img/home.jpg" alt="">
                  </div>
                  <div class="divider_texto">
                    <div class="texto">
                      <div class="titulo">Dirección: </div>
                      <div class="parrafo_titulo"><?php echo $bien['Direccion']; ?></div>
                    </div>
                    <div class="texto">
                      <div class="titulo">Ciudad: </div>
                      <div class="parrafo_titulo"><?php echo $bien['Ciudad']; ?></div>
                    </div>
                    <div class="texto">
                      <div class="titulo">Teléfono: </div>
                      <div class="parrafo_titulo"><?php echo $bien['Telefono']; ?></div>
                    </div>
                    <div class="texto">
                      <div class="titulo">Código Postal: </div>
                      <div class="parrafo_titulo"><?php echo $bien['Codigo_Postal']; ?></div>
                    </div>
                    <div class="texto">
                      <div class="titulo">Tipo: </div>
                      <div class="parrafo_titulo"><?php echo $bien['Tipo']; ?></div>
                    </div>
                    <div class="texto">
                      <div class="titulo">Precio: </div>
                      <div class="parrafo_titulo"><?php echo $bien['Precio']; ?></div>
                    </div>
                  </div>
                </div>
              <?php
              } elseif ($ciudad == $bien['Ciudad'] && $tipo == $bien['Tipo']) {
              ?>
                <div class="divider <?php echo strtr($bien['Tipo'], " ", "_");; ?>">
                  <div class="divider_img">
                    <img src="img/home.jpg" alt="">
                  </div>
                  <div class="divider_texto">
                    <div class="texto">
                      <div class="titulo">Dirección: </div>
                      <div class="parrafo_titulo"><?php echo $bien['Direccion']; ?></div>
                    </div>
                    <div class="texto">
                      <div class="titulo">Ciudad: </div>
                      <div class="parrafo_titulo"><?php echo $bien['Ciudad']; ?></div>
                    </div>
                    <div class="texto">
                      <div class="titulo">Teléfono: </div>
                      <div class="parrafo_titulo"><?php echo $bien['Telefono']; ?></div>
                    </div>
                    <div class="texto">
                      <div class="titulo">Código Postal: </div>
                      <div class="parrafo_titulo"><?php echo $bien['Codigo_Postal']; ?></div>
                    </div>
                    <div class="texto">
                      <div class="titulo">Tipo: </div>
                      <div class="parrafo_titulo"><?php echo $bien['Tipo']; ?></div>
                    </div>
                    <div class="texto">
                      <div class="titulo">Precio: </div>
                      <div class="parrafo_titulo"><?php echo $bien['Precio']; ?></div>
                    </div>
                  </div>
                </div>
            <?php
              }
            }
            ?>
          </div>
        </div>
      </div>

      <div id="tabs-2">
        <div class="colContenido" id="divResultadosBusqueda">
          <div class="tituloContenido card" style="justify-content: center;">
            <h5>Bienes guardados:</h5>
            <?php
            $sql = "SELECT * FROM misbienes";
            $resultado = $con->query($sql);
            foreach ($resultado as $item) {
            ?>
              <div class="divider">
                <div class="divider_img">
                  <img src="img/home.jpg" alt="">
                </div>
                <div class="divider_texto">
                  <div class="texto">
                    <div class="titulo">Dirección: </div>
                    <div class="parrafo_titulo"><?php echo $item['direccion']; ?></div>
                    <input type="hidden" name="direccion" value="<?php echo $bien['Direccion'] ?>">
                  </div>
                  <div class="texto">
                    <div class="titulo">Ciudad: </div>
                    <div class="parrafo_titulo"><?php echo $item['ciudad']; ?></div>
                    <input type="hidden" name="ciudad" value="<?php echo $bien['Ciudad'] ?>">
                  </div>
                  <div class="texto">
                    <div class="titulo">Teléfono: </div>
                    <div class="parrafo_titulo"><?php echo $item['telefono']; ?></div>
                    <input type="hidden" name="telefono" value="<?php echo $bien['Telefono'] ?>">
                  </div>
                  <div class="texto">
                    <div class="titulo">Código Postal: </div>
                    <div class="parrafo_titulo"><?php echo $item['postal']; ?></div>
                    <input type="hidden" name="postal" value="<?php echo $bien['Codigo_Postal'] ?>">
                  </div>
                  <div class="texto">
                    <div class="titulo">Tipo: </div>
                    <div class="parrafo_titulo"><?php echo $item['tipo']; ?></div>
                    <input type="hidden" name="tipo" value="<?php echo $bien['Tipo'] ?>">
                  </div>
                  <div class="texto">
                    <div class="titulo">Precio: </div>
                    <div class="parrafo_titulo"><?php echo $item['precio']; ?></div>
                    <input type="hidden" name="precio" value="<?php echo $bien['Direccion'] ?>">
                  </div>
                </div>
              </div>
            <?php
            }
            ?>
          </div>
        </div>
      </div>
    </div>
    <script type="text/javascript" src="js/jquery-1.12.4.js"></script>
    <script type="text/javascript" src="js/ion.rangeSlider.min.js"></script>
    <script type="text/javascript" src="js/materialize.min.js"></script>
    <script type="text/javascript" src="js/index.js"></script>
    <script type="text/javascript" src="js/buscador.js"></script>
    <script type="text/javascript" src="js/jquery-ui.js"></script>
    <script type="text/javascript">
      $(document).ready(function() {
        $("#tabs").tabs();
      });
    </script>
</body>

</html>