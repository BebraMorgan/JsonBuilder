Usage:
```
class User
{
    use JsonSerializable;
        ...
}
```
In controller:
```
        return $user->jsonBuilder()->only(['email', 'avatar', 'timestamps'])->add(['key' => 'value'])->toArray();
```

