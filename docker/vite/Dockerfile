FROM node:18-alpine

WORKDIR /var/www/html

# Ajouter inotify-tools pour un meilleur support du watch
RUN apk add --no-cache inotify-tools

# Exposer explicitement le port
EXPOSE 5173

# Utiliser un script de démarrage plus simple
CMD ["sh", "-c", "npm install && npm run dev"] 