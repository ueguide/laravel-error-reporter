#!/usr/bin/env bash

cd "$(dirname "$0")"

cd ../api

PHP_PLUGIN_PATH=/home/aaron/grpc/bins/opt/grpc_php_plugin
OUT_PATH=../

# compile protocol buffers to php files
protoc \
  -I/usr/local/include -I. \
	-I$(go env GOPATH)/src \
	-I$(go env GOPATH)/src/github.com/grpc-ecosystem/grpc-gateway/third_party/googleapis \
  --proto_path=$OUT_PATH \
  --php_out=$OUT_PATH \
  --grpc_out=$OUT_PATH \
  --plugin=protoc-gen-grpc=$PHP_PLUGIN_PATH \
  ueg-proto/laravel-error-reporter/*.proto
