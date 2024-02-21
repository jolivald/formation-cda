import { ROLE_USER, ROLE_SCRUM_MASTER, ROLE_ADMINISTRATOR } from '../constants.js';


export const isAuthenticated = (req, res, next) => {
  req.user && req.user.role >= ROLE_USER ? next() : res.redirect('/login');
};

export const isScrumMaster = (req, res, next) => {
  req.user && req.user.role>= ROLE_SCRUM_MASTER ? next() : res.redirect('/login');
};

export const isAdministrator = (req, res, next) => {
  req.user && req.user.role>= ROLE_ADMINISTRATOR ? next() : res.redirect('/login');
};

export const flashInfoMessages = (req, res, next) => {
  res.locals.messages = req.flash('info');
  next();
};

// fix bug: https://github.com/jaredhanson/passport/issues/904
// register regenerate & save after the cookieSession middleware initialization
export const fixCookieSession = (req, res, next) => {
  if (req.session && !req.session.regenerate) {
    req.session.regenerate = (cb) => { cb() };
  }
  if (req.session && !req.session.save) {
      req.session.save = (cb) => { cb() };
  }
  next();
};
