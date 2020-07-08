#!/bin/bash

for planet in Mercury Venus Earth Mars Jupiter Saturn Uranus Neptune Pluto
do
    echo $planet  # 每个行星都被单独打印在一行上.
done

echo

for planet in "Mercury Venus Earth Mars Jupiter Saturn Uranus Neptune Pluto"
do
    echo $planet  # 每个行星都被单独打印在一行上.
done
