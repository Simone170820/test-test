const express = require('express');
const session = require('express-session');
const app = express();
const port = 3000;

// Middleware per il body parser
app.use(express.urlencoded({ extended: true }));

// Middleware per gestire le sessioni
app.use(session({
  secret: 'mysecretkey', // Puoi cambiarlo con una chiave più sicura
  resave: false,
  saveUninitialized: true
}));

// Servire i file statici dalla cartella "public"
app.use(express.static('public'));

// Rotta per la pagina di login
app.get('/admin', (req, res) => {
  res.sendFile(__dirname + '/login.html'); // Verifica che il file login.html esista nella stessa cartella
});

// Gestione del form di login
app.post('/login', (req, res) => {
  const { username, password } = req.body;
  
  // Aggiungi la logica di autenticazione
  if (username === 'admin' && password === 'password123') {
    req.session.loggedin = true;
    req.session.username = username;
    res.redirect('/dashboard'); // Reindirizza alla dashboard
  } else {
    res.send('Credenziali errate');
  }
});

// Rotta per la dashboard
app.get('/dashboard', (req, res) => {
  if (req.session.loggedin) {
    res.send('<h1>Benvenuto alla Dashboard, ' + req.session.username + '</h1>');
  } else {
    res.send('Devi effettuare il login per accedere alla dashboard');
  }
});

// Avvia il server
app.listen(port, () => {
  console.log(`Server in ascolto su http://localhost:${port}`);
});
