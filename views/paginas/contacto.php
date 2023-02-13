<main class="contenedor seccion">
    <?php if ($mensaje) { ?>
        <p class="alerta exito"><?php echo $mensaje; ?></p>
    <?php } ?>
    <h1>Contacto</h1>
    <picture>
        <source srcset="build/img/destacada3.webp" type="image/webp">
        <source srcset="build/img/destacada3.jpg" type="image/jpeg">
        <img loading="lazy" src="build/img/destacada3.jpg" alt="Imagen Contacto">
    </picture>
    <h2>Llene el formulario de Contacto</h2>
    <form class="formulario" method="POST" action="/contacto">
        <fieldset>
            <legend>información Personal</legend>

            <label for="nombre">Nombre</label>
            <input type="text" placeholder="Tu nombre" id="nombre" name="contacto[nombre]" required>

            <label for="email">E-mail</label>
            <input name="contacto[email]" placeholder="Tu Email" id="email" type="email" required>

            <label for="telefono">Teléfono</label>
            <input type="tel" placeholder="Tu Teléfono" id="telefono" name="constcato[telefono]">

            <label for="mensaje">Mensaje</label>
            <textarea id="mensaje" name="contacto[mensaje]" required></textarea>
        </fieldset>
        <fieldset>
            <legend>información sobre la propiedad</legend>

            <label for="opciones">Vende o Compra:</label>
            <select name="contacto[opciones]" id="opciones" required>
                <option value="" disabled selected>-- Seleccione --</option>
                <option value="Compra">Compra</option>
                <option value="Vende">Vende</option>
            </select>
            <label for="presupuesto">Precio o Presupuesto</label>
            <input type="number" placeholder="Tu precio o presupuesto" id="presupuesto" name="contacto[presupuesto]" required>
        </fieldset>
        <fieldset>
            <legend>información sobre la propiedad</legend>
            <p>Como desea ser contactado</p>

            <div class="forma-contacto">
                <label for="contactar-telefono">Teléfono</label>
                <input type="radio" name="contacto[contacto]" value="telefono" id="contactar-telefono" required>

                <label for="contactar-email">E-mail</label>
                <input type="radio" name="contacto[contacto]" value="email" id="contactar-email" required>
            </div>
            <p>Si eligió telefóno, elija la fecha y la hora</p>
            <label for="fecha">Fecha</label>
            <input type="date" id="fecha" name="contacto[fecha]">

            <label for="hora">Hora:</label>
            <input type="time" id="hora" min="10:00" name="contacto[constacto]">
        </fieldset>
        <input type="submit" value="Enviar" class="boton-verde">
    </form>
</main>