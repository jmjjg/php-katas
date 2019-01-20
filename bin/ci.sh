#!/bin/sh

__me__="`readlink -f "$0"`"
__directory__="`dirname "${__me__}"`"
__root__="`readlink -f "$__directory__/.."`"
__config__="$__root__/config"
__src__="$__root__/src"
__tests__="$__root__/tests"
__vendor__="$__root__/vendor"

phpcs="$__vendor__/bin/phpcs"
phpunit="$__vendor__/bin/phpunit"
phpmd="$__vendor__/bin/phpmd"

$phpunit --bootstrap "$__vendor__/autoload.php" "$__tests__" \
&& (\
    $phpcs --standard="$__config__/phpcs.xml" "$__src__" "$__tests__" \
    ; $phpmd "$__src__,$__tests__" text "$__config__/phpmd.xml" \
)