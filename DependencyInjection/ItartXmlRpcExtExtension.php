<?php

/*
 * This file is part of the Facade Bundle for Symfony2.
 *
 * (c) Pavel Gopanenko <pavelgopanenko@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Itart\Bundle\XmlRpcExtBundle\DependencyInjection;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\HttpKernel\DependencyInjection\Extension;
use Symfony\Component\DependencyInjection\Loader;

/**
 * Load facade extension features.
 *
 * @package    ItartXmlRpcExtBundle
 * @subpackage DependencyInjection
 * @author     Pavel Gopanenko <pavelgopanenko@gmail.com>
 * @copyright  2012 Pavel Gopanenko
 */
class ItartXmlRpcExtExtension extends Extension
{
    /**
     * Loads a specific configuration.
     *
     * @param array            $config    An array of configuration values
     * @param ContainerBuilder $container A ContainerBuilder instance
     *
     * @see Symfony\Component\DependencyInjection\Extension.ExtensionInterface::load()
     */
    public function load(array $config, ContainerBuilder $container)
    {
        $loader = new Loader\XmlFileLoader($container, new FileLocator(__DIR__.'/../Resources/config'));
        $loader->load('xmlrpc.xml');

        $this->addClassesToCompile(array(
            'Itart\Bundle\XmlRpcExtBundle\Server\XmlRpc',
        ));
    }
}
