<?php

require_once "Store.php";

class ObjectStore extends Store
{
    /**
     * The Constructor for ObjectStore
     *
     * @return void
     */
    public function __construct( $store, $del = null )
    {
        parent::__construct( $store, $del );
    }

    /**
     * Add an object
     *
     * @return boolean
     */
    public function add( $obj )
    {
        if ( !is_object( $obj ) ) {
            return false;
        }

        $objs = serialize( $obj );

        $this->puts( $objs );

        // make sure increase after puts
        $this->increase();

        return true;
    }

    /**
     * Returns objects as array
     *
     * @return array
     */
    public function all()
    {
        $content = $this->content();
        $del = $this->getDelimiter();

        if ( trim( $content ) == '' ) return [];

        $oarr = explode( $del, $content );
        $ret = array();

        foreach ( $oarr as $v ) {
            if ( trim( $v ) == '' ) continue;
            
            $ret[] = unserialize( $v );
        }

        return $ret;
    }
}
