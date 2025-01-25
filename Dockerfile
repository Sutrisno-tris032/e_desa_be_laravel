# Use PHP 8.2 with Apache
FROM php:8.2

# Install system dependencies
RUN apt-get update -y && apt-get install -y \
    libpng-dev \
    libjpeg62-turbo-dev \
    libfreetype6-dev \
    libxml2-dev \
    unzip \
    git \
    curl \
    gnupg2 \
    software-properties-common \
    unixodbc-dev \
    gcc \
    g++ \
    make \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install gd pdo pdo_mysql


RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
RUN docker-php-ext-install pdo mbstring

# Add Microsoft repository and install ODBC driver
RUN curl -fsSL https://packages.microsoft.com/keys/microsoft.asc | gpg --dearmor -o /usr/share/keyrings/microsoft-archive-keyring.gpg \
    && echo "deb [signed-by=/usr/share/keyrings/microsoft-archive-keyring.gpg] https://packages.microsoft.com/debian/11/prod bullseye main" | tee /etc/apt/sources.list.d/microsoft.list \
    && apt-get update 
    # && ACCEPT_EULA=Y apt-get install -y msodbcsql18

# Install PDO SQL Server extensions
RUN pecl install pdo_sqlsrv && docker-php-ext-enable pdo_sqlsrv
RUN pecl install sqlsrv && docker-php-ext-enable sqlsrv

# Enable Apache mod_rewrite
RUN a2enmod rewrite

# Set the working directory
WORKDIR /app

COPY . /app

# Install Composer
RUN composer install

# CMD php artisan serve --host=0.0.0.0 --port=8181

# EXPOSE 8181
