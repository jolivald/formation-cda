import { Router } from 'express';
import { isAuthenticated, isScrumMaster } from '../controllers/middlewares.js';
import Card from '../models/Card.js';
import User from '../models/User.js';


const router = Router();

router.get('/', isAuthenticated, async (req, res) => {
  const cards = await Card.find({});
  res.render('card/home', {
    cards,
    title: 'Cards'
  });

});

router.get('/create', isScrumMaster, async (req, res) => {
  const users = await User.find({});
  res.render('card/create', {
    users,
    title: 'Create card',
    action: '/card/create'
  }); 
});

router.post('/create', isScrumMaster, async (req, res) => {
  const { title, content, assigned, estimate, priority, size } = req.body;
  const card = new Card({ title, content, assigned, estimate, priority, size });
  const saved = await card.save();
  req.flash('info', `Card "${title}" successfully created`);
  res.redirect('/card');
});


export default router;
