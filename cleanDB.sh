#!/bin/bash

cd ./backend/
rm ./data/*
rm ./login_map/*
rm ./credentials/*

echo "0" > ./data/auto_increment.company
echo "0" > ./data/auto_increment.user
echo "0" > ./data/auto_increment.job

touch ./credentials/.gitkeep
touch ./login_map/.gitkeep