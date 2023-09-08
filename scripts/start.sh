#!/bin/bash

ECR_REGISTRY_URI=$(aws ssm get-parameter --name ecr-registry-uri --query "Parameter.Value" --output text)
AWS_DEFAULT_REGION=$(aws ssm get-parameter --name default-region-aws --query "Parameter.Value" --output text)
AWS_ACCOUNT_ID=$(aws ssm get-parameter --name account-id --query "Parameter.Value" --output text)

DB_PORT=$(aws ssm get-parameter --name db-port --query "Parameter.Value" --output text)
DB_HOST=$(aws ssm get-parameter --name db-host --query "Parameter.Value" --output text)
DB_DATABASE=$(aws ssm get-parameter --name db-name --query "Parameter.Value" --output text)
DB_USERNAME=$(aws ssm get-parameter --name db-user --query "Parameter.Value" --output text)
DB_PASSWORD=$(aws ssm get-parameter --name db-password --query "Parameter.Value" --output text)

IMAGE_TAG="appointment-latest"
APPOINTMENT_IMAGE="vaccination-system-images:$IMAGE_TAG"
APPOINTMENT_PORT=8001

echo Logging in to Amazon ECR...
aws ecr get-login-password --region $AWS_DEFAULT_REGION | docker login --username AWS --password-stdin $AWS_ACCOUNT_ID.dkr.ecr.$AWS_DEFAULT_REGION.amazonaws.com

docker compose -f docker-compose.prod.yaml down -v
docker image prune -f
docker buildx prune -f
docker compose -f docker-compose.prod.yaml up -d
