import 'dotenv/config';
import express from 'express';
import passport from 'passport';
import hbs from 'hbs';
import mongoose from 'mongoose';
import cookieParser from 'cookie-parser';
import session from 'express-session';
import flash from 'connect-flash';
import authRouter from './routes/auth.js';
//import userRouter from './routes/user.js';


const { APP_PORT, MONGODB_URI, SESSION_SECRET } = process.env;
const app   = express();
const port  = process.env.APP_PORT;
const roles = {
  1: 'administrator',
  2: 'scrum master',
  3: 'user'
};

// config
app.set('view engine', 'html');
app.engine('html', hbs.__express);

// middlewares
app.use(express.json());
app.use(express.urlencoded({ extended: true }));
app.use(cookieParser());
app.use(session({
  secret: SESSION_SECRET,
  resave: true,
  saveUninitialized: true
}));
app.use(flash());
app.use(passport.initialize());
app.use(passport.session());

// routes
app.use('/', authRouter);
//app.use('/user', userRouter);

// debug
app.get('/', (req, res) => {
  res.send(`Hello ${req.user ? req.user.username : 'world'} !`);
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
