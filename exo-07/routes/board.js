import { Router } from 'express';
import { isAuthenticated, isScrumMaster } from '../controllers/middlewares.js';
import Board from '../models/Board.js';


const router = Router();

// read all
router.get('/', isAuthenticated, async (req, res) => {
  const boards = await Board.find({ createdBy: req.user._id }); // TODO: need user._id in query ?
  res.render('board/home', {
    boards,
    title: 'Boards'
  });
});

// read one
router.get('/read/:id', isAuthenticated, (req, res) => {
  res.send('get board with id: ' + req.params.id);
});

router.get('/create', isScrumMaster, (req, res) => {
  res.render('board/create', {
    title: 'Create board',
    action: '/board/create'
  });
});

router.post('/create', isScrumMaster, async (req, res) => {
  const { title } = req.body;
  const board = new Board({ title, createdBy: req.user._id, cards: [] });
  const saved = await board.save();
  req.flash('info', `Board "${title}" successfully created`);
  res.redirect('/board');
});

router.get('/update/:id', isScrumMaster, async (req, res) => {
  const board = await Board.findById(req.params.id);
  res.render('board/update', {
    board,
    title: 'Update board',
    action: '/board/update'
  });
});

router.post('/update', isScrumMaster, async (req, res) => {
  const { id, title } = req.body;
  const board = await Board.findByIdAndUpdate(id, { title }).exec();
  req.flash('info', `Board "${title}" successfully updated`);
  res.redirect('/board');
});

router.get('/delete/:id', isScrumMaster, async (req, res) => {
  const board = await Board.findById(req.params.id);
  res.render('board/delete', {
    board,
    title: 'Delete board',
    action: '/board/delete'
  });
});

router.post('/delete', isScrumMaster, async (req, res) => {
  const board = await Board.findByIdAndDelete(req.body.id).exec();
  req.flash('info', `Board "${board.title}" successfully deleted`);
  res.redirect('/board');
});

export default router;
