# Command Lister Service

## Start

Where `index.php` file is located:

```
$ php -S 0.0.0.0:1234
```

## Endpoints

`/`

Returns a list of all available **commands**, **aliases**, **builtins**, **keywords** and **functions**.

`/man/<command name>`

Returns the `man` page for the given command.
