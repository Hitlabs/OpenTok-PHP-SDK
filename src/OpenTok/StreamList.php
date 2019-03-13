<?php

namespace OpenTok;

/**
 * An object, returned by the <a href="OpenTok.html#method_listStreams">OpenTok.listStreams()</a>
 * method, representing a list of streams in an OpenTok session.
 */
class StreamList
{

    /** @ignore */
    private $data;
    private $items;

    /** @ignore */
    public function __construct($streamListData)
    {
        $this->data = $streamListData;
    }

    /**
     * Returns the number of total streams for the session ID.
     */
    public function totalCount()
    {
        return $this->data['count'];
    }

    /**
     * Returns an array of Stream objects.
     */
    public function getItems()
    {
        if (!is_array($this->items)) {
            $items = [];
            foreach ($this->data['items'] as $streamData) {
                $items[] = new Stream($streamData);
            }
            $this->items = $items;
        }
        return $this->items;
    }

    public function jsonSerialize()
    {
        return $this->data;
    }
}
