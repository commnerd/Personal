#!/usr/bin/env sh

VERSION=${1:-test}

# Support bash to support `source` with fallback on $0 if this does not run with bash
# https://stackoverflow.com/a/35006505/6512
selfArg="$BASH_SOURCE"
if [ -z "$selfArg" ]; then
    selfArg="$0"
fi

self=$(realpath $selfArg 2> /dev/null)
if [ -z "$self" ]; then
    self="$selfArg"
fi

dir=$(cd "${self%[/\\]*}" > /dev/null; cd '..' && pwd)

if [ -d /proc/cygdrive ]; then
    case $(which php) in
        $(readlink -n /proc/cygdrive)/*)
            # We are in Cygwin using Windows php, so the path must be translated
            dir=$(cygpath -m "$dir");
            ;;
    esac
fi

If bash is sourcing this file, we have to source the target as well
bashSource="$BASH_SOURCE"
if [ -n "$bashSource" ]; then
    if [ "$bashSource" != "$0" ]; then
        source "${dir}/sail" "$@"
        return
    fi
fi

if [ ! "$(docker images -q sail-8.4/app)" ]; then
    WWWGROUP=1000 WWWUSER=1000 docker-compose build laravel.test
fi

docker build -t commnerd/personal:${VERSION} .
