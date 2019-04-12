#!/bin/sh
# run first time
php EcartWorker.php

# detecting directory change
while inotifywait -e modify sample; do
  php EcartWorker.php
done