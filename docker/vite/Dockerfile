FROM node:18-alpine

WORKDIR /var/www/html

# Ajouter inotify-tools pour un meilleur support du watch
RUN apk add --no-cache inotify-tools

# Augmenter les limites inotify
RUN echo "fs.inotify.max_user_watches=524288" >> /etc/sysctl.conf

# Exposer explicitement le port
EXPOSE 5173

# Utiliser un script de démarrage plus simple
CMD ["sh", "-c", "npm install && NODE_ENV=development npm run dev"] 