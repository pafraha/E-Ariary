<div class="col-sm-3">
    <div class="left-sidebar">
        <h2>Categories</h2>
        <div class="panel-group category-products" id="accordian"><!--category-productsr-->
            <?php
            require_once 'db.php';

            $catg = $pdo->query('SELECT nom FROM category');
            $catg->execute();

            $results = $catg->fetchAll();

            foreach ($results as $result){ ?>
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title"><a><?= $result->nom; ?></a></h4>
                    </div>
                </div>
            <?php } ?>
        </div><!--/category-productsr-->

        <div class="brands_products"><!--brands_products-->
            <?php
            require_once 'db.php';

            $catg = $pdo->query('SELECT * FROM marques');
            $catg->execute();

            $results = $catg->fetchAll();
            ?>

            <h2>Nos marques</h2>
            <div class="brands-name">
                <ul class="nav nav-pills nav-stacked">
                    <?php foreach ($results as $result){ ?>
                        <li><a> <span class="pull-right">(<?= $result->id; ?>)</span><?= $result->nom; ?></a></li>
                    <?php } ?>
                </ul>
            </div>
        </div><!--/brands_products-->
    </div>
</div>