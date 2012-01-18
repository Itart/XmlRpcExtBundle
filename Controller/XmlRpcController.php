<?php

/*
 * This file is part of the RPC Bundle for Symfony2.
 *
 * (c) Pavel Gopanenko <pavelgopanenko@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Itart\Bundle\XmlRpcExtBundle\Controller;

use Itart\Bundle\RpcBundle\Controller\BaseController;

/**
 * Provides access through the XML-RPC.
 *
 * @package    ItartXmlRpcExtBundle
 * @subpackage Controller
 * @author     Pavel Gopanenko <pavelgopanenko@gmail.com>
 * @copyright  2012 Pavel Gopanenko
 */
class XmlRpcController extends BaseController
{
    /**
     * Main action.
     *
     * @return Response
     */
    public function indexAction()
    {
        $server = $this->get('rpc.server.builder')->buildServer('xmlrpc');

        return $this->createResponse($server->handle(), 'text/xml; charset=UTF-8');
    }
}
