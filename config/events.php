<?php
/**
 * events
 */

return [
    /*
    Event::class => [
        // Just a regular closure, it will be called from the Dispatcher "as is".
        static fn(EventName $event) => someStuff($event),

        // A regular closure with additional dependency. All the parameters after the first one (the event itself)
        // will be resolved from your DI container within `yiisoft/injector`.
        static fn(EventName $event, DependencyClass $dependency) => someStuff($event),

        // An example with a regular callable. If the `staticMethodName` method contains some dependencies,
        // they will be resolved the same way as in the previous example.
        [SomeClass::class, 'staticMethodName'],

        // Non-static methods are allowed too. In this case `SomeClass` will be instantiated by your DI container.
        [SomeClass::class, 'methodName'],

        // An object of a class with the `__invoke` method implemented
        new InvokableClass(),

        // In this case the `InvokableClass` with the `__invoke` method will be instantiated by your DI container
        InvokableClass::class,

        // Any definition of an invokable class may be here while your `$container->has('the definition)`
        'di-alias'
    ],
    */
];