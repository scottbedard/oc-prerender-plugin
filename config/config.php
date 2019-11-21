<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Enable Prerender
    |--------------------------------------------------------------------------
    |
    | Set this field to false to fully disable the prerender service. You
    | would probably override this in a local configuration, to disable
    | prerender on your local machine.
    |
    */

    'enable' => env('PRERENDER_ENABLE', true),

    /*
    |--------------------------------------------------------------------------
    | Prerender URL
    |--------------------------------------------------------------------------
    |
    | This is the prerender URL to the service that prerenders the pages.
    | By default, Prerender's hosted service on prerender.io is used
    | (https://service.prerender.io). But you can also set it to your
    | own server address.
    |
    */

    'prerenderUrl' => env('PRERENDER_URL', 'https://service.prerender.io'),
    
    /*
    |--------------------------------------------------------------------------
    | Return soft HTTP status codes
    |--------------------------------------------------------------------------
    |
    | By default Prerender returns soft HTTP codes. If you would like it to
    | return the real ones in case of Redirection (3xx) or status Not Found (404),
    | set this parameter to false. 
    | Keep in mind that returning real HTTP codes requires appropriate meta tags
    | to be set. For more details, see github.com/prerender/prerender#httpheaders
    | 
    */

    'prerenderSoftHttpCodes' => env('PRERENDER_SOFT_HTTP_STATUS_CODES', false),
    
    /*
    |--------------------------------------------------------------------------
    | Prerender Token
    |--------------------------------------------------------------------------
    |
    | If you use prerender.io as service, you need to set your prerender.io
    | token here. It will be sent via the X-Prerender-Token header. If
    | you do not provide a token, the header will not be added.
    |
    */

    'prerenderToken' => env('PRERENDER_TOKEN'),
    
    /*
    |--------------------------------------------------------------------------
    | Prerender Whitelist
    |--------------------------------------------------------------------------
    |
    | Whitelist paths or patterns. You can use asterix syntax, or regular
    | expressions (without start and end markers). If a whitelist is supplied,
    | only url's containing a whitelist path will be prerendered. An empty
    | array means that all URIs will pass this filter. Note that this is the
    | full request URI, so including starting slash and query parameter string.
    | See github.com/JeroenNoten/Laravel-Prerender for an example.
    |
    */

    'whitelist' => [],

    /*
    |--------------------------------------------------------------------------
    | Prerender Blacklist
    |--------------------------------------------------------------------------
    |
    | Blacklist paths to exclude. You can use asterix syntax, or regular
    | expressions (without start and end markers). If a blacklist is supplied,
    | all url's will be prerendered except ones containing a blacklist path.
    | By default, a set of asset extentions are included (this is actually only
    | necessary when you dynamically provide assets via routes). Note that this
    | is the full request URI, so including starting slash and query parameter
    | string. See github.com/JeroenNoten/Laravel-Prerender for an example.
    |
    */

    'blacklist' => [
        '/backend/*',
        '*.ai',
        '*.avi',
        '*.css',
        '*.dat',
        '*.dmg',
        '*.doc',
        '*.doc',
        '*.eot',
        '*.exe',
        '*.flv',
        '*.gif',
        '*.ico',
        '*.iso',
        '*.jpeg',
        '*.jpg',
        '*.js',
        '*.less',
        '*.m4a',
        '*.m4v',
        '*.mov',
        '*.mp3',
        '*.mp4',
        '*.mpeg',
        '*.mpg',
        '*.otf',
        '*.pdf',
        '*.png',
        '*.ppt',
        '*.psd',
        '*.rar',
        '*.rss',
        '*.svg',
        '*.swf',
        '*.tif',
        '*.torrent',
        '*.ttf',
        '*.txt',
        '*.wav',
        '*.wmv',
        '*.woff',
        '*.woff2',
        '*.xls',
        '*.xml',
        '*.zip',
    ],

    /*
    |--------------------------------------------------------------------------
    | Crawler User Agents
    |--------------------------------------------------------------------------
    |
    | Requests from crawlers that do not support _escaped_fragment_ will
    | nevertheless be served with prerendered pages. You can customize
    | the list of crawlers here.
    |
    */

    'crawlerUserAgents' => [
        'baiduspider',
        'bingbot',
        'developers.google.com/+/web/snippet',
        'embedly',
        'facebookexternalhit',
        'googlebot',
        'linkedinbot',
        'outbrain',
        'pinterest',
        'quora link preview',
        'rogerbot',
        'showyoubot',
        'slackbot',
        'twitterbot',
        'yahoo',
        'yandex',
    ],
];