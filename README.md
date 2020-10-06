# Property info collection issue

The issue is when we have a default value on a class:
```php
class Foo
{
    public array $property = [];
}
```

By doing this and:
```
$types = $propertyInfoExtractor->getTypes(Foo::class, 'property');
```

We will have an `array` type with the `collection` field as `false`.

You can run this reproducer and see the issue by using the command: `php bin/console reproducer`.
