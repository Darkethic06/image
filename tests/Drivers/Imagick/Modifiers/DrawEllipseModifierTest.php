<?php

namespace Intervention\Image\Tests\Drivers\Imagick\Modifiers;

use Intervention\Image\Modifiers\DrawEllipseModifier;
use Intervention\Image\Geometry\Ellipse;
use Intervention\Image\Geometry\Point;
use Intervention\Image\Tests\TestCase;
use Intervention\Image\Tests\Traits\CanCreateImagickTestImage;

class DrawEllipseModifierTest extends TestCase
{
    use CanCreateImagickTestImage;

    public function testApply(): void
    {
        $image = $this->readTestImage('trim.png');
        $this->assertEquals('00aef0', $image->pickColor(14, 14)->toHex());
        $drawable = new Ellipse(10, 10, new Point(14, 14));
        $drawable->setBackgroundColor('b53717');
        $image->modify(new DrawEllipseModifier($drawable));
        $this->assertEquals('b53717', $image->pickColor(14, 14)->toHex());
    }
}
