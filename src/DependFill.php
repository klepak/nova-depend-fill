<?php

namespace Klepak\DependFill;

use Laravel\Nova\Fields\Field;

class DependFill extends Field
{
    /**
     * The field's component.
     *
     * @var string
     */
    public $component = 'depend-fill';

    /**
     * Set the field
     *
     * @param  Field  $field
     * @return $this
     */
    public function field($field)
    {
        return $this->withMeta(['field' => $field]);
    }

    /**
     * Set the dependsOn
     *
     * @param  Field  $dependsOn
     * @return $this
     */
    public function dependsOn($dependsOn)
    {
        return $this->withMeta(['dependsOn' => $dependsOn]);
    }

    /**
     * Set the values
     *
     * @param  array  $values
     * @return $this
     */
    public function values(array $values)
    {
        return $this->withMeta(['values' => $values]);
    }
}
