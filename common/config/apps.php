<?php 
return [
    'app' => [
        'hostInfo' => appHostInfo(configApp('app', 'base_url')),
        'baseUrl' => configApp('app', 'base_url.path', '/'),
    ],
];