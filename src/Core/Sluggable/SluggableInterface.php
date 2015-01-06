<?php namespace Saphira\Core\Sluggable;


interface SluggableInterface {

    public function getSlug();
    public function sluggify($force=false);
    public function resluggify();

}