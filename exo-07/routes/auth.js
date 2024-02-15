import { Router } from 'express';
import passport from 'passport';
import User from '../models/User.js';

passport.use(User.createStrategy());
passport.serializeUser(User.serializeUser());
passport.deserializeUser(User.deserializeUser());

const router = Router();

// middleware that is specific to this router
/*userRouter.use((req, res, next) => {
  console.log('Time: ', Date.now());
  next();
});*/



router.get('/login', (req, res) => {
  console.log('GET /login', req.params);
  res.render('login');
});

router.post('/login', (req, res) => {
  console.log('POST /login', req);
  res.send('POST /login');
});

export default router;