.PHONY: help
PWD_DIR:=$(shell dirname $(realpath $(firstword $(MAKEFILE_LIST))))

help: ## Show this help message.
	@egrep -h '\s##\s' $(MAKEFILE_LIST) | awk 'BEGIN {FS = ":.*?## "}; {printf "\033[36m%-20s\033[0m %s\n", $$1, $$2}'

build: ## Build and push to docker hub
	@docker buildx build --platform linux/arm64,linux/amd64 --push --tag xdung24/docker-nginx-php-upload:latest .

dev: ## Run in dev 
	@docker build -t xdung24/docker-nginx-php-upload:dev -f Dockerfile .
	@docker run --rm -it -v $(PWD_DIR)/data/:/var/www/html/uploads/ -p 8084:80 xdung24/docker-nginx-php-upload:dev

