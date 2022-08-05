# docker-nginx-php-upload

Example execution:
```
docker run --rm -it -v "$PWD/data:/var/www/html/uploads/" -p 8080:80 xdung24/docker-nginx-php-upload
```

Go to http://localhost:8080 to upload files.

Files will be uploaded to /data

Upload limit size: 10000MB
