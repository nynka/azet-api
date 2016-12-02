<?php
return array(
    'Azet\\V1\\Rest\\User\\Controller' => array(
        'description' => 'Azet User service to retreive user information.',
        'collection' => array(
            'GET' => array(
                'response' => '{
   "_links": {
       "self": {
           "href": "/azet/user"
       },
       "first": {
           "href": "/azet/user?page={page}"
       },
       "prev": {
           "href": "/azet/user?page={page}"
       },
       "next": {
           "href": "/azet/user?page={page}"
       },
       "last": {
           "href": "/azet/user?page={page}"
       }
   }
   "_embedded": {
       "user": [
           {
               "_links": {
                   "self": {
                       "href": "/azet/user[/:user_id]"
                   }
               }
              "id": "The id of a User."
           }
       ]
   }
}',
                'description' => 'Get information about a user.',
            ),
        ),
        'entity' => array(
            'GET' => array(
                'response' => '{
   "_links": {
       "self": {
           "href": "/azet/user[/:user_id]"
       }
   }
   "id": "The id of a User.",
   "username": "Short username",
   "email": "The e-mail address of a user.",
   "displayName": "The display name of a User as shown to others.",
   "state": "The current state of a User.",
   "roles": "All roles assosiated with a User."
}',
            ),
        ),
    ),
    'Azet\\V1\\Rest\\Asset\\Controller' => array(
        'collection' => array(
            'GET' => array(
                'response' => '{
   "_links": {
       "self": {
           "href": "/azet/asset"
       },
       "first": {
           "href": "/azet/asset?page={page}"
       },
       "prev": {
           "href": "/azet/asset?page={page}"
       },
       "next": {
           "href": "/azet/asset?page={page}"
       },
       "last": {
           "href": "/azet/asset?page={page}"
       }
   }
   "_embedded": {
       "asset": [
           {
               "_links": {
                   "self": {
                       "href": "/azet/asset[/:asset_id]"
                   }
               }

           }
       ]
   }
}',
                'description' => 'Get an asset.',
            ),
            'POST' => array(
                'description' => 'Create a new Asset',
                'request' => '{
   "id": "The id of an Asset.",
   "real_id": "The human readable id of the Asset as typed on it.",
   "name": "The name of the Asset.",
   "type": "The type of Asset."
}',
                'response' => '{
   "_links": {
       "self": {
           "href": "/azet/asset[/:asset_id]"
       }
   }
   "id": "The id of an Asset.",
   "real_id": "The human readable id of the Asset as typed on it.",
   "name": "The name of the Asset.",
   "type": "The type of Asset."
}',
            ),
        ),
        'description' => 'A REST service to handle Assets.',
    ),
);
