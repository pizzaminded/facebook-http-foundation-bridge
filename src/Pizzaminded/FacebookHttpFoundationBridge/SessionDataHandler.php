<?php

namespace Pizzaminded\FacebookHttpFoundationBridge;

use Facebook\PersistentData\PersistentDataInterface;
use Symfony\Component\HttpFoundation\Session\SessionInterface;

/**
 * @author pizzaminded <miki@appvende.net>
 * @license MIT
 */
class SessionDataHandler implements PersistentDataInterface
{
    /**
     * @var string
     */
    const SESSION_PREFIX = 'FBSDH_';

    /**
     * @var SessionInterface
     */
    protected $session;

    /**
     * SessionDataHandler constructor.
     * @param SessionInterface $session
     */
    public function __construct(SessionInterface $session)
    {
        $this->session = $session;
    }

    /**
     * {@inheritdoc}
     */
    public function get($key)
    {
        return $this->session->get(self::SESSION_PREFIX . $key);
    }

    /**
     * {@inheritdoc}
     */
    public function set($key, $value)
    {
        $this->session->set(self::SESSION_PREFIX . $key, $value);
    }
}