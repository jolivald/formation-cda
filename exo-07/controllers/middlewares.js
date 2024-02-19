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