# Writer

Writer webpage inspired by http://typehere.co/, only with its own backend where you can actually save what your writing.

## Setup

### 1. Composer
```
    composer install
```

### 2. Set up SSH keys (openssl required)
```
$ openssl genrsa -out app/var/jwt/private.pem -aes256 4096
$ openssl rsa -pubout -in app/var/jwt/private.pem -out app/var/jwt/public.pem
```
