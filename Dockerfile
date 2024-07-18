FROM dunglas/frankenphp:php8.3-bookworm

RUN install-php-extensions \
    grpc \
    intl \
    opentelemetry \
    protobuf

COPY --link . /app
WORKDIR /app

ENV APP_RUNTIME="Runtime\\FrankenPhpSymfony\\Runtime"
ENV SERVER_NAME=":80"
ENV FRANKENPHP_CONFIG="worker /app/public/index.php"
