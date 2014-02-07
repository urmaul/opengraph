# Opengraph

Yii component to store and render [opengraph](http://ogp.me/) tags.

## Why

* You can make only first/last occurance of metatag to be rendered.
* It converts image links to absolute.
* You'll white it anyway.

## Supported tags

* og:title
* og:url
* og:description
* og:image

## Installing

Add this to "components" part of your config.

```php
'og' => array(
    'class' => 'ext.opengraph.Opengraph',
),
```

## Using

```php
// Set og:image
Yii::app()->og->image = $imageUrl;
// Set og:image if not set
Yii::app()->og->setImage($imageUrl, false);

// Flush contents to ClientScript
Yii::app()->og->flush();
```