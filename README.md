Fill Laravel Nova field based on value from other field.  

```php
$models = Model::all();

DependFill::make('Text')
    ->field(
        Textarea::make('Text')
    )
    ->dependsOn(
        Select::make('Template')
            ->options($models->pluck('title', 'id'))
    )
    ->values($models->pluck('text', 'id')->toArray())`

```
