<?php

/**
 * @var \OopTodoList\Model\Product[] $products
 */
return static function(array $products): string {
    $listProductsHtml = '';
    foreach ($products as $product) {
        $listProductsHtml .= <<<HTML
             <li><input type="checkbox" />{$product->name()}
             <a href="index.php?id={$product->id()}&action=remove-product>Remove-Product</a>
          </li>
          HTML;
    }

    return <<<HTML
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport"
                  content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
            <meta http-equiv="X-UA-Compatible" content="ie=edge">
            <title>Product-List</title>
        </head>
        <body>
        <h3>Add Product</h3>

       <form action="/index.php" method="post">
             <input type="text" name="product_list" placeholder="product" />
             <input type="hidden" name="action" value="add-product" />
             <button type="submit">Add Product</button>
       </form>

       <hr />
       <h3>Product List</h3>
       <ul>
            $listProductsHtml
       </ul>
       <button>Add Product</button>

         </body>
        </html>
     HTML;
};