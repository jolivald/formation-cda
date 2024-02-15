import { Router } from 'express';
import passport from 'passport';
import { ROLE_USER } from '../constants.js';
import User from '../models/User.js';


passport.use(User.createStrategy());
passport.serializeUser(User.serializeUser());
passport.deserializeUser(User.deserializeUser());

const router = Router();

router.get('/register', (req, res) => {
  res.render('auth', { title: 'Register', action: '/register' });
});

router.post('/register', (req, res, next) => {
  const { username, password } = req.body;
  const user = new User({ username, role: ROLE_USER });
  User.register(user, password)
    .then(() => req.login(user, (err) => {
      if (err) { next(err); }
      return res.redirect('/');
    }))
    .catch(error => next(error));
});


router.get('/login', (req, res) => {
  res.render('auth', { title: 'Login', action: '/login' });
});

router.post(
  '/login',
  passport.authenticate('local', { failureRedirect: '/login', failureFlash: true }),
  (req, res) => res.redirect('/')
);

router.get('/logout', (req, res, next) => {
  req.logout(function(error) {
    if (error) { return next(error); }
    res.redirect('/');
  });
});


export default router;