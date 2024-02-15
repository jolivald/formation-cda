import { Router } from 'express';


const router = Router();

// middleware that is specific to this router
/*userRouter.use((req, res, next) => {
  console.log('Time: ', Date.now());
  next();
});*/



// GET /user => readAll
router.get('/', (req, res) => {
  console.log('GET /user', req.params);
  res.send('GET /user => readAll');
});

// GET /user/:name => readOne
router.get('/:username', (req, res) => {
  console.log('GET /user/:username', req.params);
  res.send('GET /user/:username => readOne - ' + req.params.username);
});

export default router;