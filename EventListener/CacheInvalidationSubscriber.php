<?php
/**
 * Created by PhpStorm.
 * User: ddepeuter
 * Date: 21/12/15
 * Time: 21:27
 */

namespace Clastic\HttpCacheBundle\EventListener;


use Clastic\NodeBundle\Event\NodeFormPersistEvent;
use FOS\HttpCache\Exception\UnsupportedProxyOperationException;
use FOS\HttpCacheBundle\CacheManager;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpFoundation\RequestStack;

class CacheInvalidationSubscriber implements EventSubscriberInterface
{
    /**
     * @var CacheManager
     */
    private $cacheManager;

    /**
     * @var RequestStack
     */
    private $requestStack;

    public static function getSubscribedEvents()
    {
        return [
            NodeFormPersistEvent::NODE_FORM_PERSIST => 'invalidateNode',
        ];
    }

    public function __construct(CacheManager $cacheManager, RequestStack $requestStack)
    {
        $this->cacheManager = $cacheManager;
        $this->requestStack = $requestStack;
    }

    public function invalidateNode(NodeFormPersistEvent $event)
    {
        $node = $event->getNode();

        try {
            if (isset($node->alias)) {
                $url = $this->requestStack->getMasterRequest()->getSchemeAndHttpHost() . '/' . $node->alias->getAlias();
                $this->cacheManager->invalidatePath($url);
            }

            $this->cacheManager->invalidateRoute('clastic_front_detail', ['id' => $node->getId()]);
        } catch (UnsupportedProxyOperationException $e) {
            // It will expire at some point.
        }
    }
}
