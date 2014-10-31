<?php

/**
 * This is a simple implementation of store, 
 * based on filesystem.
 */

class Store implements Countable
{
    /**
     * @var string
     * 
     * The store file name
     */
    private $store;

    /**
     * @var int
     */
    private $count;

    /**
     * @var string
     *
     * The delimiter
     */
    private $delimiter;

    /**
     * Construct for `Store` klass
     *
     * @return void
     * @throws RuntimeExeption
     */
    public function __construct( $store, $del = null )
    {
        $this->store = $store;
        $this->delimiter = $del == null ? '#' : $del;
        $this->count = 0;
    }

    /**
     * Puts content to the store
     *
     * @param string $content
     * @param boolean $append
     * @return void
     */
    public function puts( $content, $append = true )
    {
        if ( $append ) {
            file_put_contents( $this->store, $content, FILE_APPEND );
        } else {
            file_put_contents( $this->store, $content );
        }

        // make sure the delimiter is append to the content
        file_put_contents( $this->store, $this->delimiter, FILE_APPEND );
    }

    /**
     * Get the content as string
     *
     * @return string
     */
    public function content()
    {
        return file_get_contents( $this->store );
    }

    /**
     * Get the delimiter
     *
     * @return string
     */
    public function getDelimiter()
    {
        return $this->delimiter;
    }

    /**
     * Set the delimiter
     *
     * @return void
     */
    public function setDelimiter( $del )
    {
        $this->delimiter = $del;
    }

    /**
     * add a item
     *
     * @throws NotImplemented
     */
    public function add( $item )
    {
        throw new Exception( "Not Implemented Exception." );
        
    }

    /**
     * Clean the content
     *
     * @return void
     */
    public function clean()
    {
        file_put_contents( $this->store, '' );
    }

    /**
     * Increase the count
     *
     * @return void
     */
    public function increase()
    {
        $this->count++;
    }

    /**
     * Countable
     *
     * @return int
     */
    public function count()
    {
        return $this->count;
    }
}
