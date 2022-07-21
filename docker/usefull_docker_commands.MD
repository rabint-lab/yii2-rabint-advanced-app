## Reload NGINX :
$ docker exec CONTAINER_NAME nginx -t && docker exec CONTAINER_NAME nginx -s reload

## Enter to a container
$ docker exec -it CONTAINER_NAME bash

## logs (in project dir)
$ docker-compose logs

## list containers:
docker ps



