# SimpleManager docker container

The [SimpleManager webapp](https://www.simplemanager.org) in a docker container.

- [Video: introduction](https://www.youtube.com/watch?v=Mnawp73GuL8) (fr)
- [Video: installation](https://www.youtube.com/watch?v=koRJPe6UVq0) (fr)
- [Video: additional configuration](https://www.youtube.com/watch?v=3FiXlhZEx8s) (fr)

## Requirements

* Install `git`, `docker` and `docker-compose`:

```bash
# Debian / Ubuntu
sudo apt install git docker docker-compose
```

* Port `localhost:8080` need to be free.

## Quick install

Get sources and run SimpleManager:

```bash
git clone --depth 1 https://github.com/simplemanager/simplemanager-docker
cd simplemanager-docker
sudo docker-compose up -d
```

Run the installation script:

```bash
sudo docker-compose exec simplemanager sma-install
```

Use SimpleManager:

- Just go to http://localhost:8080

## Advanced install

To install SimpleManager more securely, with public access:

* Get the docker sources (as in _quick install_)
* Edit the `.env` file and define:
	- the sgbd password,
	- the admin email,
	- the host on which simplemanager will be hosted.
* Start the container and run install (as in _quick install_).
* Update the administrator password in SimpleManager webapp.
* In the `sources` volume:
	- Update `etc/application.php` (including the smtp configuration).

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

Technical information feedback:

* Go to `Administration` -> `Journaux` in SMA interface (warnings)
	- Note: run `sma tick` to update the online log
* Consult files in `sources::var/log` (errors)

To explore the simplemanager container you can run:

```bash
sudo docker-compose exec simplemanager bash
```
