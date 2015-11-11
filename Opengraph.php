<?php

/**
 * @property-write string $image
 */
class Opengraph extends CApplicationComponent
{
    /**
     * @var string The type of your object, e.g., "video.movie". Depending on the type you specify, other properties may also be required.
     * @link http://ogp.me/#types
     */
    public $type = 'website';
    /**
     * @var string If your object is part of a larger web site, the name which should be displayed for the overall site. e.g., "IMDb".
     * @link http://ogp.me/#types
     */
    public $site_name;
    /**
     * @var string
     */
    public $title;
    /**
     * @var string
     */
    public $url;
    /**
     * @var string
     */
    public $description;
    /**
     * @var string
     */
    protected $image;

    public function setImage($image, $rewrite = true)
    {
        if ($rewrite || $this->image === null)
            $this->image = $image;
        
        return $this;
    }
    
    public function flush()
    {
        $clientScript = Yii::app()->clientScript;

        if ($this->type !== null)
            $clientScript->registerMetaTag($this->type, 'og:type');
            
        if ($this->site_name !== null)
            $clientScript->registerMetaTag($this->site_name, 'og:site_name');

        if ($this->title !== null)
            $clientScript->registerMetaTag($this->title, 'og:title');

        if ($this->url !== null)
            $clientScript->registerMetaTag($this->url, 'og:url');

        if ($this->description !== null)
            $clientScript->registerMetaTag($this->description, 'og:description');

        if ($this->image !== null) {
            $url = $this->image;
            if (strpos($url, '/') === 0)
                $url = Yii::app()->getRequest()->getHostInfo() . $url;
            
            $clientScript->registerMetaTag($url, 'og:image');
        }
    }
}
