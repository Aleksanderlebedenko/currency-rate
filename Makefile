UNAME_S := $(shell uname -s)

.PHONY: default
default: help

.PHONY: help
help: ## Get this help
	@echo Tasks:
	@awk 'BEGIN {FS = ":.*?## "} /^[a-zA-Z_-]+:.*?## / {printf "\033[36m%-30s\033[0m %s\n", $$1, $$2}' $(MAKEFILE_LIST)

.PHONY: upd
upd: ## Start containers
	docker compose up -d

.PHONY: down
down: ## Remove containers
	docker compose down

.PHONY: php
php: ## SSH into app
	docker exec -it rate_php bash

.PHONY: build
build: ## build containers
	docker compose down
	docker compose up -d --build

.PHONY: bootstrap-project
bootstrap-project:build ## build containers and install dependencies
	docker exec -it rate_php composer install

