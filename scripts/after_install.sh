#!/bin/bash

systemctl start docker
systemctl enable docker

usermod -aG docker ec2-user
newgrp docker
