<?php

namespace Workshop;

use Ratchet\ConnectionInterface;
use Ratchet\Wamp\Topic;
use Ratchet\Wamp\WampServerInterface;
use React\EventLoop\LoopInterface;

/**
 * @package Workshop
 *
 * @todo $topic->getId() gives you the topic name ("time" or "sql")
 * @todo $topic->count() provides a count of people subscribed to the topic now (including the one triggering this method)
 * @todo $this->loop->addPeriodicTimer() returns a Timer object you should store to potentially cancel in onUnsubscribe()
 * @todo You can call $topic->broadcast() to broadcast data (instance of {@see Topic::class}
 * @todo Call $this->queryData() to query the database data
 */
class EventHandler implements WampServerInterface
{
    /**
     * @var LoopInterface
     */
    private $loop;

    /**
     * @param LoopInterface $loop
     */
    public function __construct(LoopInterface $loop)
    {
        $this->loop = $loop;
    }

    /**
     * @param ConnectionInterface $conn
     * @param Topic               $topic
     */
    function onSubscribe(ConnectionInterface $conn, $topic)
    {
    }

    /**
     * @param ConnectionInterface $conn
     * @param Topic               $topic
     */
    function onUnSubscribe(ConnectionInterface $conn, $topic)
    {
    }

    /**
     * @return array
     */
    private function queryData(): array
    {
        $sqlite = new \SQLite3(__DIR__ . '/../data/sqlite.db');

        //$sqlite->createFunction('sleep', 'sleep', 1);
        //$result = $sqlite->query('SELECT some_data, sleep(5) FROM data;');
        $result = $sqlite->query('SELECT some_data FROM data;');

        $data = [];

        while ($row = $result->fetchArray())
        {
            $data[] = $row['some_data'];
        }

        return $data;
    }

    /** Don't worry about these for now **/
    public function onClose(ConnectionInterface $conn) { }
    public function onError(ConnectionInterface $conn, \Exception $e) { }
    public function onCall(ConnectionInterface $conn, $id, $topic, array $params) { }
    public function onOpen(ConnectionInterface $conn) { }
    public function onPublish(ConnectionInterface $conn, $topic, $event, array $exclude, array $eligible) { }
}