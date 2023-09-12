#!/bin/bash

AWS_DEFAULT_REGION=$(aws ssm get-parameter --name default-region-aws --query "Parameter.Value" --output text)
AWS_ACCOUNT_ID=$(aws ssm get-parameter --name account-id --query "Parameter.Value" --output text)

echo Logging in to Amazon ECR...
aws ecr get-login-password --region $AWS_DEFAULT_REGION | docker login --username AWS --password-stdin $AWS_ACCOUNT_ID.dkr.ecr.$AWS_DEFAULT_REGION.amazonaws.com

docker compose -f ../docker-compose.prod.yaml down -v
docker image prune -f
docker buildx prune -f
docker compose -f ../docker-compose.prod.yaml up -d
