# SimpleManager docker container

A docker container configuration usefull to host your own SimpleManager webapp. 

## Requirements

> docker & docker-compose

## Build and run

From pre-built container (comming soon):

```bash
# git clone --depth 1 https://github.com/simplemanager/simplemanager-docker
# cd simplemanager-docker && docker-compose up -d
```

From sources:

```bash
git clone --depth 1 https://github.com/simplemanager/simplemanager-docker
cd simplemanager-docker/src && docker-compose up -d
```

## Installation

```bash
docker-compose exec sma install -e <your@email.tld>
```

Note: `<your@email.tld>` must be replaced by the SimpleManager administrator email.
 
