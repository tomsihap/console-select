<?php
namespace EddIriarte\Console\Traits;

use EddIriarte\Console\Helpers\SelectionHelper;
use EddIriarte\Console\Inputs\CheckboxInput;
use EddIriarte\Console\Inputs\RadioInput;

trait WithSelections
{
    public function enableSelectHelper()
    {
        $this->getHelperSet()->set(
            new SelectionHelper($this->input, $this->output)
        );
    }

    public function select(string $message, array $options, bool $allowMultiple = true)
    {
        $helper = $this->getHelper('selection');
        $question = $allowMultiple ? new CheckboxInput($message, $options) : new RadioInput($message, $options);

        return $helper->select($question);
    }
}