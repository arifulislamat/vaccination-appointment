#!/bin/bash

db_port=3306
db_database=appointment
db_username=root
db_password=$(aws ssm get-parameter --with-decryption --name appointment-db-password --query "Parameter.Value" --output text)
db_host=$(aws ssm get-parameter --name appointment-db-host --query "Parameter.Value" --output text)

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

docker run -d -it -p 8001:19090 \
    --e DB_PORT=$db_port \
    --e DB_HOST=$db_host \
    --e DB_DATABASE=$db_database \
    --e DB_USERNAME=$db_username \
    --e DB_PASSWORD=$db_password \
    --name $container_name $container_name:latest

# docker compose -f ../docker-compose.prod.yaml down -v
# docker image prune -f
# docker buildx prune -f
# docker compose -f ../docker-compose.prod.yaml up -d
