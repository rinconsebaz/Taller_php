
<?php
<?php
session_start();

interface AreaCalculator {
    public function calculateArea();
}

class Circle implements AreaCalculator {
    private $radius;

    public function __construct($radius) {
        $this->radius = $radius;
    }

    public function calculateArea() {
        return pi() * pow($this->radius, 2);
    }
}

class Square implements AreaCalculator {
    private $side;

    public function __construct($side) {
        $this->side = $side;
    }

    public function calculateArea() {
        return pow($this->side, 2);
    }
}

class Rectangle implements AreaCalculator {
    private $length;
    private $width;

    public function __construct($length, $width) {
        $this->length = $length;
        $this->width = $width;
    }

    public function calculateArea() {
        return $this->length * $this->width;
    }
}

class Triangle implements AreaCalculator {
    private $base;
    private $height;

    public function __construct($base, $height) {
        $this->base = $base;
        $this->height = $height;
    }

    public function calculateArea() {
        return 0.5 * $this->base * $this->height;
    }
}

$shape = $_POST['shape'];
$radius = $_POST['radius'];
$side = $_POST['side'];
$length = $_POST['length'];
$width = $_POST['width'];
$base = $_POST['base'];
$height = $_POST['height'];

switch ($shape) {
    case 'circle':
        $areaCalculator = new Circle($radius);
        break;
    case 'square':
        $areaCalculator = new Square($side);
        break;
    case 'rectangle':
        $areaCalculator = new Rectangle($length, $width);
        break;
    case 'triangle':
        $areaCalculator = new Triangle($base, $
?>