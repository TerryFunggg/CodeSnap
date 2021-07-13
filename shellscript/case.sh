#!/bin/sh

echo -n "Is it morning? Please say yes or no: "
read timeofday

case "$timeofday" in
  yes | y | Yes | YES )
    echo "Good morning"
    echo "Up bright and early this morning."
    ;;
  [nN]*)
    echo "Good Afternoon"
    ;;
  *)
    echo "Sorry, please say yes or no"
    exit 1
    ;;
esac
