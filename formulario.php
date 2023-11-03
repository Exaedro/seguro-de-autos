<p>Completa el formulario.</p>
<form action="php/ingresar_vehiculos.php" method="POST">
    <label for="tipo_vehiculo">Tipo de Vehiculo:</label>
    <select name="tipo_vehiculo">
        <option>moto</option>
        <option>carro</option>
        <option>camioneta</option>
    </select>
    <label for="marca">Marca:</label>
    <input type="text" id="marca" name="marca" required>
    <label for="modelo">Modelo del Auto:</label>
    <input type="text" id="modelo" name="modelo" required>
    <button type="submit" class="btn2">Añadir Vehiculo</button>          
</form>