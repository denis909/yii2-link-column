<?php

namespace denis909\yii;

use yii\helpers\Html;
use Closure;

class LinkColumn extends \yii\grid\DataColumn
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

    public $emptyCell = null;

    protected function renderDataCellContent($model, $key, $index)
    {
    	if ($this->url instanceof Closure)
    	{
    		$url = call_user_func($this->url, $model, $key, $index);
    	}
    	else
    	{
            $url = $this->url;
    	}

        if (!$url)
        {
            return $this->emptyCell;
        }

    	return Html::a($this->linkLabel, $url, $this->linkOptions);
    }

}