<?php

namespace spec\Kayladnls\Spec\Logical;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class AllSpec extends ObjectBehavior
{
    function it_will_pass_with_two_true_values($spec1, $spec2)
    {
        $spec1->beADoubleOf('Kayladnls\Spec\Specification');
        $spec1->isSatisfiedBy('anything')->wilLReturn(true);

        $spec2->beADoubleOf('Kayladnls\Spec\Specification');
        $spec2->isSatisfiedBy('anything')->wilLReturn(true);

        $this->beConstructedWith([$spec1, $spec2]);

        $this->isSatisfiedBy('anything')->shouldEqual(true);
    }

    function it_will_fail_with_one_true_one_false($spec1, $spec2)
    {
        $spec1->beADoubleOf('Kayladnls\Spec\Specification');
        $spec1->isSatisfiedBy('anything')->wilLReturn(false);

        $spec2->beADoubleOf('Kayladnls\Spec\Specification');
        $spec2->isSatisfiedBy('anything')->wilLReturn(true);

        $this->beConstructedWith([$spec1, $spec2]);

        $this->isSatisfiedBy('anything')->shouldEqual(false);
    }

    function it_will_fail_with_two_false($spec1, $spec2)
    {
        $spec1->beADoubleOf('Kayladnls\Spec\Specification');
        $spec1->isSatisfiedBy('anything')->wilLReturn(false);

        $spec2->beADoubleOf('Kayladnls\Spec\Specification');
        $spec2->isSatisfiedBy('anything')->wilLReturn(false);

        $this->beConstructedWith([$spec1, $spec2]);

        $this->isSatisfiedBy('anything')->shouldEqual(false);
    }

    function it_can_only_be_constructed_with_specs()
    {
        $this->shouldThrow('\InvalidArgumentException')->during('__construct', [['yellow', 'submarine']]);
    }
}
