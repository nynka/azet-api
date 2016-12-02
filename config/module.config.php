<?php
return array(
    'service_manager' => array(
        'factories' => array(
            'Azet\\V1\\Rest\\User\\UserResource' => 'Azet\\V1\\Rest\\User\\UserResourceFactory',
            'Azet\\Service\\UserService' => 'Azet\\Factory\\Service\\UserServiceFactory',
            'Azet\\Service\\AssetService' => 'Azet\\Factory\\Service\\AssetServiceFactory',
            'Azet\\V1\\Rest\\Asset\\AssetResource' => 'Azet\\V1\\Rest\\Asset\\AssetResourceFactory',
        ),
    ),
    'router' => array(
        'routes' => array(
            'azet.rest.user' => array(
                'type' => 'Segment',
                'options' => array(
                    'route' => '/azet/user[/:user_id]',
                    'defaults' => array(
                        'controller' => 'Azet\\V1\\Rest\\User\\Controller',
                    ),
                ),
            ),
            'azet.rest.asset' => array(
                'type' => 'Segment',
                'options' => array(
                    'route' => '/azet/asset[/:asset_id]',
                    'defaults' => array(
                        'controller' => 'Azet\\V1\\Rest\\Asset\\Controller',
                    ),
                ),
            ),
        ),
    ),
    'zf-versioning' => array(
        'uri' => array(
            0 => 'azet.rest.user',
            1 => 'azet.rest.asset',
        ),
    ),
    'zf-rest' => array(
        'Azet\\V1\\Rest\\User\\Controller' => array(
            'listener' => 'Azet\\V1\\Rest\\User\\UserResource',
            'route_name' => 'azet.rest.user',
            'route_identifier_name' => 'user_id',
            'collection_name' => 'user',
            'entity_http_methods' => array(
                0 => 'GET',
            ),
            'collection_http_methods' => array(
                0 => 'GET',
            ),
            'collection_query_whitelist' => array(),
            'page_size' => 25,
            'page_size_param' => null,
            'entity_class' => 'Azet\\Entity\\User',
            'collection_class' => 'Azet\\V1\\Rest\\User\\UserCollection',
            'service_name' => 'User',
        ),
        'Azet\\V1\\Rest\\Asset\\Controller' => array(
            'listener' => 'Azet\\V1\\Rest\\Asset\\AssetResource',
            'route_name' => 'azet.rest.asset',
            'route_identifier_name' => 'asset_id',
            'collection_name' => 'asset',
            'entity_http_methods' => array(
                0 => 'GET',
                1 => 'PATCH',
                2 => 'PUT',
                3 => 'DELETE',
                4 => 'POST',
            ),
            'collection_http_methods' => array(
                0 => 'GET',
                1 => 'POST',
            ),
            'collection_query_whitelist' => array(),
            'page_size' => 25,
            'page_size_param' => null,
            'entity_class' => 'Azet\\Entity\\Asset',
            'collection_class' => 'Azet\\V1\\Rest\\Asset\\AssetCollection',
            'service_name' => 'Asset',
        ),
    ),
    'zf-content-negotiation' => array(
        'controllers' => array(
            'Azet\\V1\\Rest\\User\\Controller' => 'HalJson',
            'Azet\\V1\\Rest\\Asset\\Controller' => 'HalJson',
        ),
        'accept_whitelist' => array(
            'Azet\\V1\\Rest\\User\\Controller' => array(
                0 => 'application/vnd.azet.v1+json',
                1 => 'application/hal+json',
                2 => 'application/json',
            ),
            'Azet\\V1\\Rest\\Asset\\Controller' => array(
                0 => 'application/vnd.azet.v1+json',
                1 => 'application/hal+json',
                2 => 'application/json',
            ),
        ),
        'content_type_whitelist' => array(
            'Azet\\V1\\Rest\\User\\Controller' => array(
                0 => 'application/vnd.azet.v1+json',
                1 => 'application/json',
            ),
            'Azet\\V1\\Rest\\Asset\\Controller' => array(
                0 => 'application/vnd.azet.v1+json',
                1 => 'application/json',
            ),
        ),
    ),
    'zf-hal' => array(
        'metadata_map' => array(
            'Azet\\V1\\Rest\\User\\UserEntity' => array(
                'entity_identifier_name' => 'id',
                'route_name' => 'azet.rest.user',
                'route_identifier_name' => 'user_id',
                'hydrator' => 'Zend\\Hydrator\\ObjectProperty',
            ),
            'Azet\\V1\\Rest\\User\\UserCollection' => array(
                'entity_identifier_name' => 'id',
                'route_name' => 'azet.rest.user',
                'route_identifier_name' => 'user_id',
                'is_collection' => true,
            ),
            'MR\\Entity\\PortalUser' => array(
                'entity_identifier_name' => 'id',
                'route_name' => 'azet.rest.user',
                'route_identifier_name' => 'user_id',
                'hydrator' => 'Zend\\Hydrator\\ObjectProperty',
            ),
            'AdFinder\\Entity\\User' => array(
                'entity_identifier_name' => 'id',
                'route_name' => 'azet.rest.user',
                'route_identifier_name' => 'user_id',
                'hydrator' => 'DoctrineModule\\Stdlib\\Hydrator\\DoctrineObject',
            ),
            'Azet\\Entity\\User' => array(
                'entity_identifier_name' => 'id',
                'route_name' => 'azet.rest.user',
                'route_identifier_name' => 'user_id',
                'hydrator' => 'DoctrineModule\\Stdlib\\Hydrator\\DoctrineObject',
            ),
            'Azet\\V1\\Rest\\Asset\\AssetEntity' => array(
                'entity_identifier_name' => 'id',
                'route_name' => 'azet.rest.asset',
                'route_identifier_name' => 'asset_id',
                'hydrator' => 'Zend\\Hydrator\\ArraySerializable',
            ),
            'Azet\\V1\\Rest\\Asset\\AssetCollection' => array(
                'entity_identifier_name' => 'id',
                'route_name' => 'azet.rest.asset',
                'route_identifier_name' => 'asset_id',
                'is_collection' => true,
            ),
            'Azet\\Entity\\Asset' => array(
                'entity_identifier_name' => 'id',
                'route_name' => 'azet.rest.asset',
                'route_identifier_name' => 'asset_id',
                'hydrator' => 'DoctrineModule\\Stdlib\\Hydrator\\DoctrineObject',
            ),
        ),
    ),
    'zf-content-validation' => array(
        'Azet\\V1\\Rest\\User\\Controller' => array(
            'input_filter' => 'Azet\\V1\\Rest\\User\\Validator',
        ),
        'Azet\\V1\\Rest\\Asset\\Controller' => array(
            'input_filter' => 'Azet\\V1\\Rest\\Asset\\Validator',
        ),
    ),
    'input_filter_specs' => array(
        'Azet\\V1\\Rest\\User\\Validator' => array(
            0 => array(
                'required' => true,
                'validators' => array(
                    0 => array(
                        'name' => 'Zend\\I18n\\Validator\\IsInt',
                        'options' => array(
                            'message' => 'Identifier has to be an integer.',
                        ),
                    ),
                ),
                'filters' => array(
                    0 => array(
                        'name' => 'Zend\\Filter\\Digits',
                        'options' => array(),
                    ),
                ),
                'name' => 'id',
                'description' => 'The id of a User.',
                'field_type' => 'integer',
                'error_message' => 'Invalid user identifier.',
            ),
            1 => array(
                'required' => false,
                'validators' => array(
                    0 => array(
                        'name' => 'Zend\\Validator\\StringLength',
                        'options' => array(
                            'max' => '255',
                            'min' => '3',
                        ),
                    ),
                ),
                'filters' => array(
                    0 => array(
                        'name' => 'Zend\\Filter\\StringTrim',
                        'options' => array(),
                    ),
                    1 => array(
                        'name' => 'Zend\\I18n\\Filter\\Alnum',
                        'options' => array(
                            'allow_white_space' => '',
                        ),
                    ),
                ),
                'name' => 'username',
                'description' => 'Short username',
                'field_type' => 'string',
                'error_message' => 'Invalid username.',
                'allow_empty' => false,
            ),
            2 => array(
                'required' => true,
                'validators' => array(
                    0 => array(
                        'name' => 'Zend\\Validator\\EmailAddress',
                        'options' => array(),
                    ),
                ),
                'filters' => array(
                    0 => array(
                        'name' => 'Zend\\Filter\\StringTrim',
                        'options' => array(),
                    ),
                ),
                'name' => 'email',
                'field_type' => 'string',
                'description' => 'The e-mail address of a user.',
                'error_message' => 'Invalid E-mail address.',
            ),
            3 => array(
                'required' => false,
                'validators' => array(),
                'filters' => array(),
                'name' => 'displayName',
                'description' => 'The display name of a User as shown to others.',
                'field_type' => 'string',
            ),
            4 => array(
                'required' => false,
                'validators' => array(),
                'filters' => array(),
                'name' => 'state',
                'description' => 'The current state of a User.',
                'field_type' => 'integer',
            ),
            5 => array(
                'required' => false,
                'validators' => array(),
                'filters' => array(),
                'name' => 'roles',
                'description' => 'All roles assosiated with a User.',
                'allow_empty' => true,
            ),
        ),
        'Azet\\V1\\Rest\\Asset\\Validator' => array(
            0 => array(
                'required' => false,
                'validators' => array(),
                'filters' => array(),
                'name' => 'id',
                'description' => 'The id of an Asset.',
                'field_type' => 'integer',
                'error_message' => 'Invalid identifier.',
            ),
            1 => array(
                'required' => true,
                'validators' => array(),
                'filters' => array(),
                'name' => 'real_id',
                'description' => 'The human readable id of the Asset as typed on it.',
                'field_type' => 'string',
            ),
            2 => array(
                'required' => true,
                'validators' => array(),
                'filters' => array(),
                'name' => 'name',
                'description' => 'The name of the Asset.',
            ),
            3 => array(
                'required' => false,
                'validators' => array(),
                'filters' => array(),
                'name' => 'type',
                'field_type' => 'integer',
                'allow_empty' => true,
                'description' => 'The type of Asset.',
            ),
        ),
    ),
    'zf-mvc-auth' => array(
        'authorization' => array(
            'Azet\\V1\\Rest\\Asset\\Controller' => array(
                'collection' => array(
                    'GET' => false,
                    'POST' => true,
                    'PUT' => false,
                    'PATCH' => false,
                    'DELETE' => false,
                ),
                'entity' => array(
                    'GET' => false,
                    'POST' => true,
                    'PUT' => true,
                    'PATCH' => true,
                    'DELETE' => true,
                ),
            ),
        ),
    ),
);
