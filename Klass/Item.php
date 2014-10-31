<?php

/**
 * This is item class, used to represent an item
 * so the item can be easily stored in a file by
 * serializing this object.
 */
class Item
{
    /**
     * @var string
     */
    private $timestamp;

    /**
     * @var string
     */
    private $content;

    /**
     * Construct for `Item` klass
     *
     * @param string $content
     * @return void
     */
    public function __construct( $content )
    {
        $this->content = $content;

        // date_default_timezone_set( 'UTC' );
        $this->timestamp = time();
    }

    /**
     * Returns the timestamp
     *
     * @return string
     */
    public function getTimestamp()
    {
        return $this->timestamp;
    }

    /**
     * Returns the content
     *
     * @return string
     */
    public function getContent()
    {
        return $this->content;
    }
}
