# Use the official Node.js image as the base image
FROM node:latest

# Set the working directory inside the container
WORKDIR /usr/src/app

# Copy the entire project (including gulpfile.js, package.json, and other files)
COPY . .

# Install dependencies (this includes gulp and any other dependencies in package.json)
RUN npm install


# List the files in the directory to ensure gulpfile.js is present
RUN ls -la /usr/src/app

# Expose the port that the Express app will run on
EXPOSE 3000

# Run the application in watch mode
CMD ["npm", "run", "watch"]
