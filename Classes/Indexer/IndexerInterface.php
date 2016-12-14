<?php

namespace CedricZiel\FindGoodies\Indexer;

/**
 * Indexer Standardisation
 */
interface IndexerInterface
{
    /**
     * Indexes a single given row.
     *
     * @param array $row
     *
     * @return void
     */
    public function indexRow(array $row = []);
}
