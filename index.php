<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shop Animali</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
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

                       
            $dogCategory = new Category("Cani", "fas fa-dog");
            $catCategory = new Category("Gatti", "fas fa-cat");

       
            // var_dump($dogCategory);
            // var_dump($catCategory);

         
            $dogFood = new FoodProduct("Croccantini", 29.99, "https://iperverde.it/cdn/shop/products/nutrimi-all-breeds-cibo-per-cane-adulto-400-gr-maiale.jpg?v=1605292236", $dogCategory);
            $catToy = new ToyProduct("Palla da gioco", 9.99, "https://arcaplanet.vtexassets.com/arquivos/ids/283729/palla-snack-gioco-per-gatti-verde.jpg?v=638168828051000000", $catCategory);
            $dogKennel = new KennelProduct("Cuccia", 59.99, "https://www.casadellozerbino.com/1041-superlarge_default/cuccia-per-cani-domus-in-plastica-da-esterno-ricovero-per-cani-trattato-con-impregnanti-ecologici.jpg", $dogCategory);

         
            // var_dump($dogFood);
            // var_dump($catToy);
            // var_dump($dogKennel);


// Funzione per stampare la card del prodotto
function printProductCard(Product $product) {
    $category = $product->getCategory();
    $itemType = $product->getItemType();


    echo "<div class='col-md-4'>
            <div class='card product-card'>
                <img class='card-img-top' src='" . $product->getImagePath() . "' alt='" . $product->getTitle() . "'>
                <div class='card-body'>
                    <h5 class='card-title'>" . $product->getTitle() . "</h5>
                    <p class='card-text'>
                        <i class='" . $category->getIcon() . " category-icon'></i> 
                        " . $category->getName() . " - " . $itemType->getTypeName() . "
                    </p>
                    <p class='card-text'>Prezzo: $" . $product->getPrice() . "</p>
                </div>
            </div>
          </div>";

          
}
    ?>
        <div class="container mt-5">
        <div class="row">
            <?php
            printProductCard($dogFood);
            printProductCard($catToy);
            printProductCard($dogKennel);
            ?>
        </div>
        <div class="row">
            <div class="col-12 text-center">
                <p>Numero totale di prodotti: <?php echo Product::getProductCount(); ?></p>
            </div>
        </div>
    </div>

</body>
</html>