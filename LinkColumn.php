<?php

namespace denis909\yii;

use yii\helpers\Html;
use Closure;

class LinkColumn extends DataColumn
{

	public $contentOptions = [
		'style' => 'width: 1%; white-space: nowrap;'
	];

	public $headerOptions = [
		'style' => 'width: 1%;'
	];

	public $linkLabel;

	public $url;

	public $linkOptions = [];

    protected function renderDataCellContent($model, $key, $index)
    {
    	if ($this->url instanceof Closure)
    	{
    		$url = call_user_func($this->url, $model, $key, $index);
    	}
    	else
    	{
            $url = $model->{$this->url};
    	}    	

    	return Html::a($this->linkLabel, $url, $this->linkOptions);
    }

}