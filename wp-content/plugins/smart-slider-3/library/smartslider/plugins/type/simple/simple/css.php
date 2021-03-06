<?php

class N2SmartSliderCSSSimple extends N2SmartSliderCSSAbstract {


    public function __construct($slider) {
        parent::__construct($slider);

        $params = $this->slider->params;
        N2Loader::import('libraries.image.color');

        $width  = intval($this->context['width']);
        $height = intval($this->context['height']);

        $this->context['backgroundSize']       = $params->getIfEmpty('background-size', 'inherit');
        $this->context['backgroundAttachment'] = $params->get('background-fixed') ? 'fixed' : 'scroll';

        $borderWidth                   = $params->get('border-width');
        $borderColor                   = $params->get('border-color');
        $this->context['borderRadius'] = $params->get('border-radius') . 'px';

        $padding                   = N2Parse::parse($params->get('padding'));
        $this->context['paddingt'] = $padding[0] . 'px';
        $this->context['paddingr'] = $padding[1] . 'px';
        $this->context['paddingb'] = $padding[2] . 'px';
        $this->context['paddingl'] = $padding[3] . 'px';

        if ($this->context['canvas']) {
            $width += 2 * $borderWidth + $padding[1] + $padding[3];
            $height += 2 * $borderWidth + $padding[0] + $padding[2];

            $this->context['width']  = $width . "px";
            $this->context['height'] = $height . "px";
        }


        $this->context['border'] = $borderWidth . 'px';

        $rgba                        = N2Color::hex2rgba($borderColor);
        $this->context['borderrgba'] = 'RGBA(' . $rgba[0] . ',' . $rgba[1] . ',' . $rgba[2] . ',' . round($rgba[3] / 127, 2) . ')';
        $this->context['borderhex']  = '#' . substr($borderColor, 0, 6);

        $width                         = $width - ($padding[1] + $padding[3]) - $borderWidth * 2;
        $height                        = $height - ($padding[0] + $padding[2]) - $borderWidth * 2;
        $this->context['inner1height'] = $height . 'px';

        $this->context['canvaswidth']  = $width . "px";
        $this->context['canvasheight'] = $height . "px";

        $this->initSizes();

        $this->slider->addLess(N2Filesystem::translate(dirname(__FILE__) . NDS . 'style.n2less'), $this->context);
    }
}