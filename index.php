<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shop Animali</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <?php
          
        // Classe che rappresenta le due categorie di animali (cani e gatti)

        class Category {
            protected $name;
            protected $icon; // Icona per capire a quale categoria appartiene

            public function __construct($name, $icon) {
                $this->name = $name;
                $this->icon = $icon;
            }

            public function getName() {
                return $this->name;
            }

            public function getIcon() {
                return $this->icon;
            }
        }

        // Tipo di prodotto
        abstract class ItemType {
            protected $typeName;

            public function getTypeName() {
                return $this->typeName;
            }
        }

        class ProductType extends ItemType {
            protected $typeName = "Prodotto";
        }

        class FoodType extends ItemType {
            protected $typeName = "Cibo";
        }

        class ToyType extends ItemType {
            protected $typeName = "Gioco";
        }

        class KennelType extends ItemType {
            protected $typeName = "Cuccia";
        }

    ?>

</body>
</html>