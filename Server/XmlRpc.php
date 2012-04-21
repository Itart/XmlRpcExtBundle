<?php

/*
 * This file is part of the XML-RPC Extension Bundle.
 *
 * (c) Pavel Gopanenko <pavelgopanenko@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Itart\Bundle\XmlRpcExtBundle\Server;

use Itart\Bundle\RpcBundle\Server\ServerInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;

/**
 * XML-RPC Server.
 *
 * @package    ItartXmlRpcExtBundle
 * @subpackage Server
 * @author     Pavel Gopanenko <pavelgopanenko@gmail.com>
 * @copyright  2012 Pavel Gopanenko
 */
class XmlRpc extends \Zend_XmlRpc_Server implements ServerInterface
{
    private $_container;

    /**
     * Constructor.
     *
     * @param ContainerInterface $container A ServiceCOntainer instance
     */
    public function __construct(ContainerInterface $container)
    {
        $this->_container = $container;

        \Zend_XmlRpc_Server_Fault::attachFaultException('\Itart\Bundle\RpcBundle\Exception\RpcException');

        if ('dev' == $container->get('kernel')->getEnvironment()) {
            \Zend_XmlRpc_Server_Fault::attachFaultException('\Exception');
        }

        parent::__construct();
    }

    /**
     * Add service methods to server.
     *
     * @param string $id        Service id in service container
     * @param string $namespace Method namespace
     *
     * @see Itart\Bundle\RpcBundle\Server.ServerInterface::addService()
     */
    public function addService($id, $namespace = null)
    {
        $this->setClass($this->_container->get($id), $namespace);
    }

    /**
     * Add class methods to server.
     *
     * @param string $class     Class name
     * @param string $namespace Method namespace
     *
     * @see Itart\Bundle\RpcBundle\Server.ServerInterface::addClass()
     */
    public function addClass($class, $namespace = null)
    {
        $this->setClass($class, $namespace);
    }
}
