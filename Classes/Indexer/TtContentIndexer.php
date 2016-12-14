<?php

namespace CedricZiel\FindGoodies\Indexer;

use Solarium\Client;

class TtContentIndexer implements IndexerInterface
{
    /**
     * @var Client
     */
    protected $client;

    /**
     * Indexes a single given row.
     *
     * @param array $row
     *
     * @return void
     */
    public function indexRow(array $row = [])
    {
        $update = $this->client->createUpdate();
        $document = $update->createDocument();

        $document->id = $row['uid'];
        $document->type = 'tt_content';
        $document->header = $row['header'];
        $document->CType = $row['CType'];
        $document->crdate = $row['crdate'];
        $document->tstamp = $row['tstamp'];

        $update->addDocument($document);
        $update->addCommit();

        $this->client->update($update);
    }

    /**
     * @param Client $client
     */
    public function setClient($client)
    {
        $this->client = $client;
    }
}
