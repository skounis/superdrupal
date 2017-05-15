# SuperDrupal with Docker
Develop Drupal modules and themes with Docker. A skeleton workspace.

### Docker
Based on https://hub.docker.com/r/wadmiraal/drupal/
> Please note that Docker should be already installed in your box. https://www.docker.com/products/docker

Start the container:

1. Web and Shell: `docker run -d -p 8080:80 -p 8022:22 -t wadmiraal/drupal:8`
2. Write code locally: ``docker run -d -p 8080:80  -p 8022:22 -v `pwd`/modules:/var/www/modules/custom -t wadmiraal/drupal:8``

Manage the containers

* List: `docker ps -a`
* Stop: `docker stop {name}`
* Remove: `docker rm {name}`

Drupal and Shell access
* http://localhost:8080 (`admin`/`admin`)
* `ssh root@localhost -p8022` with password `root`


Enable Debug
Add the following lines at the end of the `setting.php`

```
/*
 * Enable debug
 */
error_reporting(E_ALL);
ini_set('display_errors', TRUE);
ini_set('display_startup_errors', TRUE);

$config['system.logging']['error_level'] = 'verbose';
```
