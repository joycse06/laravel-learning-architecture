<?php

namespace spec\Saphira;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class FooSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('Saphira\Foo');
    }
}
