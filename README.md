Usage:
```
        $user = User::query()->first();
        return $user?->jsonBuilder()->only(['email', "avatar", "timestamps"])->add(['key' => 'value'])->toArray();
```