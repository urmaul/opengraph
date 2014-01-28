<?php

/**
 * @property-write string $image
 */
class Opengraph extends CApplicationComponent
{
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
        
        if ($this->image !== null) {
            $url = $this->image;
            if (strpos($url, '/') === 0)
                $url = Yii::app()->getRequest()->getHostInfo() . $url;
            
            $clientScript->registerMetaTag($url, 'og:image');
        }
    }
}
