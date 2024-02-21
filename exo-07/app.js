import 'dotenv/config';
import path from 'path';
import { fileURLToPath } from 'url';
import express from 'express';
import passport from 'passport';
import hbs from 'hbs';
import cors from 'cors';
import mongoose from 'mongoose';
import cookieParser from 'cookie-parser';
import cookieSession from 'cookie-session';
//import session from 'express-session';
import flash from 'connect-flash';
import authRouter from './routes/auth.js';
import boardRouter from './routes/board.js'
import cardRouter from './routes/card.js';

import { flashInfoMessages, fixCookieSession } from './controllers/middlewares.js';

const __filename = fileURLToPath(import.meta.url);
const __dirname = path.dirname(__filename);
const { APP_PORT, MONGODB_URI, SESSION_SECRET } = process.env;

const app = express();

// config
app.set('view engine', 'html');
app.engine('html', hbs.__express);

hbs.registerPartials(__dirname + '/views/partials', err => {});
hbs.registerHelper('isEqual', (arg1, arg2) => arg1 == arg2);



// middlewares
app.use(express.json());
app.use(express.urlencoded({ extended: true }));
app.use(cookieParser());
app.use(cookieSession({
  secret: SESSION_SECRET,
  sameSite: 'none'
}));
app.use(fixCookieSession);
app.use(cors({
  origin: 'http://localhost:5173',
  credentials :  true
}));
app.use(flash());
app.use(flashInfoMessages);

app.use(passport.initialize());
app.use(passport.session());

// routes
app.use('/', authRouter);
app.use('/board', boardRouter);
app.use('/card', cardRouter);

// debug
app.get('/', (req, res) => {
  const username = req.user ? req.user.username : 'world';
  const role = req.user ? req.user.role : 0;
  res.render('home', {
    username,
    role,
    title: 'Home'
  });
});

// connect db then start server
(async () => {
  try {
    await mongoose.connect(MONGODB_URI);
    app.listen(APP_PORT, () => console.log(`App started at: http://localhost:${APP_PORT}`));
  } catch(error) {
    console.error(error);
    process.exit(1);
  }
})();
