FROM node:latest

# Set working directory
WORKDIR /var/www/html

# Copy package.json and package-lock.json
COPY package*.json ./

# Install dependencies
RUN npm install

# Copy the rest of the application code
COPY . .

# Expose any ports the app is expecting
EXPOSE 3000

# Start the app
CMD ["npm", "start"]