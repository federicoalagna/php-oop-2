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



        // Classe per i prodotti

        class Product {
            protected $title;
            protected $price;
            protected $imagePath;
            protected $category;
            protected $itemType;
            protected static $productCount = 0;

            public function __construct($title, $price, $imagePath, Category $category, ItemType $itemType) {
                $this->title = $title;
                $this->price = $price;
                $this->imagePath = $imagePath;
                $this->category = $category;
                $this->itemType = $itemType;
                self::$productCount++;
            }

            public function getTitle() {
                return $this->title;
            }

            public function getPrice() {
                return $this->price;
            }

            public function getImagePath() {
                return $this->imagePath;
            }

            public function getCategory() {
                return $this->category;
            }

            public function getItemType() {
                return $this->itemType;
            }

            public static function getProductCount() {
                return self::$productCount;
            }
}

            // Classi derivate dei prodotti
            
            class AnimalProduct extends Product {
                public function __construct($title, $price, $imagePath, Category $category) {
                    parent::__construct($title, $price, $imagePath, $category, new ProductType());
                }
            }

            class FoodProduct extends Product {
                public function __construct($title, $price, $imagePath, Category $category) {
                    parent::__construct($title, $price, $imagePath, $category, new FoodType());
                }
            }

            class ToyProduct extends Product {
                public function __construct($title, $price, $imagePath, Category $category) {
                    parent::__construct($title, $price, $imagePath, $category, new ToyType());
                }
            }

            class KennelProduct extends Product {
                public function __construct($title, $price, $imagePath, Category $category) {
                    parent::__construct($title, $price, $imagePath, $category, new KennelType());
                }
            }

    ?>

</body>
</html>