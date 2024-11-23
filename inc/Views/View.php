<?php

namespace SWM\MapNoteWP\Views;

use Bojaghi\Contract\Support;

interface View extends Support
{
    public function display(): void;
}
