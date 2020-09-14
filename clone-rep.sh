#!/bin/bash
BASEDIR=$(dirname $0)
cd "${BASEDIR}/../reps/"
cp -r master $1
echo "copy done"
cd $1
git checkout $1
echo "checkout done"
git pull origin $1
echo "pull done"
cd markup
npm i
echo "npm i done"
grunt build-fast
echo "build done"
