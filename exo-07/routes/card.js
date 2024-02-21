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

router.get('/update/:id', isScrumMaster, async (req, res) => {
  const card = await Card.findById(req.params.id);//.populate('assigned');
  const users = await User.find({}).lean();
  users.forEach(user => user.assigned = card.assigned.includes(user._id));
  res.render('card/update', {
    card,
    users,
    title: 'Update card',
    action: '/card/update'
  });
});

router.post('/update', isScrumMaster, async (req, res) => {
  const { id, title, content, assigned, estimate, priority, size } = req.body;
  const card = await Card.findByIdAndUpdate(id, { title, content, assigned, estimate, priority, size });
  req.flash('info', `Card "${title}" successfully updated`);
  res.redirect('/card');
});

router.get('/delete/:id', isScrumMaster, async (req, res) => {
  const card = await Card.findById(req.params.id);
  res.render('card/delete', {
    card,
    title: 'Delete card',
    action: '/card/delete'
  });
});

router.post('/delete', isScrumMaster, async (req, res) => {
  const card = await Card.findByIdAndDelete(req.body.id).exec();
  req.flash('info', `Card "${card.title}" successfully deleted`);
  res.redirect('/card');
});


export default router;
