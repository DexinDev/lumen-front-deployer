#!/bin/bash
BASEDIR=$(dirname $0)
DIRREPNAME=${1,,}
cd "${BASEDIR}/../reps/"
cp -r master ${DIRREPNAME}
echo "copy done ${DIRREPNAME}"
cd $1
git checkout $1
echo "checkout done ${1}"
git pull origin $1
echo "pull done ${1}"
cd markup
npm i
echo "npm i done"
grunt build-fast
echo "build done"
