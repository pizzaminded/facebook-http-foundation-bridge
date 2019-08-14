<?php

namespace Pizzaminded\FacebookHttpFoundationBridge;

use Facebook\Url\UrlDetectionInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\RequestStack;

/**
 * @author pizzaminded <miki@appvende.net>
 * @license MIT
 */
class UrlDetectionHandler implements UrlDetectionInterface
{
    /**
     * @var RequestStack
     */
    protected $requestStack;

    /**
     * HttpFoundationUrlDetectionHandler constructor.
     * @param RequestStack $requestStack
     */
    public function __construct(RequestStack $requestStack)
    {
        $this->requestStack = $requestStack;
    }

    /**
     * @param Request $request
     * @return UrlDetectionHandler
     */
    public static function fromRequest(Request $request)
    {
        $stack = new RequestStack();
        $stack->push($request);

        return new self($stack);
    }

    /**
     * {@inheritdoc}
     */
    public function getCurrentUrl()
    {
        $currentRequest = $this->requestStack->getCurrentRequest();

        return $currentRequest->getUri();
    }
}
