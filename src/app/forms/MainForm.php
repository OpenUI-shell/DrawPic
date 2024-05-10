<?php
namespace app\forms;

use std, gui, framework, app;


class MainForm extends AbstractForm
{

    /**
     * @event show 
     */
    function doShow(UXWindowEvent $e = null)
    {    
        $this->colorPicker->value = UXColor::of('black');
    }

    /**
     * @event canvas.mouseDown 
     */
    function doCanvasMouseDown(UXMouseEvent $e = null)
    {    
        $this->canvas->gc()->beginPath();
        $this->canvas->gc()->moveTo($e->x, $e->y);
    }

    /**
     * @event canvas.mouseUp 
     */
    function doCanvasMouseUp(UXMouseEvent $e = null)
    {    
        $this->canvas->gc()->lineTo($e->x, $e->y);
        $this->canvas->gc()->stroke();
    }

    /**
     * @event canvas.mouseDrag 
     */
    function doCanvasMouseDrag(UXMouseEvent $e = null)
    {    
        $this->canvas->gc()->lineTo($e->x, $e->y);
        $this->canvas->gc()->stroke();        
    }

    /**
     * @event colorPicker.action 
     */
    function doColorPickerAction(UXEvent $e = null)
    {    
        $this->canvas->gc()->strokeColor = $e->sender->value->getWebValue(); 
    }

    /**
     * @event combobox.action 
     */
    function doComboboxAction(UXEvent $e = null)
    {    
        $this->canvas->gc()->lineWidth = $e->sender->value;
    }

    /**
     * @event button.action 
     */
    function doButtonAction(UXEvent $e = null)
    {    
        $this->canvas->gc()->clearRect(0, 0, $this->canvas->width, $this->canvas->height); 
    }

    /**
     * @event buttonAlt.action 
     */
    function doButtonAltAction(UXEvent $e = null)
    {   
        $rand = str::random(5, 'ABCDFE123'); 
        $this->canvas->save('image_'. $rand . '.png');
    }



}
