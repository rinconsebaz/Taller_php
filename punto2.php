<?php

class Shape {
    protected $name;

    public function __construct($name) {
        $this->name = $name;
    }

    public function getName() {
        return $this->name;
    }
}

class Circle extends Shape {
    private $radius;

    public function __construct($radius) {
        parent::__construct('Círculo');
        $this->radius = $radius;
    }

    public function calculateArea() {
        return M_PI * pow($this->radius, 2);
    }
}

class Square extends Shape {
    private $side;

    public function __construct($side) {
        parent::__construct('Cuadrado');
        $this->side = $side;
    }

    public function calculateArea() {
        return pow($this->side, 2);
    }
}

class Rectangle extends Shape {
    private $length;
    private $width;

    public function __construct($length, $width) {
        parent::__construct('Rectángulo');
        $this->length = $length;
        $this->width = $width;
    }

    public function calculateArea() {
        return $this->length * $this->width;
    }
}

class Triangle extends Shape {
    private $base;
    private $height;

    public function __construct($base, $height) {
        parent::__construct('Triángulo');
        $this->base = $base;
        $this->height = $height;
    }

    public function calculateArea() {
        return 0.5 * $this->base * $this->height;
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $shapeType = $_POST['shape'];
    $area = 0;

    switch ($shapeType) {
        case 'circle':
            $radius = $_POST['radius'];
            $shape = new Circle($radius);
            $area = $shape->calculateArea();
            break;
        case 'square':
            $side = $_POST['side'];
            $shape = new Square($side);
            $area = $shape->calculateArea();
            break;
        case 'rectangle':
            $length = $_POST['length'];
            $width = $_POST['width'];
            $shape = new Rectangle($length, $width);
            $area = $shape->calculateArea();
            break;
        case 'triangle':
            $base = $_POST['base'];
            $height = $_POST['height'];
            $shape = new Triangle($base, $height);
            $area = $shape->calculateArea();
            break;
    }
}
?>
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="styles.css">
    <meta charset="UTF-8">
    <title>Calculadora de Área</title>
</head>
<body>
    <h1>Calculadora de Área</h1>
    <form method="post" action="">
        <label for="shape">Selecciona una figura:</label>
        <select name="shape" id="shape">
            <option value="circle">Círculo</option>
            <option value="square">Cuadrado</option>
            <option value="rectangle">Rectángulo</option>
            <option value="triangle">Triángulo</option>
            <br><br>
             <label for="radius">Radio:</label>
             <input type="number" name="radius" id="radius" value="1">
            <br><br>
            <label for="side">Lado:</label>
            <input type="number" name="side" id="side" value="1">
            <br><br>
            <label for="length">Largo:</label>
            <input type="number" name="length" id="length" value="1">
            <br><br>
            <label for="width">Ancho:</label>
            <input type="number" name="width" id="width" value="1">
            <br><br>
            <label for="base">Base:</label>
            <input type="number" name="base" id="base" value="1">
            <br><br>
            <label for="height">Altura:</label>
            <input type="number" name="height" id="height" value="1">
         <br><br>
        <input class="button" type="submit" value="Calcular Area">
    </form>

        </select>
        <br><br>
        <div id="inputFields">
            <!-- Campos para ingresar datos específicos de cada figura se generan dinámicamente mediante JavaScript -->
        </div>
        <br>
     

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        echo "<h2>Resultado</h2>";
        echo "Figura seleccionada: " . $shape->getName() . "<br>";
        echo "Área calculada: " . $area;
    }
    ?>
</body>
</html>