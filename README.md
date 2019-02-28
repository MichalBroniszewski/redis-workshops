# Gildia PHP - Redis #

### Wymagania ###

Jeśli nie korzystasz z Dockera musisz spełnić poniższe wymagania (zgodnie z ``composer.json``): 

* PHP 7.3
* Rozszerzenie Redis do PHP
* Zainstalowana i działająca instancja Redisa


### Cel warsztatów ###

Celem warsztatów jest napisanie handlerów do obsługi cachowania 3 typów obiektów: string, lista (prosta tablica),
oraz hash (tablica klucz-wartość) z wykorzystaniem dwóch rodzajów przechowywania danych - plik oraz Redis.

### Instrukcja ###

Do wykonania zadań posiłkuj się pomocą z tej strony: https://scotch.io/tutorials/getting-started-with-redis-in-php
My nie będziemy korzystali z Predisa, tylko z klasy ```\Redis```, ale koncept pozostaje ten sam.

W projekcie przygotowane zostały 3 komendy konsolowe, które korzystają z przygotowanych już klas w namespace
```LizardMedia\RedisVsFiles\Cache```.

Zadanie A:
1. Przygotuj implementację dla klasy ```LizardMedia\RedisVsFiles\Cache\Files\StringCacheHandler```.
2. Przygotuj implementację dla klasy ```LizardMedia\RedisVsFiles\Cache\Redis\StringCacheHandler```.
3. Uruchom komendę ```bin/console app:cache:string``` w celu przetestowania poprawności działania kodu oraz 
weryfikacji czasu wykonania
4. Czy Redis był szybszy?

Zadanie B:
1. Przygotuj implementację dla klasy ```LizardMedia\RedisVsFiles\Cache\Files\ArrayCacheHandler```.
2. Przygotuj implementację dla klasy ```LizardMedia\RedisVsFiles\Cache\Redis\ArrayCacheHandler```.
3. Uruchom komendę ```bin/console app:cache:array``` w celu przetestowania poprawności działania kodu oraz 
weryfikacji czasu wykonania
4. Czy Redis był szybszy?

Zadanie C:
1. Przygotuj implementację dla klasy ```LizardMedia\RedisVsFiles\Cache\Files\HashCacheHandler```.
2. Przygotuj implementację dla klasy ```LizardMedia\RedisVsFiles\Cache\Redis\HashCacheHandler```.
3. Uruchom komendę ```bin/console app:cache:hash``` w celu przetestowania poprawności działania kodu oraz 
weryfikacji czasu wykonania
4. Czy Redis był szybszy?
