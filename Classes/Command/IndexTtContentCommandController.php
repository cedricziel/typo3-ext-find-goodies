<?php

namespace CedricZiel\FindGoodies\Command;

use CedricZiel\FindGoodies\Indexer\TtContentIndexer;
use Solarium\Client;
use TYPO3\CMS\Core\Database\DatabaseConnection;
use TYPO3\CMS\Extbase\Mvc\Controller\CommandController;

class IndexTtContentCommandController extends CommandController
{
    /**
     * @var Client
     */
    protected $client;

    /**
     * @var TtContentIndexer
     */
    private $indexer;

    public function __construct(TtContentIndexer $indexer)
    {
        $this->indexer = $indexer;

        $configuration = [
            'endpoint' => [
                'localhost' => [
                    'host'    => '127.0.0.1',
                    'port'    => 8983,
                    'path'    => '/solr/mycore',
                    'timeout' => 10,
                    'scheme'  => 'http',
                ],
            ],
        ];

        $this->client = new Client($configuration);
    }

    public function indexCommand()
    {
        $this->indexer->setClient($this->client);

        /** @var DatabaseConnection $db */
        $db = $this->getDatabaseConnection();
        $rows = $db->exec_SELECTgetRows('*', 'tt_content', '');

        foreach ($rows as $row) {
            echo ' - '.$row['header'].PHP_EOL;
            $this->indexer->indexRow($row);
        }
    }

    /**
     * @return DatabaseConnection
     */
    protected function getDatabaseConnection()
    {
        return $GLOBALS['TYPO3_DB'];
    }
}
