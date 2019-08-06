Fill Laravel Nova field based on value from other field.  

![example](https://raw.githubusercontent.com/klepak/nova-depend-fill/master/docs/example.gif)

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
