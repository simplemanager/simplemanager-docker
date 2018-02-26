# SimpleManager docker container

The [SimpleManager webapp](https://www.simplemanager.org) in a docker container.

![SimpleManager picture](https://blog.simplemanager.org/wp-content/uploads/2017/11/sma-factures.png)

## Requirements

* `git`, `docker` and `docker-compose` :blush:

Note: a recent release of [docker-compose](https://docs.docker.com/compose/install/) is required.

## Installation

Quick install:

```bash
git clone --depth 1 https://github.com/simplemanager/simplemanager-docker
cd simplemanager-docker
sudo docker-compose up -d
sudo docker-compose exec simplemanager sma-install
```

Container build + install:

```bash
git clone --depth 1 https://github.com/simplemanager/simplemanager-docker
cd simplemanager-docker/src
sudo docker build -t "simplemanager" .
sudo docker-compose up -d
sudo docker-compose exec simplemanager sma-install
```

## Advanced installation

* Edit the `src/.env` file to change:
 * the sgbd password,
 * the email of your main SimpleManager administrator,
 * the host on which simplemanager will be hosted.
* Build the container and run `sma-install` (quick install).
* Update the administrator password in SimpleManager webapp.
* Update the webapp configuration int the `etc` volume.

## Administration

Use the `sma` command to manage technical features of your webapp:

```bash
$ docker-compose exec simplemanager sma

  Usage: sma <command> [options]

      test: Application unit tests
     clean: Clean cache
    appgen: Launch SMA application generators (static quick access classes)
      tick: Execute deferred actions (log register, cache generation...)
     index: Global search engine indexation
    backup: Account backup
   recover: Account recovery
    delete: Delete an account from database
      list: List accounts (arg 1 = filter)
     stats: Build form & survey stats (arg 1 = form class)
   install: SimpleManager installation process
  generate: Generate DB models, helpers and auto-updatable classes
      help: Display this message
```
