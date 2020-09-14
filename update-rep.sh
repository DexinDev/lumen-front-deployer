#!/bin/bash
BASEDIR=$(dirname $0)
DIRREPNAME=${1,,}
cd "${BASEDIR}/../reps/${DIRREPNAME}"
git pull origin $1
echo "pull done ${1}"
cd markup
npm i
echo "npm i done"
grunt build-fast
echo "build done"
