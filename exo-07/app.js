import 'dotenv/config';
import express from 'express';
import hbs from 'hbs';
import cookieParser from 'cookie-parser';
import authRouter from './routes/auth.js';
import userRouter from './routes/user.js';


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
app.use(cookieParser());
//app.use(express.urlencoded({ extended: false }));
//app.use(express.static(path.join(__dirname, 'public')));

// routes
app.use('/', authRouter);
app.use('/user', userRouter);


app.listen(port, () => {
  console.log(`Kanban application started: http://localhost:${port}`);
});