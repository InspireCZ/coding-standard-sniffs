# Inspire Coding Standards Sniffs

Sniffs for INSPIRE Coding Standard.

## List of sniffs

### Inspire.ControlStructures.DisallowHashComments 🔧
Reports and fixes hash comments in the code.

```php
❌
$correct = false; # This is (invalid) hash comment
```

```php
👍
$correct = true; // This is a valid comment
```

### Inspire.ControlStructures.InlineCommentSpacing 🔧
Reports and fixes invalid spaces count before and after inline comment start

```php
❌
//wrong inline comment
//   wrong inline comment
$a = 1; //wrong inline comment (missing space after "//")
$b = 2;// also wrong inline comment (missing space before "//")
```


```php
👍
// correct inline comment with exactly one space after "//"
$a = 1; // correct inline comment
$b = 2; // correct inline comment
```

### Inspire.ControlStructures.ControlStructureSpacing 🔧
Reports and fixes for correct spaces after control structures (exactly one space is expected, no more, no less).

```php
❌
if($foo) {
     //...
}
```


```php
👍
if ($foo) { 
     //...
}
```

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
