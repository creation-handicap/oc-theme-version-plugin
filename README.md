# Assets Version Plugin for October CMS

Intended to force cache refresh.

## Edge Case Usage Example
When an image is exchanged, while keeping the same name, the cache does not bust, even after clearing it.

Usually clearing cache should be enough to force cache refresh assets. We recommend the [Clear file cache](https://octobercms.com/plugin/romanov-clearcachewidget) plugin.

## Function Usage

### Twig Function Example
```
<img src="{{ 'assets/images/image.png'|theme }}?v={{ assetVersion() }}" alt="Image...">
```

To make the functionality obvious, add `?v={{ assetVersion() }}` to your assets.

### Twig Filter Example
```
<img src="{{ 'assets/images/image.png'|theme|assetVersion }}" alt="Image...">
```

You can also use the `assetVersion` Twig filter, although this way, the functionality is not that obvious.
