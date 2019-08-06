# Installation

```bash
composer require klepak/nova-depend-fill
```

# Description

Fill Laravel Nova field based on value from other field.

![example](https://raw.githubusercontent.com/klepak/nova-depend-fill/master/docs/example.gif)

# Usage

```php
DependFill::make('Text')
    ->field(
        Textarea::make('Text')
    )
    ->dependsOn(
        Select::make('Template')
            ->options([
                1 => 'Template 1',
                2 => 'Template 2',
            ])
    )
    ->values([
        1 => 'template 1 text',
        2 => 'template 2 text'
    ])
```
