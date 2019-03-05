all:
	protoc \
		-I/usr/local/include -I. \
		-I/home/aaron/go/src \
		-I/home/aaron/go/src/github.com/grpc-ecosystem/grpc-gateway/third_party/googleapis \
		--proto_path=../ \
		--php_out=../ \
		--grpc_out=../ \
		--plugin=protoc-gen-grpc=/home/aaron/grpc/bins/opt/grpc_php_plugin \
		./ueg/api/error/error.proto


