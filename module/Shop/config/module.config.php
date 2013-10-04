<?php
return array(
'doctrine' => array(

        // Metadata Mapping driver configuration
        'driver' => array(
            'shop_entities' => array(
                'class' => '\Doctrine\ORM\Mapping\Driver\AnnotationDriver',
                'cache' => 'array',
                'paths' => array(__DIR__ . '/../src/Shop/Entity')
            ),
            'orm_shop' => array(
                'class'   => 'Doctrine\ORM\Mapping\Driver\DriverChain',
                'drivers' => array(
                    'Shop\Entity' => 'shop_entities'
                )
            )
        ),


        'configuration' => array(
            // Configuration for service `doctrine.configuration.orm_shop` service
            'orm_shop' => array(
                // metadata cache instance to use. The retrieved service name will
                // be `doctrine.cache.$thisSetting`
                'metadata_cache'    => 'array',

                // DQL queries parsing cache instance to use. The retrieved service
                // name will be `doctrine.cache.$thisSetting`
                'query_cache'       => 'array',

                // ResultSet cache to use.  The retrieved service name will be
                // `doctrine.cache.$thisSetting`
                'result_cache'      => 'array',

                // Mapping driver instance to use. Change this only if you don't want
                // to use the default chained driver. The retrieved service name will
                // be `doctrine.driver.$thisSetting`
                'driver'            => 'orm_shop',

                // Generate proxies automatically (turn off for production)
                'generate_proxies'  => true,

                // directory where proxies will be stored. By default, this is in
                // the `data` directory of your application
                'proxy_dir'         => 'data/DoctrineORMModule/Proxy',

                // namespace for generated proxy classes
                'proxy_namespace'   => 'DoctrineORMModule\Proxy',

                // SQL filters.
                'filters'           => array()
            )
        ),


        // Entity Manager instantiation settings
        'entitymanager' => array(
            // configuration for the `doctrine.entitymanager.orm_shop` service
            'orm_shop' => array(
                // connection instance to use. The retrieved service name will
                // be `doctrine.connection.$thisSetting`
                'connection'    => 'orm_shop',

                // configuration instance to use. The retrieved service name will
                // be `doctrine.configuration.$thisSetting`
                'configuration' => 'orm_shop'
            )
        ),


        'eventmanager' => array(
            // configuration for the `doctrine.eventmanager.orm_shop` service
            'orm_shop' => array()
        ),


        // collector SQL logger, used when ZendDeveloperTools and its toolbar are active
        'sql_logger_collector' => array(
            // configuration for the `doctrine.sql_logger_collector.orm_shop` service
            'orm_shop' => array(),
        ),


        // entity resolver configuration, allows mapping associations to interfaces
        'entity_resolver' => array(
            // configuration for the `doctrine.entity_resolver.orm_shop` service
            'orm_shop' => array()
        ),


        // authentication service configuration
        'authentication' => array(
            // configuration for the `doctrine.authentication.orm_shop` authentication service
            'orm_shop' => array(
                // name of the object manager to use. By default, the EntityManager is used
                'objectManager' => 'doctrine.entitymanager.orm_shop'
            ),
        )
    ),



    'service_manager' => array(
        'factories' => array(
            'doctrine.authenticationadapter.orm_shop' => new DoctrineModule\Service\Authentication\AdapterFactory('orm_shop'),
            'doctrine.authenticationstorage.orm_shop' => new DoctrineModule\Service\Authentication\StorageFactory('orm_shop'),
            'doctrine.authenticationservice.orm_shop' => new DoctrineModule\Service\Authentication\AuthenticationServiceFactory('orm_shop'),
            'doctrine.connection.orm_shop' => new DoctrineORMModule\Service\DBALConnectionFactory('orm_shop'),
            'doctrine.configuration.orm_shop' => new DoctrineORMModule\Service\ConfigurationFactory('orm_shop'),
            'doctrine.entitymanager.orm_shop' => new DoctrineORMModule\Service\EntityManagerFactory('orm_shop'),
            'doctrine.driver.orm_shop' => new DoctrineModule\Service\DriverFactory('orm_shop'),
            'doctrine.eventmanager.orm_shop' => new DoctrineModule\Service\EventManagerFactory('orm_shop'),
            'doctrine.entity_resolver.orm_shop' => new DoctrineORMModule\Service\EntityResolverFactory('orm_shop'),
            'doctrine.sql_logger_collector.orm_shop' => new DoctrineORMModule\Service\SQLLoggerCollectorFactory('orm_shop'),
            'doctrine.mapping_collector.orm_shop' => function (Zend\ServiceManager\ServiceLocatorInterface $sl) {
                $em = $sl->get('doctrine.entitymanager.orm_shop');

                return new DoctrineORMModule\Collector\MappingCollector($em->getMetadataFactory(), 'orm_shop_mappings');
            },
            'DoctrineORMModule\Form\Annotation\AnnotationBuilder' => function(Zend\ServiceManager\ServiceLocatorInterface $sl) {
                return new DoctrineORMModule\Form\Annotation\AnnotationBuilder($sl->get('doctrine.entitymanager.orm_shop'));
            },
        ),
    ),

'view_manager' => array(
        'template_path_stack' => array(
            __DIR__ . '/../view',
        )),

    'router' => array(
        'routes' => array(
            'roleverwaltung' => array(
                'type' => 'Zend\Mvc\Router\Http\Literal',
                'options' => array(
                    'route' => '/shop',
                    'defaults' => array(
                        'controller' => 'Shop\Controller\Index',
                        'action' => 'index',
)
)
))),
'controllers' => array(
    'invokables' => array(
        'Shop\Controller\Index' => 'Shop\Controller\IndexController',))
);