<?php 

require "./Pattern/Memento.php";
require "./Pattern/Originator.php";
require "./Klass/ObjectStore.php";

require "post.php";

$ostore = new ObjectStore( 'store' );

store( $ostore );

process();
if ( isset( $_GET['clear'] ) ) {
    $ostore->clean();
    // redirect so the clear is gone.
    header( "Location: /todomemento" );
}

$all = $ostore->all();

?>
<!DOCTYPE html>
<html>
<head>
    <title>PHP Todo</title>
    <style type="text/css">
    body {
        font: 14px/1.5 helvetica, arial, sans-serif;
        width: 800px;
        margin: 0 auto;
    }
    </style>
</head>
<body>
    <header>
        <h1><a href="/todomemento">Todo</a></h1>
        <form action="" method="post">
            <input type="text" name="text" />
            <input type="submit" name="todo" />
        </form>
    </header>
    <section class="main">
        <ul class="items">
        <?php if ( count( $all ) == 0 ): ?>
            <li>No items to see here.</li>
        <?php else: foreach ( $all as $item ) : ?>
            <li><?php echo $item->getContent(); ?></li>
        <?php endforeach; endif; ?>
        </ul>
        <p><a href="./?clear">clear all</a></p>
    </section>
    <footer>
        <p>Copyright &copy; 2014 Towry Wang</p>
    </footer>
</body>
</html>
