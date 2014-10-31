<?php

require_once "./Klass/Item.php";

function process() {
    if ( strtolower( $_SERVER['REQUEST_METHOD']) != 'post' ) {
        return;
    }

    if ( !isset( $_POST['todo'] ) ) {
        return;
    }

    $text = $_POST['text'];
    $store = store();

    $item = new Item( $text );

    $store->add( $item );
}

function store( $s = null ) {
    static $store;

    if ( $s != null ) {
        $store = $s;
    } else {
        return isset( $store ) ? $store : null;
    }
}
