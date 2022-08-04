# Inspire Coding Standards Sniffs

Sniffs for INSPIRE Coding Standard.

## List of sniffs

### Inspire.ControlStructures.ClosingParenthesisOpeningCurlyBracketSameLineOnMultilineIf 🔧
Reports when closing parenthesis is not on the same line as opening curly bracket of `if` with multiline condition.

```php
❌
if (
    $foo
    && $bar
)
{ //...
```

```php
👍
if (
    $foo
    && $bar
) { //...
```

### Inspire.Methods.ClosingParenthesisOpeningCurlyBracketSameLineOnMultilineMethods 🔧
Reports when closing parenthesis is not on the same line as opening curly bracket on functions and methods with multiline arguments.

```php
❌
public function foo(
    int $foo,
    string $bar,
)
{ //...
```

```php
👍
public function foo(
    int $foo,
    string $bar,
) { //...
```

### Inspire.Methods.MultilineMethodArgumentsParenthesisPosition
Checks whether there is no comma immediately preceding closing parenthesis of function or method argument list.

```php
❌
public function foo(
    int $foo,
    string $bar, ) { //...
```

```php
👍
public function foo(
    int $foo,
    string $bar,
) { //...
```

```php
❌
public function foo(User $user,) { //...
```

```php
👍
public function foo(User $user) { //...
```


### Inspire.Sniffs.ControlStructures.BlankLinesSniff 🔧
Forces single blank line before control structures (DO, FOR, FOREACH, IF, SWITCH, WHILE), unless they are the first statement after block opening. Contains fixer.

### Inspire.Sniffs.Methods.BlankLinesBeforeReturnSniff 🔧
Forces single blank line before `return` statement, unless it is the first statement after block opening. Contains fixer.

### Inspire.Sniffs.Methods.DisallowTracyDumpMethodsSniff
Disallows debug statements in the code.

### Inspire.Sniffs.Classes.EmptyInterfaceSniff
Disallows interfaces with no methods.
