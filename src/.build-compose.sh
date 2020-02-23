#!/bin/sh

cat docker-compose.yml \
  | sed 's|image: simplemanager|image: simplemanager/simplemanager|' \
  | sed 's|./files/|./src/files/|' \
  | tr '\n' '\f' | sed 's/\f *build\: . *//' | tr '\f' '\n' > ../docker-compose.yml
