# oc-prerender-plugin

[![License](https://img.shields.io/github/license/scottbedard/oc-prerender-plugin?color=blue)](https://github.com/scottbedard/oc-prerender-plugin/blob/master/LICENSE)

Single page applications provide a great user experience, but are notorious for their poor SEO. This plugin bridges that gap by integrating October with [prerender.io](https://prerender.io). This allows websites like Google, Facebook, and Twitter to crawl your website perfectly, without sacraficing the experience of a SPA.

## Installation

Install the plugin by running the following commands from your root October directory

```bash
git clone git@github.com:scottbedard/oc-prerender-plugin.git plugins/bedard/prerender

composer update
```

Next, configure your prerender token by adding the following to your `.env` file

```
PRERENDER_TOKEN=yoursecrettoken
```

If you are using a self-hosted service, add the server address to your `.env` file

```
PRERENDER_URL=http://example.com
```

You can disable the service by adding the following to your `.env` file

```
PRERENDER_ENABLE=false
```

## Recaching pages

This plugin exposes a `bedard.prerender.recache` event that can be used to recache URLs. For example, say you want to recache blog posts when the content is changes. You could add the following to your `Plugin.php` file achieve this.

```php
public function boot()
{
    \RainLab\Blog\Models\Post::extend(function ($model) {
        $model->bindEvent('afterSave', function () use ($model) {
            \Event::fire('bedard.prerender.recache', 'https://example.com/blog/' . $model->slug);
        });
    });
}
```

## Customizing

Prerendering can be customized by adding the following to a configuration file at `config/bedard/prerender/config.php`. Check the [October documentation](https://octobercms.com/docs/plugin/settings#file-configuration) for information on setting environment specific configuration. [Click here](https://github.com/scottbedard/oc-prerender-plugin/blob/master/config/config.php) to see the default configuration.

#### Whitelist

If a whitelist is supplied, only url's containing a whitelist path will be prerendered. An empty array means that all URIs will pass this filter. Note that this is the full request URI, so including starting slash and query parameter string.

```php
'whitelist' => [
    '/frontend/*' // only prerender pages starting with '/frontend/'
]
```

#### Blacklist

If a blacklist is supplied, all url's will be prerendered except ones containing a blacklist path. By default, a set of asset extentions are included. Note that this is the full request URI, so including starting slash and query parameter string.

```php
'blacklist' => [
    '/api/*' // do not prerender pages starting with '/api/'
]
```

#### User Agents

Requests from crawlers that do not support `_escaped_fragment_` will nevertheless be served with prerendered pages. You can customize the list of crawlers using the following config entry.

```php
'crawler_user_agents' => [
    'googlebot',
]
```

## FAQ

#### Do I need prerendering?

If you're writing traditional themes using October's AJAX framework, then probably not. This plugin is designed for themes like [Vuetober](https://github.com/scottbedard/oc-vuetober-theme), where the majority of rendering is done on the client side.

#### Isn't this what SSR is for?

Yes, but server-rendered applications bring with them a lot of baggage. For starters they often require a Node server, complicated build steps, and that you write "universal code". Prerendering achieves many of the benefits of SSR, with significantly fewer moving parts.

#### How can I verify the integration is working?

Start by checking out the [prerender.io testing docs](https://prerender.io/documentation/test-it). To see how your site looks to different crawlers, try changing your user agent to something like "Googlebot". [Click here](https://developers.google.com/web/tools/chrome-devtools/device-mode/override-user-agent) to learn how to do this in Chrome.

## Credit

Many thanks to [jeroennoten](https://github.com/jeroennoten/Laravel-Prerender) for providing the middleware used in this plugin.

## License

[MIT](https://github.com/scottbedard/oc-prerender-plugin/blob/master/LICENSE)
