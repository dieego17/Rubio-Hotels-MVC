<?php

    // Clase que contiene la vista de reservas
    class ReservaView {

        /**
         * Método para mostrar las reservas realizadas por los clientes (visible solo para el admin)
         * @param array $nuevasReservas - Array de objetos Reserva
         */
        public function mostrarReservas($nuevasReservas) {
            if ($_SESSION['rol'] == 1) {
                ?>
                <!-- Contenedor principal de la vista -->
                <div class="container__hoteles">
                    <main class="container__main">
                        <div class="section__title">
                            <!-- Título de la sección de reservas -->
                            <h2 class="h2__titulo">RESERVAS REALIZADAS POR LOS CLIENTES</h2>

                            <!-- Enlaces para cerrar sesión y volver -->
                            <div class="div__button div__button--reserva">
                                <a class="link__sesion" href="index.php?controller=Usuario&action=cerrarSesion">CERRAR SESIÓN</a>
                                <form action="index.php?controller=Habitacion&action=detallesHabitacion" method="POST">
                                    <input type="hidden" name="id" value="<?php echo $nuevasReservas[0]->getId_hotel(); ?>">
                                    <button class="form__button form__reserva--detalle form__button--input" type="submit">VOLVER</button>
                                </form>
                            </div>
                        </div>
                        <?php
                            if(isset($_GET['eliminada'])){
                                echo '<div class="alert alert-success alert-dismissible fade show" role="alert">';
                                    echo 'Reserva eliminada correctamente.';
                                    echo '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>';
                                echo '</div>';
                            }
                        ?>
                        <!-- Sección para mostrar la tabla de reservas -->
                        <div class="section__hotel section__habitacion row">
                            <table class="table__hoteles table__habitaciones col-12">
                                <?php
                                echo '<thead class="thead__hoteles">';
                                    echo '<tr>';
                                        echo '<th class="th__hotel th__habitacion">ELIMINAR</th>';
                                        echo '<th class="th__hotel th__habitacion">ID DE RESERVA</th>';
                                        echo '<th class="th__hotel th__habitacion">USUARIO</th>';
                                        echo '<th class="th__hotel th__habitacion">HOTEL</th>';
                                        echo '<th class="th__hotel th__habitacion">HABITACIÓN</th>';
                                        echo '<th class="th__hotel th__habitacion">FECHA ENTRADA</th>';
                                        echo '<th class="th__hotel th__habitacion">FECHA SALIDA</th>';
                                        echo '<th class="th__hotel th__habitacion"></th>';
                                    echo '</tr>';
                                echo '</thead>';
                                echo '<tbody>';
                                $id=0;
                                foreach ($nuevasReservas as $reserva) {
                                    $id++; // Incremento el id para que al pulsar en uno de los modales detecte el correcto
                                    $modalEliminarID = 'exampleModalEliminar_' . $id;
                                    
                                    $exampleModalLabelEliID = 'exampleModalLabelEliminar_' . $id;

                                    echo '<tr>';
                                        echo '<td class=td__hotel>';
                                            echo '<button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#'.$modalEliminarID.'">';
                                                echo 'X';
                                            echo '</button>';
                                        
                                            echo '<div class="modal fade" id="'.$modalEliminarID.'" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">';
                                                echo '<div class="modal-dialog">';
                                                    echo '<div class="modal-content">';
                                                        echo '<div class="modal-header">';
                                                            echo '<h1 class="modal-title fs-5" id="'.$exampleModalLabelEliID.'">RESERVA '.$reserva->getId().'</h1>';
                                                            echo '<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>';
                                                        echo '</div>';
                                                        echo '<div class="modal-body">';
                                                            echo '<p>¿Estás seguro que quieres borrar la reserva ' .$reserva->getId() .'?</p>';
                                                        echo '</div>';
                                                        echo '<div class="modal-footer">';
                                                            echo '<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>';

                                                            echo '<form action="index.php?controller=Reserva&action=eliminarReserva" method="POST">';
                                                                echo '<input type="hidden" name="id_reserva" value="' . $reserva->getId() . '">';
                                                                echo '<button type="submit" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#'.$modalEliminarID.'">';
                                                                    echo 'Eliminar';
                                                                echo '</button>';
                                                            echo '</form>';
                                                        echo '</div>';
                                                    echo '</div>';
                                                echo '</div>';
                                            echo '</div>';
                                        echo '</td>';
                                        echo '<td class="td__hotel">' . $reserva->getId() . '</td>';
                                        echo '<td class="td__hotel">' . $reserva->getId_usuario() . '</td>';
                                        echo '<td class="td__hotel">' . $reserva->getId_hotel() . '</td>';
                                        echo '<td class="td__hotel">' . $reserva->getId_habitacion() . '</td>';
                                        echo '<td class="td__hotel">' . $reserva->getFecha_entrada() . '</td>';
                                        echo '<td class="td__hotel">' . $reserva->getFecha_salida() . '</td>';
                                        echo '<td class=td__hotel>';
                                            echo '<form action="index.php?controller=Reserva&action=reservaEspecifica" method="POST">';
                                                echo '<input type="hidden" name="id_reserva" value="' . $reserva->getId() . '">';
                                                echo '<button class="form__button form__reserva--detalle form__button--input" type="submit">VER MÁS DETALLES</button>';
                                            echo '</form>';
                                        echo '</td>';
                                    echo '</tr>';
                                }
                                ?>
                                </tbody>
                            </table>
                        </div>
                    </main>
                </div>
                <?php
            }
        }

        /**
         * Método para mostrar las reservas realizadas por un usuario (visible solo para el usuario)
         * @param array $usuarioReservas - Array de objetos Reserva
         */
        public function userReservas($usuarioReservas) {
            if ($_SESSION['rol'] == 0) {
                $name = $_SESSION['nombre'];
                ?>
                <!-- Contenedor principal de la vista -->
                <div class="container__hoteles">
                    <main class="container__main">
                        <div class="section__title">
                            <!-- Título de la sección de reservas del usuario -->
                            <h2 class="h2__titulo">RESERVAS REALIZADAS POR <?php echo strtoupper($name) ?></h2>

                            <!-- Enlaces para cerrar sesión y volver -->
                            <div class="div__button div__button--reserva">
                                <a class="link__sesion" href="index.php?controller=Usuario&action=cerrarSesion">CERRAR SESIÓN</a>
                                <form action="index.php?controller=Habitacion&action=detallesHabitacion" method="POST">
                                    <input type="hidden" name="id" value="<?php echo $usuarioReservas[0]->getId_hotel() ?>">
                                    <button class="form__button form__reserva--detalle form__button--input" type="submit">VOLVER</button>
                                </form>
                            </div>
                        </div>

                        <!-- Sección para mostrar mensajes de error o éxito -->
                        <?php
                            if (isset($_GET['error']) == 1) {
                                echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">';
                                    echo 'Reserva no disponible. Seleccione otra fecha.';
                                    echo '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>';
                                echo '</div>';
                            }else if (isset($_GET['error']) == 2) {
                                echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">';
                                    echo 'La fecha de salida no puede ser más pequeña que la de entrada.';
                                    echo '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>';
                                echo '</div>';
                            }
                            
                            
                            if (isset($_GET['success'])) {
                                echo '<div class="alert alert-success alert-dismissible fade show" role="alert">';
                                    echo 'Reserva realizada con éxito.';
                                    echo '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>';
                                echo '</div>';
                            }
                            
                            if(isset($_GET['eliminada'])){
                                echo '<div class="alert alert-success alert-dismissible fade show" role="alert">';
                                    echo 'Reserva eliminada correctamente.';
                                    echo '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>';
                                echo '</div>';
                            }
                        ?>

                        <!-- Sección para mostrar la tabla de reservas del usuario -->
                        <div class="section__hotel section__habitacion row">
                            <table class="table__hoteles table__habitaciones col-12">
                                <?php
                                    echo '<thead class="thead__hoteles">';
                                        echo '<tr>';
                                            echo '<th class="th__hotel th__habitacion">CANCELAR RESERVA</th>';
                                            echo '<th class="th__hotel th__habitacion">HOTEL</th>';
                                            echo '<th class="th__hotel th__habitacion">HABITACIÓN</th>';
                                            echo '<th class="th__hotel th__habitacion">FECHA ENTRADA</th>';
                                            echo '<th class="th__hotel th__habitacion">FECHA SALIDA</th>';
                                            echo '<th class="th__hotel th__habitacion"></th>';
                                        echo '</tr>';
                                    echo '</thead>';
                                    echo '<tbody>';
                                    $id = 0;
                                    foreach ($usuarioReservas as $reserva) {
                                        $id++; // Incremento el id para que al pulsar en uno de los modales detecte el correcto
                                        $modalEliminarID = 'exampleModalEliminar_' . $id;

                                        $exampleModalLabelEliID = 'exampleModalLabelEliminar_' . $id;

                                        echo '<tr>';
                                            echo '<td class=td__hotel>';
                                                echo '<button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#'.$modalEliminarID.'">';
                                                    echo 'X';
                                                echo '</button>';

                                                echo '<div class="modal fade" id="'.$modalEliminarID.'" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">';
                                                    echo '<div class="modal-dialog">';
                                                        echo '<div class="modal-content">';
                                                            echo '<div class="modal-header">';
                                                                echo '<h1 class="modal-title fs-5" id="'.$exampleModalLabelEliID.'">RESERVA '.$reserva->getId().'</h1>';
                                                                echo '<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>';
                                                            echo '</div>';
                                                            echo '<div class="modal-body">';
                                                                echo '<p>¿Estás seguro que quieres borrar la reserva ' .$reserva->getId() .'?</p>';
                                                            echo '</div>';
                                                            echo '<div class="modal-footer">';
                                                                echo '<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>';

                                                                echo '<form action="index.php?controller=Reserva&action=eliminarReserva" method="POST">';
                                                                    echo '<input type="hidden" name="id_reserva" value="' . $reserva->getId() . '">';
                                                                    echo '<button type="submit" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#'.$modalEliminarID.'">';
                                                                        echo 'Eliminar';
                                                                    echo '</button>';
                                                                echo '</form>';
                                                            echo '</div>';
                                                        echo '</div>';
                                                    echo '</div>';
                                                echo '</div>';
                                            echo '</td>';
                                                echo '<td class="td__hotel">' . $reserva->getId_hotel() . '</td>';
                                                echo '<td class="td__hotel">' . $reserva->getId_habitacion() . '</td>';
                                                echo '<td class="td__hotel">' . $reserva->getFecha_entrada() . '</td>';
                                                echo '<td class="td__hotel">' . $reserva->getFecha_salida() . '</td>';
                                                echo '<td class=td__hotel>';
                                                    echo '<form action="index.php?controller=Reserva&action=reservaEspecifica" method="POST">';
                                                        echo '<input type="hidden" name="id_reserva" value="' . $reserva->getId() . '">';
                                                        echo '<button class="form__button form__reserva--detalle form__button--input" type="submit">VER MÁS DETALLES</button>';
                                                    echo '</form>';
                                                echo '</td>';
                                            echo '</tr>';
                                        }
                                ?>
                                </tbody>
                            </table>
                        </div>
                    </main>
                </div>
<?php
            }
        }

        /**
         * Método para mostrar los detalles de una reserva específica
         * @param array $detallesReservas - Array asociativo con detalles de la reserva, hotel y habitación
         */
        public function mostrarDetallesReser($detallesReservas) {
            // Extraer datos de la reserva, hotel y habitación del array asociativo
            $reserva = $detallesReservas['reserva'];
            $hotel = $detallesReservas['hotel'];
            $habitacion = $detallesReservas['habitacion'];

            // Inicio de la estructura HTML
            echo '<div class="container__hoteles">';
                echo '<main class="container__main">';
                    // Sección del título y botones de navegación
                    echo '<div class="section__title">';
                        echo '<h2 class="h2__titulo">DETALLES DE LA RESERVA</h2>';
                        echo '<div class="div__button div__button--reserva">';
                            // Botón de cierre de sesión para todos los usuarios
                            echo '<a class="link__sesion" href="index.php?controller=Usuario&action=cerrarSesion">CERRAR SESIÓN</a>';
                             // Formulario y botón para volver, dependiendo del rol del usuario
                            if ($_SESSION['rol'] == 0) {
                                echo '<form action="index.php?controller=Reserva&action=usuarioReservas" method="POST">';
                                    echo '<input type="hidden" name="id" value="">';
                                    echo '<button class="form__button form__reserva--detalle form__button--input" type="submit">VOLVER</button>';
                                echo '</form>';
                            }
                            if ($_SESSION['rol'] == 1) {
                                echo '<form action="index.php?controller=Reserva&action=detallesReservas" method="POST">';
                                    echo '<input type="hidden" name="id_hotel" value="' . $hotel->getId() . '">';
                                    echo '<button class="form__button form__reserva--detalle form__button--input" type="submit">VOLVER</button>';
                                echo '</form>';
                            }
                        echo '</div>';
                    echo '</div>';

                    // Sección que muestra el nombre del hotel y su foto
                    echo '<div class="nombre__foto--hotel">';
                        echo '<h3 class="title__hotel">' . $hotel->getNombre() . '</h3>';
                        echo '<img class="imagen__hotel" alt="" src = "data:image/jpeg;base64,' . base64_encode($hotel->getFoto()) . '">';
                    echo '</div>';

                    // Sección que muestra información del hotel
                    echo '<div class="section__hotel section__habitacion row">';
                        echo '<table class="table__hoteles table__habitaciones col-12">';
                            echo '<thead class="thead__hoteles">';
                                echo '<tr>';
                                    echo '<th class="th__hotel th__habitacion">DIRECCIÓN</th>';
                                    echo '<th class="th__hotel th__habitacion">CIUDAD</th>';
                                    echo '<th class="th__hotel th__habitacion">PAÍS</th>';
                                    echo '<th class="th__hotel th__habitacion">NÚMERO DE HABITACIONES</th>';
                                echo '</tr>';
                            echo '</thead>';
                            echo '<tbody>';
                                echo '<tr>';
                                    echo '<td class="td__hotel">' . $hotel->getDireccion() . '</td>';
                                    echo '<td class="td__hotel">' . $hotel->getCiudad() . '</td>';
                                    echo '<td class="td__hotel">' . $hotel->getPais() . '</td>';
                                    echo '<td class="td__hotel">' . $hotel->getNum_habitaciones() . '</td>';
                            echo '</tr>';
                            echo '</tbody>';
                        echo '</table>';
                    echo '</div>';
                    // Sección que muestra información de la habitación
                    echo '<div class="section__hotel section__habitacion row">';
                        echo '<table class="table__hoteles table__habitaciones col-12">';
                            echo '<thead class="thead__hoteles">';
                                echo '<tr>';
                                    echo '<th class="th__hotel th__habitacion">NÚMERO HABITACIÓN</th>';
                                    echo '<th class="th__hotel th__habitacion">TIPO</th>';
                                    echo '<th class="th__hotel th__habitacion">PRECIO</th>';
                                    echo '<th class="th__hotel th__habitacion">DESCRIPCIÓN</th>';
                                echo '</tr>';
                            echo '</thead>';
                            echo '<tbody>';
                                echo '<tr>';
                                    echo '<td class="td__hotel">' . $habitacion->getNum_habitacion() . '</td>';
                                    echo '<td class="td__hotel">' . $habitacion->getTipo() . '</td>';
                                    echo '<td class="td__hotel">' . $habitacion->getPrecio() . '€</td>';
                                    echo '<td class=td__hotel>' . $habitacion->getDescripcion() . '</td>';
                                echo '</tr>';
                            echo '</tbody>';
                        echo '</table>';
                    echo '</div>';
                echo '</main>';
            echo '</div>';
        }
    }
?>
