#!/bin/bash

# Container name
container_name="vaccination-appointment"
image_tag=appointment-latest

aws_default_region=$(aws ssm get-parameter --name default-region-aws --query "Parameter.Value" --output text)
aws_account_id=$(aws ssm get-parameter --with-decryption --name account-id --query "Parameter.Value" --output text)

echo Logging in to Amazon ECR...
aws ecr get-login-password --region $aws_default_region | docker login --username AWS --password-stdin $aws_account_id.dkr.ecr.$aws_default_region.amazonaws.com

docker pull $aws_account_id.dkr.ecr.$aws_default_region.amazonaws.com/vaccination-system-images:$image_tag
docker tag $aws_account_id.dkr.ecr.$aws_default_region.amazonaws.com/vaccination-system-images:$image_tag $container_name:latest

docker stop $container_name
docker rm $container_name

echo $(pwd)
env_file_path=$(pwd)/../.env
docker run -d -it -p 8001:19090 --env-file $env_file_path --name $container_name $container_name:latest

# docker compose -f ../docker-compose.prod.yaml down -v
# docker image prune -f
# docker buildx prune -f
# docker compose -f ../docker-compose.prod.yaml up -d
